package com.example.tugas_mobile_2

import retrofit2.http.GET

interface ApiService {
    @GET("/multi-api-test")
    suspend fun getMessage(): List<ApiResponse>
}