package com.example.myrecylerview

import android.content.Intent
import android.net.Uri
import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.fragment.app.Fragment
import androidx.navigation.fragment.findNavController
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.myrecylerview.databinding.FragmentMyBinding


class MyFragment : Fragment() {

    private var _binding: FragmentMyBinding? = null
    private val binding get() = _binding!!

    private lateinit var characterAdapter: MyAdapter
    private val list = ArrayList<MyData>()

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View {
        _binding = FragmentMyBinding.inflate(inflater, container, false)
        list.clear()
        list.addAll(getListCharacter())
        setupRecyclerView()
        return binding.root
    }

    private fun setupRecyclerView() {
        characterAdapter = MyAdapter(
            list,
            onYTClick = { link ->
                val intent = Intent(Intent.ACTION_VIEW, Uri.parse(link))
                startActivity(intent)
            },
            onDetailClick = { detail, photo, link ->
                val action = MyFragmentDirections
                    .actionMyFragmentToDetailFragment(photo, link, detail)
                findNavController().navigate(action)
            }
        )

        binding.rvCharacter.apply {
            layoutManager = LinearLayoutManager(requireContext())
            adapter = characterAdapter
            setHasFixedSize(true)
        }
    }

    private fun getListCharacter(): ArrayList<MyData> {
        val dataName = resources.getStringArray(R.array.data_name)
        val dataLink = resources.getStringArray(R.array.data_link)
        val dataSubtext = resources.getStringArray(R.array.data_subtext)
        val dataPhoto = resources.obtainTypedArray(R.array.data_photo)
        val dataDetail = resources.getStringArray(R.array.data_detail)
        val listCharacter = ArrayList<MyData>()
        for (i in dataName.indices) {
            val character = MyData(
                name = dataName[i],
                link = dataLink[i],
                subtext = dataSubtext[i],
                detail = dataDetail[i],
                photo = dataPhoto.getResourceId(i, -1)
            )
            listCharacter.add(character)
        }
        dataPhoto.recycle()
        return listCharacter
    }

    override fun onDestroyView() {
        super.onDestroyView()
        _binding = null
    }
}
