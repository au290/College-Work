<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul' => 'The Great Gatsby',
                'penulis' => 'F. Scott Fitzgerald',
                'penerbit' => 'Scribner',
                'tahun_terbit' => 1925,
            ],
            [
                'judul' => 'To Kill a Mockingbird', 
                'penulis' => 'Harper Lee',
                'penerbit' => 'J.B. Lippincott & Co.',
                'tahun_terbit' => 1960,
       
            ],
            [
                'judul' => '1984',
                'penulis' => 'George Orwell',
                'penerbit' => 'Secker & Warburg',
                'tahun_terbit' => 1949,

            ],
        ];

        // Using Query Builder
        $this->db->table('buku')->insertBatch($data);
    }
}
