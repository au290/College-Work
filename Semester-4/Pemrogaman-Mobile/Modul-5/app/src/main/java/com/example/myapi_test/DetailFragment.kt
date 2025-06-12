package com.example.myapi_test

import android.content.Intent
import android.net.Uri
import android.os.Bundle
import android.util.Log
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.fragment.app.Fragment
import androidx.lifecycle.ViewModelProvider
import androidx.navigation.fragment.navArgs
import com.bumptech.glide.Glide
import com.example.myapi_test.databinding.FragmentDetailBinding
import java.text.NumberFormat
import java.util.Locale

class DetailFragment : Fragment() {

    private var _binding: FragmentDetailBinding? = null
    private val binding get() = _binding!!
    private val args: DetailFragmentArgs by navArgs()

    private lateinit var viewModel: DetailViewModel

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View {
        _binding = FragmentDetailBinding.inflate(inflater, container, false)
        return binding.root
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

        val characterDao = AppDatabase.getDatabase(requireContext()).characterDao()
        val repository = CharacterRepository(RetrofitInstance.api, characterDao)
        val viewModelFactory = CharacterViewModelFactory(repository)

        viewModel = ViewModelProvider(this, viewModelFactory)[DetailViewModel::class.java]

        bindInitialData(args.character)

        setupObservers()
        viewModel.fetchCharacterDetails(args.character.characterId)
    }

    private fun bindInitialData(character: CharacterInfo) {
        binding.apply {
            textViewNameDetail.text = character.characterName
            val formattedFavorites = NumberFormat.getNumberInstance(Locale.US)
                .format(character.favorites)
            textViewFavoritesDetail.text = "$formattedFavorites Favorites"
            textViewVoiceActorsList.text = "Loading voice actors..."

            Glide.with(this@DetailFragment)
                .load(character.characterImageUrl)
                .into(imageViewCharacterDetail)

            buttonViewProfileDetail.setOnClickListener {
                val intent = Intent(Intent.ACTION_VIEW, Uri.parse(character.characterUrl))
                context?.startActivity(intent)
            }
        }
    }

    private fun setupObservers() {
        viewModel.characterDetails.observe(viewLifecycleOwner) { details ->
            details?.let { bindFullData(it) }
        }

        viewModel.error.observe(viewLifecycleOwner) { errorMessage ->
            errorMessage?.let {
                binding.textViewVoiceActorsList.text = it
                Log.e("DetailFragment", "Error: $it")
            }
        }
    }

    private fun bindFullData(details: CharacterDetails) {
        binding.apply {
            textViewNameDetail.text = details.name
            val formattedFavorites = NumberFormat.getNumberInstance(Locale.US)
                .format(details.favorites)
            textViewFavoritesDetail.text = "$formattedFavorites Favorites"

            val voiceActorsText = details.voices.joinToString("\n") { voice ->
                "${voice.language}: ${voice.person.name}"
            }

            textViewVoiceActorsList.text = voiceActorsText.ifEmpty { "No voice actor information available." }
        }
    }

    override fun onDestroyView() {
        super.onDestroyView()
        _binding = null
    }
}