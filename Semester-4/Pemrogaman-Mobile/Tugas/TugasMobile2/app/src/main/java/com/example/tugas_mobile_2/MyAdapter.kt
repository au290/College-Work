package com.example.tugas_mobile_2

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.example.tugas_mobile_2.databinding.ItemPostBinding

class MyAdapter(private val posts: List<ApiResponse>) :
    RecyclerView.Adapter<MyAdapter.PostViewHolder>() {

        inner class PostViewHolder(private val binding: ItemPostBinding) :
            RecyclerView.ViewHolder(binding.root) {
            fun bind(mahasigma: ApiResponse) {
                binding.nama.text = mahasigma.name
                binding.nim.text = mahasigma.desc
                Glide.with(binding.root.context)
                    .asBitmap()
                    .load(mahasigma.image)
                    .into(binding.avatar)
            }
        }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): PostViewHolder {
        val binding = ItemPostBinding.inflate(LayoutInflater.from(parent.context), parent, false)
        return PostViewHolder(binding)
    }

    override fun getItemCount() = posts.size

    override fun onBindViewHolder(holder: PostViewHolder, position: Int) {
        holder.bind(posts[position])
    }
}
