package com.example.tugas_mobile_2

data class ApiResponse(
    val results: List<Character>
)
data class CharacterLocation(
    val name: String,
    val url: String
)

data class Character(
    val name: String,
    val species: String,
    val image: String,
    val location: CharacterLocation,
    val status: String, // Ensure this field is present
    val origin: CharacterLocation,
)