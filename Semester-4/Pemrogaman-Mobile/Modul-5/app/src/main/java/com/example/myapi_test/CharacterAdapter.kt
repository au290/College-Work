package com.example.myapi_test

import android.content.Intent
import android.net.Uri
import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.example.myapi_test.databinding.ItemListBinding
import java.text.NumberFormat
import java.util.Locale

class CharacterAdapter(
    private var characters: List<CharacterInfo>,
    private val onDetailClick: (CharacterInfo) -> Unit
) : RecyclerView.Adapter<CharacterAdapter.CharacterViewHolder>() {

    inner class CharacterViewHolder(val binding: ItemListBinding) :
        RecyclerView.ViewHolder(binding.root) {

        fun bind(character: CharacterInfo) {
            binding.apply {
                textViewCharacterName.text = character.characterName
                val formattedFavorites = NumberFormat.getNumberInstance(Locale.US).format(character.favorites)
                textViewFavorites.text = formattedFavorites

                val vaJapaneseText = "JP: ${character.japaneseVoiceActor ?: "N/A"}"
                val vaEnglishText = "EN: ${character.englishVoiceActor ?: "N/A"}"
                textViewVoiceActors.text = "$vaJapaneseText\n$vaEnglishText"

                Glide.with(imageViewCharacter.context)
                    .load(character.characterImageUrl)
                    .into(imageViewCharacter)

                buttonDetail.setOnClickListener {
                    onDetailClick(character)
                }

                buttonUrl.setOnClickListener {
                    val intent = Intent(Intent.ACTION_VIEW, Uri.parse(character.characterUrl))
                    imageViewCharacter.context.startActivity(intent)
                }
            }
        }
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): CharacterViewHolder {
        val binding = ItemListBinding.inflate(LayoutInflater.from(parent.context), parent, false)
        return CharacterViewHolder(binding)
    }

    override fun getItemCount() = characters.size

    override fun onBindViewHolder(holder: CharacterViewHolder, position: Int) {
        holder.bind(characters[position])
    }

    fun setData(newCharacters: List<CharacterInfo>) {
        characters = newCharacters
        notifyDataSetChanged()
    }
}
