package com.example.diceroller

import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import kotlin.random.Random

class DiceViewModel : ViewModel() {
    private val _dice1 = MutableLiveData(1)
    val dice1 : LiveData<Int>
        get() = _dice1

    private val _dice2 = MutableLiveData(1)
    val dice2 : LiveData<Int>
        get() = _dice2

    private val _isDouble = MutableLiveData(false)
    val isDouble : LiveData<Boolean>
        get() = _isDouble

    fun rollDice() {
        val roll1 = Random.nextInt(1,7)
        val roll2 = Random.nextInt(1,7)
        _dice1.value = roll1
        _dice2.value = roll2
        _isDouble.value = roll2 == roll1
    }
}