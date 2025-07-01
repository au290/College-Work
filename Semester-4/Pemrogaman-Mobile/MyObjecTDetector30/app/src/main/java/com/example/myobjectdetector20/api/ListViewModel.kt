package com.example.myobjectdetector20.api

import android.app.Application
import androidx.lifecycle.AndroidViewModel
import androidx.lifecycle.LiveData
import androidx.lifecycle.viewModelScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch

class ListViewModel(application: Application) : AndroidViewModel(application) {

    private val repository: LabelRepository
    val allLabels: LiveData<List<LabelEntity>>

    init {
        val labelDao = AppDatabase.getDatabase(application).labelDao()
        repository = LabelRepository(labelDao)
        allLabels = repository.allLabels
        refreshDataFromRepository()
    }

    private fun refreshDataFromRepository() = viewModelScope.launch(Dispatchers.IO) {
        repository.refreshData()
    }
}
