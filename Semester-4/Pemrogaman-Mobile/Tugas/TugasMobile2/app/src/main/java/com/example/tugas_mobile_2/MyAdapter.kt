package com.example.tugas_mobile_2

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.core.content.ContextCompat // Import this
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.example.tugas_mobile_2.databinding.ItemPostBinding

class MyAdapter(private val characters: List<Character>) : // Renamed 'posts' to 'characters' for clarity
    RecyclerView.Adapter<MyAdapter.CharacterViewHolder>() { // Renamed 'PostViewHolder' for clarity

    // Renamed for clarity
    inner class CharacterViewHolder(val binding: ItemPostBinding) :
        RecyclerView.ViewHolder(binding.root)

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): CharacterViewHolder {
        val binding = ItemPostBinding.inflate(LayoutInflater.from(parent.context), parent, false)
        return CharacterViewHolder(binding)
    }

    override fun getItemCount() = characters.size

    override fun onBindViewHolder(holder: CharacterViewHolder, position: Int) {
        val character = characters[position] // Get the current character

        // Existing bindings
        holder.binding.name.text = character.name
        holder.binding.species.text = character.species
        holder.binding.lastSeenLocation.text = character.location.name // Assuming location.name is what you want

        Glide.with(holder.binding.root.context)
            // .asBitmap() // Usually not needed for standard ImageView display
            .load(character.image)
            .into(holder.binding.avatar)

        // --- Implement Status Indicator Logic ---
        val statusIndicatorDrawable = when (character.status.toLowerCase()) { // Use toLowerCase for case-insensitivity
            "alive" -> R.drawable.status_indicator_alive
            "dead" -> R.drawable.status_indicator_dead
            else -> R.drawable.status_indicator_unknown // For "unknown" or any other status
        }
        holder.binding.statusIndicator.setBackgroundResource(statusIndicatorDrawable)
// In onBindViewHolder method in MyAdapter.kt
// ... (other bindings for name, species, image, status_indicator) ...

        val originName = character.origin.name // e.g., "Earth (C-137)" or "unknown"
        var dimensionText = originName // Default to the full name

// Basic parsing example: Extract content within parentheses or use "N/A" if "unknown"
        if (originName.toLowerCase() == "unknown") {
            dimensionText = "N/A"
        } else {
            val startIndex = originName.lastIndexOf('(')
            val endIndex = originName.lastIndexOf(')')
            if (startIndex != -1 && endIndex != -1 && startIndex < endIndex) {
                dimensionText = originName.substring(startIndex + 1, endIndex)
            } else if (originName.length > 7) { // Heuristic for very long names without parentheses
                dimensionText = originName.substring(0, 5) + "..."
            }
            // If it's something like "Post-Apocalyptic Earth", and no parentheses,
            // it will still show that. You can add more sophisticated parsing if needed.
        }

        holder.binding.dimensionBadge.text = dimensionText
    }
}