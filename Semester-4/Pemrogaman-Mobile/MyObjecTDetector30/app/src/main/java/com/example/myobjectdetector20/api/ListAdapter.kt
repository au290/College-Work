package com.example.myobjectdetector20.api

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.DiffUtil
import androidx.recyclerview.widget.ListAdapter
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.example.myobjectdetector20.R
import com.example.myobjectdetector20.databinding.ListItemBinding

class ListAdapter : ListAdapter<LabelEntity, ListAdapter.LabelViewHolder>(DiffCallback()) {

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): LabelViewHolder {
        val binding = ListItemBinding.inflate(LayoutInflater.from(parent.context), parent, false)
        return LabelViewHolder(binding)
    }

    override fun onBindViewHolder(holder: LabelViewHolder, position: Int) {
        val currentItem = getItem(position)
        holder.bind(currentItem)
    }

    class LabelViewHolder(private val binding: ListItemBinding) : RecyclerView.ViewHolder(binding.root) {
        fun bind(label: LabelEntity) {
            binding.apply {
                itemName.text = label.name.replace("_", " ").capitalize()
                itemDesc.text = label.desc

                Glide.with(itemView.context)
                    .load(label.image_url)
                    .placeholder(R.drawable.ic_camera_large)
                    .error(R.drawable.ic_camera_large)
                    .into(itemImage)
            }
        }
    }

    class DiffCallback : DiffUtil.ItemCallback<LabelEntity>() {
        override fun areItemsTheSame(oldItem: LabelEntity, newItem: LabelEntity) =
            oldItem.id == newItem.id

        override fun areContentsTheSame(oldItem: LabelEntity, newItem: LabelEntity) =
            oldItem == newItem
    }
}
