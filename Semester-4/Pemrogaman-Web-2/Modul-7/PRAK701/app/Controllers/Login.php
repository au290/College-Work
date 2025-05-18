<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validation: check empty fields
        if (empty($username) || empty($password)) {
            session()->setFlashdata('error', 'Username dan Password tidak boleh kosong.');
            return redirect()->to('/login');
        }

        // Load user model
        $model = new \App\Models\ModelUser();

        // Hash password using md5 (matching your DB format)
        $hashedPassword = md5($password);

        // Search for user
        $user = $model->where('username', $username)
            ->where('password', $hashedPassword)
            ->first();

        // Check if user found
        if ($user) {
            // Set session
            session()->set([
                'user_id'   => $user['id'],
                'username'  => $user['username'],
                'email'     => $user['email'],
                'isLogged' => true,
            ]);

            return redirect()->to('/dashboard'); // or wherever your main page is
        } else {
            session()->setFlashdata('error', 'Username atau Password salah.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Berhasil logout.');
    }
}
