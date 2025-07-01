package com.example.myobjectdetector20.api

import retrofit2.Call
import retrofit2.http.GET

interface ApiService {
    @GET("data")
    fun getData(): Call<LabelListDto>
}
