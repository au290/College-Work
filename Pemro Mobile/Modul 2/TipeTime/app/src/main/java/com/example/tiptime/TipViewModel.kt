package com.example.tiptime

import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import kotlin.math.ceil

class TipViewModel: ViewModel() {
    private val _tipResult = MutableLiveData<String>()
    val tipResult: LiveData<String> = _tipResult

    private val _errorMessage = MutableLiveData<String?>()
    val errorMessage: LiveData<String?> = _errorMessage

    fun calculateTip(ammountInput: String?,tipPercentage: Double?, isRounded: Boolean){
        val ammount = ammountInput?.toDoubleOrNull()
        if (ammount == null || tipPercentage == null){
            _errorMessage.value = "Input Harus Berupa Angka"
            return
        }

        val tip = ammount * tipPercentage
        val total = if (isRounded) ammount + ceil(tip) else ammount + tip
        _tipResult.value = "Tip Ammount $$total"
    }

    fun errorMessageHandled() {
        _errorMessage.value = null
    }


}