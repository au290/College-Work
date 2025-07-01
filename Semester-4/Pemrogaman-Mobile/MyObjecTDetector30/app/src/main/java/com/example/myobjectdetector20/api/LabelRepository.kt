package com.example.myobjectdetector20.api

import android.util.Log
import androidx.lifecycle.LiveData

class LabelRepository(private val labelDao: LabelDao) {

    val allLabels: LiveData<List<LabelEntity>> = labelDao.getAllLabels()

    suspend fun refreshData() {
        try {
            val response = RetrofitClient.instance.getData().execute()
            if (response.isSuccessful) {
                response.body()?.labels?.let { dtoList ->
                    labelDao.insertAll(dtoList.asDatabaseModel())
                }
            }
        } catch (e: Exception) {
            Log.e("LabelRepository", "Network request failed: ${e.message}")
        }
    }
}
