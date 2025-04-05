package com.example.modul_1_praktikum

import android.media.MediaPlayer
import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import android.widget.Toast
import com.example.modul_1_praktikum.databinding.ActivityMainBinding

class MainActivity : AppCompatActivity() {

    private lateinit var binding: ActivityMainBinding
    private var diceValue1 = 1
    private var diceValue2 = 1

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)

        if (savedInstanceState != null) {
            diceValue1 = savedInstanceState.getInt("dice1", 1)
            diceValue2 = savedInstanceState.getInt("dice2", 1)

            binding.imageView.setImageResource(getDiceImage(diceValue1))
            binding.imageView2.setImageResource(getDiceImage(diceValue2))
        }

        binding.button.setOnClickListener {
            rollDice()
        }
    }


    override fun onSaveInstanceState(outState: Bundle) {
        super.onSaveInstanceState(outState)
        outState.putInt("dice1", diceValue1)
        outState.putInt("dice2", diceValue2)
    }

    private fun rollDice() {
        binding.button.isEnabled = false

        val mediaPlayer = MediaPlayer.create(this, R.raw.dice_roll)
        mediaPlayer.start()

        mediaPlayer.setOnCompletionListener {
            it.release()
        }

        val diceSides1 = DiceR(6)
        diceValue1 = diceSides1.roll()

        val diceSides2 = DiceR(6)
        diceValue2 = diceSides2.roll()

        binding.imageView.setImageResource(getDiceImage(diceValue1))
        binding.imageView2.setImageResource(getDiceImage(diceValue2))

        if (diceValue1 == diceValue2) {
            val toast =
                Toast.makeText(this, "Selamat anda dapat dadu double!", Toast.LENGTH_SHORT).show()
        } else {
            val toast = Toast.makeText(this, "Anda belum beruntung!", Toast.LENGTH_SHORT).show()
        }
        binding.button.postDelayed({
            binding.button.isEnabled = true
        }, 2000)

    }

    private fun getDiceImage(value: Int): Int {
        return when (value) {
            1 -> R.drawable.dice_1
            2 -> R.drawable.dice_2
            3 -> R.drawable.dice_3
            4 -> R.drawable.dice_4
            5 -> R.drawable.dice_5
            else -> R.drawable.dice_6
        }
    }
}

class DiceR(val numsides : Int){
    fun roll():Int = (1..numsides).random()
}

