package com.example.myobjectdetector20.api

import androidx.room.Entity
import androidx.room.PrimaryKey

/**
 * Data Transfer Object for the network response. This is used by Retrofit.
 */
data class LabelListDto(
    val labels: List<LabelDto>
)

/**
 * Data Transfer Object for a single label from the network.
 */
data class LabelDto(
    val id: Int,
    val name: String,
    val desc: String,
    val image_url: String
)

/**
 * Database Entity for storing a label. This is used by Room.
 */
@Entity(tableName = "labels")
data class LabelEntity(
    @PrimaryKey
    val id: Int,
    val name: String,
    val desc: String,
    val image_url: String
)

/**
 * Extension function to map a list of network DTOs to a list of database entities.
 */
fun List<LabelDto>.asDatabaseModel(): List<LabelEntity> {
    return map {
        LabelEntity(
            id = it.id,
            name = it.name,
            desc = it.desc,
            image_url = it.image_url
        )
    }
}
