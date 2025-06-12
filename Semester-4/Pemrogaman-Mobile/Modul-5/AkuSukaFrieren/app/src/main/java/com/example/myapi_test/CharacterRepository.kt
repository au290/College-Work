package com.example.myapi_test

import kotlinx.coroutines.flow.Flow
import kotlinx.coroutines.flow.map

class CharacterRepository(
    private val apiService: JikanApiService,
    private val characterDao: CharacterDao
) {

    fun getAnimeCharacters(): Flow<List<CharacterInfo>> {
        return characterDao.getCharacters().map { entities ->
            entities.map { it.toCharacterInfo() }
        }
    }

    suspend fun refreshCharacters(animeId: Int) {
        val response = apiService.getAnimeCharacters(animeId)
        val characterInfoList = mapToCharacterInfoList(response.data)

        characterDao.clearAll()
        characterDao.insertAll(characterInfoList.map { it.toCharacterInfoEntity() })
    }

    suspend fun getCharacterDetails(characterId: Int): CharacterDetailResponse {
        return apiService.getCharacterDetails(characterId)
    }
}