package com.example.tiptime

import android.os.Bundle
import android.widget.Toast
import androidx.activity.viewModels
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.app.AppCompatDelegate
import androidx.core.splashscreen.SplashScreen.Companion.installSplashScreen
import androidx.lifecycle.Observer
import com.example.tiptime.databinding.ActivityMainBinding

class MainActivity : AppCompatActivity() {

    private lateinit var binding : ActivityMainBinding
    private val viewModel: TipViewModel by viewModels()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        installSplashScreen()

        AppCompatDelegate.setDefaultNightMode(AppCompatDelegate.MODE_NIGHT_NO)

        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.filledButton.setOnClickListener{
            val input = binding.EditText.text?.toString()?.trim()
            val isRounded = binding.tipround.isChecked
            val tipPercentage = when (binding.radiobuttonGroup.checkedRadioButtonId){
                R.id.option1 -> 0.20
                R.id.option2 -> 0.18
                R.id.option3 -> 0.15
                else -> null
            }
            viewModel.calculateTip(input, tipPercentage, isRounded)
        }

        viewModel.tipResult.observe(this,Observer { result ->
            binding.resultText.text = result
        })
        viewModel.errorMessage.observe(this,Observer{ message ->
            message?.let {
                Toast.makeText(this,it,Toast.LENGTH_SHORT).show()
                viewModel.errorMessageHandled()
            }
        })
    }
}