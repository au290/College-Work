package com.example.myapi_test

import retrofit2.http.GET
import retrofit2.http.Path

interface JikanApiService {
    @GET("anime/{id}/characters")
    suspend fun getAnimeCharacters(@Path("id") animeId: Int): AnimeCharactersResponse

    @GET("characters/{id}")
    suspend fun getCharacterDetails(@Path("id") characterId: Int): CharacterDetailResponse
}