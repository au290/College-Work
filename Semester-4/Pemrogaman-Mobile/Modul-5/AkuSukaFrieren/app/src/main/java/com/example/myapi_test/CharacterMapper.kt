package com.example.myapi_test

fun mapToCharacterInfoList(characterDataList: List<CharacterListItem>?): List<CharacterInfo> {
    return characterDataList?.map { data ->
        CharacterInfo(
            characterId = data.character.malId,
            characterName = data.character.name ?: "Name not found",
            characterUrl = data.character.url,
            characterImageUrl = data.character.images?.jpg?.imageUrl ?: "",

            japaneseVoiceActor = data.voices?.find { it.language.equals("Japanese", ignoreCase = true) }?.person?.name,
            englishVoiceActor = data.voices?.find { it.language.equals("English", ignoreCase = true) }?.person?.name,
            favorites = data.favorites
        )
    } ?: emptyList()
}