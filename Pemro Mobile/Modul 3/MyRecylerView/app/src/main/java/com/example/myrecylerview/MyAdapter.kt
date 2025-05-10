package com.example.myrecylerview

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.myrecylerview.databinding.ItemLayoutBinding

class MyAdapter(
    private val listCharacter: ArrayList<MyData>,
    private val onYTClick: (String) -> Unit,
    private val onDetailClick: (String, Int, String) -> Unit
) : RecyclerView.Adapter<MyAdapter.ListViewHolder>() {

    class ListViewHolder(val binding: ItemLayoutBinding) : RecyclerView.ViewHolder(binding.root)

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ListViewHolder {
        val binding = ItemLayoutBinding.inflate(LayoutInflater.from(parent.context), parent, false)
        return ListViewHolder(binding)
    }

    override fun getItemCount(): Int = listCharacter.size

    override fun onBindViewHolder(holder: ListViewHolder, position: Int) {
        val (name, link, photo, detail, subtext) = listCharacter[position]
        with(holder.binding) {
            textTitle.text = name
            textDescription.text = subtext
            itemImage.setImageResource(photo)
            btnWebsite.setOnClickListener { onYTClick(link) }
            btnDetails.setOnClickListener { onDetailClick(detail, photo, link) }
        }
    }
}
