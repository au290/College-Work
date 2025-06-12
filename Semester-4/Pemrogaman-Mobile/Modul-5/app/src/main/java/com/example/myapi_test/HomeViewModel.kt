package com.example.myapi_test

import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import androidx.lifecycle.asLiveData
import androidx.lifecycle.viewModelScope
import kotlinx.coroutines.launch
import java.io.IOException

class HomeViewModel(private val repository: CharacterRepository) : ViewModel() {

    val characters: LiveData<List<CharacterInfo>> = repository.getAnimeCharacters().asLiveData()

    private val _isLoading = MutableLiveData<Boolean>()
    val isLoading: LiveData<Boolean> get() = _isLoading

    private val _error = MutableLiveData<String?>()
    val error: LiveData<String?> get() = _error

    init {
        refreshCharacterData()
    }

    fun refreshCharacterData() {
        viewModelScope.launch {
            _isLoading.value = true
            try {
                repository.refreshCharacters(52991)
                _error.value = null
            } catch (e: IOException) {
                _error.value = "Network error. Displaying cached data."
            } catch (e: Exception) {
                _error.value = "An unexpected error occurred during refresh."
            } finally {
                _isLoading.value = false
            }
        }
    }
}