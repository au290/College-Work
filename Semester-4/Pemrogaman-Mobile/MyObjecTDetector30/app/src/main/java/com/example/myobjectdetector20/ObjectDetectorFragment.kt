package com.example.myobjectdetector20

import android.Manifest
import android.content.pm.PackageManager
import android.graphics.*
import android.os.Bundle
import android.util.Log
import android.util.Size
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Toast
import androidx.activity.result.contract.ActivityResultContracts
import androidx.appcompat.app.AppCompatActivity
import androidx.camera.core.*
import androidx.camera.lifecycle.ProcessCameraProvider
import androidx.core.content.ContextCompat
import androidx.fragment.app.Fragment
import com.example.myobjectdetector20.databinding.FragmentObjectDetectorBinding
import kotlinx.coroutines.*
import org.tensorflow.lite.Interpreter
import java.io.BufferedReader
import java.io.ByteArrayOutputStream
import java.io.InputStreamReader
import java.nio.ByteBuffer
import java.nio.ByteOrder
import java.util.concurrent.ExecutorService
import java.util.concurrent.Executors
import java.util.concurrent.TimeUnit
import kotlin.math.max
import kotlin.math.min

class ObjectDetectorFragment : Fragment() {

    private var _binding: FragmentObjectDetectorBinding? = null
    private val binding get() = _binding!!

    private lateinit var interpreter: Interpreter
    private lateinit var labels: List<String>
    private var cameraProvider: ProcessCameraProvider? = null
    private var cameraSelector = CameraSelector.DEFAULT_FRONT_CAMERA

    private val fragmentScope = CoroutineScope(Dispatchers.Main + Job())
    private lateinit var cameraExecutor: ExecutorService

    private val requestPermissionLauncher =
        registerForActivityResult(ActivityResultContracts.RequestPermission()) { isGranted: Boolean ->
            if (isGranted) {
                startCamera()
            } else {
                Toast.makeText(requireContext(), "Camera permission is required.", Toast.LENGTH_LONG).show()
            }
        }

    companion object {
        private const val MODEL_FILE = "1.tflite"
        private const val LABELS_FILE = "coco_labels.txt"
        private const val MODEL_INPUT_WIDTH = 320
        private const val MODEL_INPUT_HEIGHT = 320
        private const val NUM_DETECTIONS = 6300
        private const val CONFIDENCE_THRESHOLD = 0.4f
        private const val IOU_THRESHOLD = 0.5f
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        try {
            loadModel()
            loadLabels()
        } catch (e: Exception) {
            Log.e("ObjectDetectorFragment", "TFLite model or labels failed to load.", e)
        }
    }

    override fun onResume() {
        super.onResume()
        (activity as? AppCompatActivity)?.supportActionBar?.hide()
        cameraExecutor = Executors.newSingleThreadExecutor()
        if (isCameraPermissionGranted()) {
            startCamera()
        } else {
            requestPermissionLauncher.launch(Manifest.permission.CAMERA)
        }
    }

    override fun onPause() {
        super.onPause()
        cameraProvider?.unbindAll()
        shutdownExecutor()
    }

    override fun onStop() {
        super.onStop()
        (activity as? AppCompatActivity)?.supportActionBar?.show()
    }

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View {
        _binding = FragmentObjectDetectorBinding.inflate(inflater, container, false)
        return binding.root
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

        binding.switchCameraButton.setOnClickListener {
            cameraSelector = if (cameraSelector == CameraSelector.DEFAULT_FRONT_CAMERA) {
                CameraSelector.DEFAULT_BACK_CAMERA
            } else {
                CameraSelector.DEFAULT_FRONT_CAMERA
            }
            startCamera()
        }

        binding.backButton.setOnClickListener {
            parentFragmentManager.popBackStack()
        }
    }

    private fun loadModel() {
        val afd = requireContext().assets.openFd(MODEL_FILE)
        afd.use {
            val fileChannel = it.createInputStream().channel
            val startOffset = it.startOffset
            val declaredLength = it.declaredLength
            val modelBuffer = fileChannel.map(
                java.nio.channels.FileChannel.MapMode.READ_ONLY,
                startOffset,
                declaredLength
            )
            interpreter = Interpreter(modelBuffer)
        }
    }

    private fun loadLabels() {
        labels = BufferedReader(InputStreamReader(requireContext().assets.open(LABELS_FILE))).readLines()
    }

    private fun startCamera() {
        val cameraProviderFuture = ProcessCameraProvider.getInstance(requireContext())
        cameraProviderFuture.addListener({
            if (_binding == null) return@addListener
            cameraProvider = cameraProviderFuture.get()
            bindCameraUseCases()
        }, ContextCompat.getMainExecutor(requireContext()))
    }

    private fun bindCameraUseCases() {
        val cameraProvider = cameraProvider ?: return

        val preview = Preview.Builder().build().also {
            it.setSurfaceProvider(binding.viewFinder.surfaceProvider)
        }

        val imageAnalyzer = ImageAnalysis.Builder()
            .setTargetResolution(Size(MODEL_INPUT_WIDTH, MODEL_INPUT_HEIGHT))
            .setBackpressureStrategy(ImageAnalysis.STRATEGY_KEEP_ONLY_LATEST)
            .build()
            .also {
                it.setAnalyzer(cameraExecutor, ImageAnalyzer { results, width, height ->
                    activity?.runOnUiThread {
                        _binding?.objectOverlay?.updateResults(
                            results,
                            width,
                            height,
                            cameraSelector == CameraSelector.DEFAULT_FRONT_CAMERA
                        )
                        _binding?.resultText?.text = "Objects found: ${results.size}"
                    }
                })
            }

        try {
            cameraProvider.unbindAll()
            cameraProvider.bindToLifecycle(viewLifecycleOwner, cameraSelector, preview, imageAnalyzer)
        } catch (e: Exception) {
            Log.e("ObjectDetectorFragment", "Camera use case binding failed", e)
        }
    }

    inner class ImageAnalyzer(private val listener: (List<DetectionResult>, Int, Int) -> Unit) :
        ImageAnalysis.Analyzer {
        override fun analyze(imageProxy: ImageProxy) {
            if (cameraExecutor.isShutdown) {
                imageProxy.close()
                return
            }
            val bitmap = imageProxyToBitmap(imageProxy)
            val rotationDegrees = imageProxy.imageInfo.rotationDegrees.toFloat()
            val matrix = Matrix().apply {
                postRotate(rotationDegrees)
                if (cameraSelector == CameraSelector.DEFAULT_FRONT_CAMERA) {
                    postScale(-1f, 1f, bitmap.width / 2f, bitmap.height / 2f)
                }
            }
            val rotatedBitmap =
                Bitmap.createBitmap(bitmap, 0, 0, bitmap.width, bitmap.height, matrix, true)

            val inputBuffer = preprocessImage(rotatedBitmap)
            val outputBuffer = ByteBuffer.allocateDirect(1 * NUM_DETECTIONS * (labels.size + 5) * 4)
            outputBuffer.order(ByteOrder.nativeOrder())

            interpreter.run(inputBuffer, outputBuffer)

            val results = postprocessResults(outputBuffer, rotatedBitmap.width, rotatedBitmap.height)
            listener(results, rotatedBitmap.width, rotatedBitmap.height)
            imageProxy.close()
        }
    }

    private fun imageProxyToBitmap(image: ImageProxy): Bitmap {
        val yBuffer = image.planes[0].buffer
        val uBuffer = image.planes[1].buffer
        val vBuffer = image.planes[2].buffer
        val ySize = yBuffer.remaining()
        val uSize = uBuffer.remaining()
        val vSize = vBuffer.remaining()
        val nv21 = ByteArray(ySize + uSize + vSize)
        yBuffer.get(nv21, 0, ySize)
        vBuffer.get(nv21, ySize, vSize)
        uBuffer.get(nv21, ySize + vSize, uSize)
        val yuvImage = YuvImage(nv21, ImageFormat.NV21, image.width, image.height, null)
        val out = ByteArrayOutputStream()
        yuvImage.compressToJpeg(Rect(0, 0, yuvImage.width, yuvImage.height), 100, out)
        val imageBytes = out.toByteArray()
        return BitmapFactory.decodeByteArray(imageBytes, 0, imageBytes.size)
    }

    private fun preprocessImage(bitmap: Bitmap): ByteBuffer {
        val resizedBitmap =
            Bitmap.createScaledBitmap(bitmap, MODEL_INPUT_WIDTH, MODEL_INPUT_HEIGHT, true)
        val buffer = ByteBuffer.allocateDirect(1 * MODEL_INPUT_WIDTH * MODEL_INPUT_HEIGHT * 3 * 4)
        buffer.order(ByteOrder.nativeOrder())
        val intValues = IntArray(MODEL_INPUT_WIDTH * MODEL_INPUT_HEIGHT)
        resizedBitmap.getPixels(
            intValues,
            0,
            resizedBitmap.width,
            0,
            0,
            resizedBitmap.width,
            resizedBitmap.height
        )
        var pixel = 0
        for (i in 0 until MODEL_INPUT_WIDTH) {
            for (j in 0 until MODEL_INPUT_HEIGHT) {
                val value = intValues[pixel++]
                buffer.putFloat(((value shr 16) and 0xFF) / 255.0f)
                buffer.putFloat(((value shr 8) and 0xFF) / 255.0f)
                buffer.putFloat((value and 0xFF) / 255.0f)
            }
        }
        return buffer
    }

    private fun postprocessResults(
        buffer: ByteBuffer,
        imageWidth: Int,
        imageHeight: Int
    ): List<DetectionResult> {
        buffer.rewind()
        val floatBuffer = buffer.asFloatBuffer()
        val detections = mutableListOf<DetectionResult>()

        for (i in 0 until NUM_DETECTIONS) {
            val detection = FloatArray(labels.size + 5)
            floatBuffer.get(detection)

            val confidence = detection[4]
            if (confidence > CONFIDENCE_THRESHOLD) {
                val classScores = detection.sliceArray(5 until labels.size + 5)
                var maxScore = 0f
                var classIndex = -1
                for (j in classScores.indices) {
                    if (classScores[j] > maxScore) {
                        maxScore = classScores[j]
                        classIndex = j
                    }
                }

                if (maxScore > CONFIDENCE_THRESHOLD) {
                    val finalScore = confidence * maxScore
                    if (finalScore > CONFIDENCE_THRESHOLD) {
                        val label = labels[classIndex]
                        val cx = detection[0] * imageWidth
                        val cy = detection[1] * imageHeight
                        val w = detection[2] * imageWidth
                        val h = detection[3] * imageHeight
                        val box = RectF(cx - w / 2, cy - h / 2, cx + w / 2, cy + h / 2)
                        detections.add(DetectionResult(box, label, finalScore))
                    }
                }
            }
        }
        return nonMaxSuppression(detections)
    }

    private fun nonMaxSuppression(detections: List<DetectionResult>): List<DetectionResult> {
        val sortedDetections = detections.sortedByDescending { it.confidence }
        val selectedDetections = mutableListOf<DetectionResult>()

        for (detection in sortedDetections) {
            var shouldAdd = true
            for (selected in selectedDetections) {
                val iou = calculateIoU(detection.boundingBox, selected.boundingBox)
                if (iou > IOU_THRESHOLD) {
                    shouldAdd = false
                    break
                }
            }
            if (shouldAdd) {
                selectedDetections.add(detection)
            }
        }
        return selectedDetections
    }

    private fun calculateIoU(box1: RectF, box2: RectF): Float {
        val xA = max(box1.left, box2.left)
        val yA = max(box1.top, box2.top)
        val xB = min(box1.right, box2.right)
        val yB = min(box1.bottom, box2.bottom)
        val intersectionArea = max(0f, xB - xA) * max(0f, yB - yA)
        val box1Area = (box1.right - box1.left) * (box1.bottom - box1.top)
        val box2Area = (box2.right - box2.left) * (box2.bottom - box2.top)
        val unionArea = box1Area + box2Area - intersectionArea
        return if (unionArea > 0) intersectionArea / unionArea else 0f
    }

    private fun isCameraPermissionGranted(): Boolean {
        return ContextCompat.checkSelfPermission(
            requireContext(),
            Manifest.permission.CAMERA
        ) == PackageManager.PERMISSION_GRANTED
    }

    override fun onDestroyView() {
        super.onDestroyView()
        _binding = null
    }

    private fun shutdownExecutor() {
        if (::cameraExecutor.isInitialized && !cameraExecutor.isShutdown) {
            cameraExecutor.shutdown()
            try {
                if (!cameraExecutor.awaitTermination(100, TimeUnit.MILLISECONDS)) {
                    cameraExecutor.shutdownNow()
                }
            } catch (e: InterruptedException) {
                cameraExecutor.shutdownNow()
            }
        }
    }

    override fun onDestroy() {
        super.onDestroy()
        if (::interpreter.isInitialized) {
            interpreter.close()
        }
    }
}
