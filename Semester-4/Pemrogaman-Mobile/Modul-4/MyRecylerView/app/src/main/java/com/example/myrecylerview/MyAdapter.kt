package com.example.myrecylerview

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.myrecylerview.databinding.ItemLayoutBinding

class MyAdapter(
    private val onYTClick: (String) -> Unit,
    private val onDetailClick: (String, Int, String) -> Unit
) : RecyclerView.Adapter<MyAdapter.ListViewHolder>() {

    private val items = ArrayList<MyData>()

    fun submitList(newList: List<MyData>) {
        items.clear()
        items.addAll(newList)
        notifyDataSetChanged()
    }

    class ListViewHolder(val binding: ItemLayoutBinding) : RecyclerView.ViewHolder(binding.root)

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ListViewHolder {
        val binding = ItemLayoutBinding.inflate(LayoutInflater.from(parent.context), parent, false)
        return ListViewHolder(binding)
    }

    override fun getItemCount(): Int = items.size

    override fun onBindViewHolder(holder: ListViewHolder, position: Int) {
        val (name, link, photo, detail, subtext) = items[position]
        with(holder.binding) {
            textTitle.text = name
            textDescription.text = subtext
            itemImage.setImageResource(photo)
            btnWebsite.setOnClickListener { onYTClick(link) }
            btnDetails.setOnClickListener { onDetailClick(detail, photo, link) }
        }
    }
}

