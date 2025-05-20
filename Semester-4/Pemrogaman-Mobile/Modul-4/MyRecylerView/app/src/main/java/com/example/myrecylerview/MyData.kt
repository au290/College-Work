package com.example.myrecylerview

import android.os.Parcelable
import kotlinx.parcelize.Parcelize

@Parcelize
data class MyData(
    val name: String,
    val link: String,
    val photo: Int,
    val detail: String,
    val subtext: String
):Parcelable