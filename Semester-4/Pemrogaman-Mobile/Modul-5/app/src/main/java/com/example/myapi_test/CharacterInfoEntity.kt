package com.example.myapi_test

import androidx.room.Entity
import androidx.room.PrimaryKey

@Entity(tableName = "characters")
data class CharacterInfoEntity(
    @PrimaryKey
    val characterId: Int,
    val characterName: String,
    val characterUrl: String,
    val characterImageUrl: String,
    val japaneseVoiceActor: String?,
    val englishVoiceActor: String?,
    val favorites: Int
)