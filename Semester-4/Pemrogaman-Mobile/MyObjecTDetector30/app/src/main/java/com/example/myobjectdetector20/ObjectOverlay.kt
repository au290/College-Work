package com.example.myobjectdetector20

import android.content.Context
import android.graphics.*
import android.util.AttributeSet
import android.view.View

class ObjectOverlay(context: Context, attrs: AttributeSet) : View(context, attrs) {

    private var detectionResults: List<DetectionResult> = emptyList()
    private var imageWidth: Int = 1
    private var imageHeight: Int = 1

    private val boxPaint = Paint().apply {
        color = Color.GREEN
        style = Paint.Style.STROKE
        strokeWidth = 8f
    }

    private val textBackgroundPaint = Paint().apply {
        color = Color.argb(180, 0, 0, 0) // semi-transparent black
        style = Paint.Style.FILL
    }

    private val textPaint = Paint().apply {
        color = Color.WHITE
        textSize = 50f
        style = Paint.Style.FILL
        typeface = Typeface.DEFAULT_BOLD
    }

    fun updateResults(results: List<DetectionResult>, imageWidth: Int, imageHeight: Int, isFrontCamera: Boolean) {
        this.detectionResults = results
        this.imageWidth = imageWidth
        this.imageHeight = imageHeight
        invalidate()
    }

    override fun onDraw(canvas: Canvas) {
        super.onDraw(canvas)

        if (detectionResults.isEmpty()) return

        val scaleX = width.toFloat() / imageWidth
        val scaleY = height.toFloat() / imageHeight

        for (result in detectionResults) {
            val boundingBox = result.boundingBox

            val left = boundingBox.left * scaleX
            val top = boundingBox.top * scaleY
            val right = boundingBox.right * scaleX
            val bottom = boundingBox.bottom * scaleY

            canvas.drawRect(left, top, right, bottom, boxPaint)

            val label = "${result.label} %.2f".format(result.confidence)
            val textBounds = Rect()
            textPaint.getTextBounds(label, 0, label.length, textBounds)
            val textHeight = textBounds.height()

            val textX = left + 5f
            val textY = top - 10f

            canvas.drawRect(
                left,
                top - textHeight - 20f,
                left + textBounds.width() + 10f,
                top,
                textBackgroundPaint
            )
            canvas.drawText(label, textX, textY, textPaint)
        }
    }
}

data class DetectionResult(val boundingBox: RectF, val label: String, val confidence: Float)
