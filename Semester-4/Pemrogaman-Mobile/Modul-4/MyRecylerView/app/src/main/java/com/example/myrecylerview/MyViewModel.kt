package com.example.myrecylerview

import android.app.Application
import android.util.Log
import androidx.lifecycle.AndroidViewModel
import kotlinx.coroutines.flow.MutableStateFlow
import kotlinx.coroutines.flow.StateFlow

class MyViewModel(application: Application) : AndroidViewModel(application) {

    private val _characterList = MutableStateFlow<List<MyData>>(emptyList())
    val characterList: StateFlow<List<MyData>> = _characterList

    private val _uiEvent = MutableStateFlow<UiEvent?>(null)
    val uiEvent: StateFlow<UiEvent?> = _uiEvent

    fun loadCharacterList() {
        val context = getApplication<Application>()
        val resources = context.resources

        val dataName = resources.getStringArray(R.array.data_name)
        val dataLink = resources.getStringArray(R.array.data_link)
        val dataSubtext = resources.getStringArray(R.array.data_subtext)
        val dataPhoto = resources.obtainTypedArray(R.array.data_photo)
        val dataDetail = resources.getStringArray(R.array.data_detail)

        val listCharacter = List(dataName.size) { i ->
            MyData(
                name = dataName[i],
                link = dataLink[i],
                subtext = dataSubtext[i],
                detail = dataDetail[i],
                photo = dataPhoto.getResourceId(i, -1)
            )
        }

        dataPhoto.recycle()
        _characterList.value = listCharacter

        Log.d("MyViewModel", "Loaded ${listCharacter.size} characters: $listCharacter")
    }

    fun onYTClick(link: String) {
        Log.d("MyViewModel", "YouTube button clicked with link: $link")
        _uiEvent.value = UiEvent.OpenYouTube(link)
    }

    fun onDetailClick(detail: String, photo: Int, link: String) {
        Log.d("MyViewModel", "Detail button clicked with data -> detail: $detail, photo: $photo, link: $link")
        _uiEvent.value = UiEvent.NavigateToDetail(photo, link, detail)
    }

    fun clearEvent() {
        _uiEvent.value = null
    }

    sealed class UiEvent {
        data class OpenYouTube(val link: String) : UiEvent()
        data class NavigateToDetail(val photo: Int, val link: String, val detail: String) : UiEvent()
    }
}