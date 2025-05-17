package com.example.diceroller

import android.os.Bundle
import android.widget.Toast
import androidx.activity.viewModels
import androidx.appcompat.app.AppCompatActivity
import androidx.lifecycle.Observer
import com.example.diceroller.databinding.ActivityMainBinding

class MainActivity : AppCompatActivity() {

    private lateinit var binding :ActivityMainBinding
    private val viewModel : DiceViewModel by viewModels()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.button.setOnClickListener {
            viewModel.rollDice()
        }
        viewModel.dice1.observe(this,Observer { value ->
            binding.imageView.setImageResource(getDiceImage(value))
        })
        viewModel.dice2.observe(this,Observer { value ->
            binding.imageView2.setImageResource(getDiceImage(value))
        })
        viewModel.isDouble.observe(this,Observer{ isDouble ->
            if (isDouble){
                Toast.makeText(this,"Selamat anda dapat dadu double", Toast.LENGTH_SHORT).show()
            }else{
                Toast.makeText(this,"Anda belum beruntung", Toast.LENGTH_SHORT).show()
            }
        })
    }

    private fun getDiceImage(value: Int):Int{
        return when(value){
            1 ->R.drawable.dice_1
            2 ->R.drawable.dice_2
            3 ->R.drawable.dice_3
            4 ->R.drawable.dice_4
            5 ->R.drawable.dice_5
            else -> R.drawable.dice_6
        }
    }
}