<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'etmin',
            'email' => '',
            'password' => password_hash('etmin123', PASSWORD_BCRYPT)
        ];

        $this->db->table('user')->insertBatch($data);
    }
}
