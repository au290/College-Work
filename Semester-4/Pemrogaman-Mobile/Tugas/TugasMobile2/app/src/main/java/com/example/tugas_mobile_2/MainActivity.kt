package com.example.tugas_mobile_2

import android.os.Bundle
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.app.AppCompatDelegate
import androidx.lifecycle.lifecycleScope
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.tugas_mobile_2.databinding.ActivityMainBinding
import kotlinx.coroutines.*

class MainActivity : AppCompatActivity() {
    private lateinit var binding: ActivityMainBinding

        override fun onCreate(savedInstanceState: Bundle?) {
            AppCompatDelegate.setDefaultNightMode(AppCompatDelegate.MODE_NIGHT_NO)
            super.onCreate(savedInstanceState)
            binding = ActivityMainBinding.inflate(layoutInflater)
            setContentView(binding.root)
            binding.btnMenu.setOnClickListener {
                Toast.makeText(this, "This Button is used for Decoration", Toast.LENGTH_SHORT).show()
            }
            binding.recyclerView.layoutManager = LinearLayoutManager(this)

            lifecycleScope.launch {
                try {
                    val posts = RetrofitInstance.api.getMessage()
                    binding.recyclerView.adapter = MyAdapter(posts)
                } catch (e: Exception) {
                    e.printStackTrace()
                }
            }
        }
    }