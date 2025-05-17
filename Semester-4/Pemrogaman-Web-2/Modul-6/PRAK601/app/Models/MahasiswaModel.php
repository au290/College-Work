<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    public function getData()
    {
        return [
            'title'        => 'My Portofolio',
            'subtitle'     => 'Orang Gabut Yang Keterima Jurusan TI',
            'nama' => 'Damarjati Suryo Laksono',
            'nim' => '2310817210014',
            'deskripsi' => 'Web Dev Enthusiast & Machine Learning Enthusiast',
            'jurusan' => 'Information Technology',
            'jurusan_deskripsi' => 'Specializing in interactive media and creative technology, I focus on building immersive digital experiences that blend art and technology.',
            'hobi' => [
                [
                    'nama' => 'Turu',
                    'deskripsi' => 'Restore my energy and semangat at my free time.',
                ],
                [
                    'nama' => 'Gaming',
                    'deskripsi' => 'Enjoys economic simulation and third-person shooter (TPS) games, with a strong focus on tactical decision-making and competitive play.',
                ],
                [
                    'nama' => 'Reading',
                    'deskripsi' => 'Exploring science fiction and technical books about emerging technologies.',

                ],
                [
                    'nama' => 'Satire',
                    'deskripsi' => 'Is my form of creative expression that uses humor, irony, and exaggeration to critique social, cultural, or political issues.',

                ]
            ],
            'skills' => [
                [
                    'nama' => 'Web Development',
                    'deskripsi' => 'HTML, CSS, Native JavaScript',

                ],
                [
                    'nama' => 'Machine Learning',
                    'deskripsi' => 'Pytorch, Scikit Learn',

                ],
                [
                    'nama' => 'Mobile Development',
                    'deskripsi' => 'Kotlin',

                ]
            ]
        ];
    }
}
