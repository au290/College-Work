package com.example.myrecylerview

import android.content.Intent
import android.net.Uri
import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.fragment.app.Fragment
import androidx.lifecycle.ViewModelProvider
import androidx.lifecycle.lifecycleScope
import androidx.navigation.fragment.findNavController
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.myrecylerview.databinding.FragmentMyBinding


class MyFragment : Fragment() {

    private var _binding: FragmentMyBinding? = null
    private val binding get() = _binding!!

    private lateinit var viewModel: MyViewModel
    private lateinit var characterAdapter: MyAdapter

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View {
        _binding = FragmentMyBinding.inflate(inflater, container, false)
        return binding.root
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

        viewModel = ViewModelProvider(
            this,
            MyViewModelFactory(requireActivity().application)
        )[MyViewModel::class.java]

        characterAdapter = MyAdapter(
            onYTClick = { link -> viewModel.onYTClick(link) },
            onDetailClick = { detail, photo, link -> viewModel.onDetailClick(detail, photo, link) }
        )

        binding.rvCharacter.apply {
            layoutManager = LinearLayoutManager(requireContext())
            adapter = characterAdapter
            setHasFixedSize(true)
        }

        // Observe StateFlow
        lifecycleScope.launchWhenStarted {
            viewModel.characterList.collect { list ->
                characterAdapter.submitList(list)
            }
        }

        lifecycleScope.launchWhenStarted {
            viewModel.uiEvent.collect { event ->
                when (event) {
                    is MyViewModel.UiEvent.OpenYouTube -> {
                        val intent = Intent(Intent.ACTION_VIEW, Uri.parse(event.link))
                        startActivity(intent)
                    }
                    is MyViewModel.UiEvent.NavigateToDetail -> {
                        val action = MyFragmentDirections
                            .actionMyFragmentToDetailFragment(event.photo, event.link, event.detail)
                        findNavController().navigate(action)
                    }
                    null -> Unit
                }
                viewModel.clearEvent()
            }
        }

        viewModel.loadCharacterList()
    }

    override fun onDestroyView() {
        super.onDestroyView()
        _binding = null
    }
}

