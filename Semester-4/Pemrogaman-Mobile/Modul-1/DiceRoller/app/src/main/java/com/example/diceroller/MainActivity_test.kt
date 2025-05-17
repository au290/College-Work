package com.example.diceroller

import android.os.Bundle
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.diceroller.databinding.ActivityMainBinding

class MainActivity222 : AppCompatActivity() {

    private lateinit var binding :ActivityMainBinding
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.button.setOnClickListener {
            rollDice()
        }
        //this function is to react when the button is click
    }
    private fun rollDice() {
        val dice_1 = getRoll()
        val dice_2 = getRoll()

        binding.imageView.setImageResource(getDiceImage(dice_1))
        binding.imageView2.setImageResource(getDiceImage(dice_2))

        if (dice_1 == dice_2){
            Toast.makeText(this,"Selamat anda dapat dadu double",Toast.LENGTH_SHORT).show()
        }
        else {
            Toast.makeText(this,"Anda belum beruntung",Toast.LENGTH_SHORT).show()
        }
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
    private fun getRoll():Int{
        return (1..6).random()
    }
}