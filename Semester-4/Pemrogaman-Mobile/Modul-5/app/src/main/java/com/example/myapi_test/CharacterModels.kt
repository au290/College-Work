package com.example.myapi_test
import android.os.Parcelable
import kotlinx.parcelize.Parcelize

import com.google.gson.annotations.SerializedName

@Parcelize
data class CharacterInfo(
    val characterId: Int,
    val characterName: String,
    val characterUrl: String,
    val characterImageUrl: String,
    val japaneseVoiceActor: String?,
    val englishVoiceActor: String?,
    val favorites: Int
) : Parcelable

data class AnimeCharactersResponse(
    @SerializedName("data")
    val data: List<CharacterListItem>
)

data class Character(
    @SerializedName("mal_id")
    val malId: Int,

    @SerializedName("url")
    val url: String,

    @SerializedName("images")
    val images: Images?,

    @SerializedName("name")
    val name: String?
)

data class CharacterListItem(
    @SerializedName("character")
    val character: Character,

    @SerializedName("role")
    val role: String,

    @SerializedName("favorites")
    val favorites: Int,

    @SerializedName("voice_actors")
    val voices: List<Voice>?
)

data class CharacterDetailResponse(
    @SerializedName("data")
    val data: CharacterDetails
)

data class CharacterDetails(
    @SerializedName("mal_id")
    val malId: Int,

    @SerializedName("url")
    val url: String,

    @SerializedName("images")
    val images: Images,

    @SerializedName("name")
    val name: String,

    @SerializedName("name_kanji")
    val nameKanji: String?,

    @SerializedName("favorites")
    val favorites: Int,

    @SerializedName("about")
    val about: String?,

    @SerializedName("voices")
    val voices: List<Voice>
)

data class Voice(
    @SerializedName("person")
    val person: Person,
    @SerializedName("language")
    val language: String
)

data class Person(
    @SerializedName("mal_id")
    val malId: Int,
    @SerializedName("url")
    val url: String,
    @SerializedName("images")
    val images: PersonImages,
    @SerializedName("name")
    val name: String
)

data class Images(
    @SerializedName("jpg")
    val jpg: ImageType
)

data class ImageType(
    @SerializedName("image_url")
    val imageUrl: String
)

data class PersonImages(
    @SerializedName("jpg")
    val jpg: ImageType
)