package com.example.tugas_mobile_2

import retrofit2.http.GET

interface ApiService {
    @GET("character")
    suspend fun getMessage(): ApiResponse
}