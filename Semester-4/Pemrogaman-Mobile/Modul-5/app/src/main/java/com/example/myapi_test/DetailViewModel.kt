package com.example.myapi_test

import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import kotlinx.coroutines.launch
import java.io.IOException

class DetailViewModel(private val repository: CharacterRepository) : ViewModel() {

    private val _characterDetails = MutableLiveData<CharacterDetails>()
    val characterDetails: LiveData<CharacterDetails> get() = _characterDetails

    private val _error = MutableLiveData<String?>()
    val error: LiveData<String?> get() = _error

    fun fetchCharacterDetails(characterId: Int) {
        viewModelScope.launch {
            try {
                val response = repository.getCharacterDetails(characterId)
                _characterDetails.value = response.data
                _error.value = null //
            } catch (e: IOException) {
                _error.value = "Failed to load details due to a network error."
            } catch (e: Exception) {
                _error.value = "An unexpected error occurred while fetching details."
            }
        }
    }
}