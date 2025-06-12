package com.example.myapi_test

fun CharacterInfo.toCharacterInfoEntity(): CharacterInfoEntity {
    return CharacterInfoEntity(
        characterId = this.characterId,
        characterName = this.characterName,
        characterUrl = this.characterUrl,
        characterImageUrl = this.characterImageUrl,
        japaneseVoiceActor = this.japaneseVoiceActor,
        englishVoiceActor = this.englishVoiceActor,
        favorites = this.favorites
    )
}

fun CharacterInfoEntity.toCharacterInfo(): CharacterInfo {
    return CharacterInfo(
        characterId = this.characterId,
        characterName = this.characterName,
        characterUrl = this.characterUrl,
        characterImageUrl = this.characterImageUrl,
        japaneseVoiceActor = this.japaneseVoiceActor,
        englishVoiceActor = this.englishVoiceActor,
        favorites = this.favorites
    )
}