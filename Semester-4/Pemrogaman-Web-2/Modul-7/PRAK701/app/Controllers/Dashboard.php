<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ModelBuku; 
use App\Models\ModelUser;

class Dashboard extends BaseController
{   
    protected $modelBuku;
    protected $modelUser;
    
    public function __construct()
    {
        $this->modelUser = new ModelUser();
        $this->modelBuku = new ModelBuku();
    }
    
    public function index()
    {   
        $data = [
            'user' => $this->modelUser->findAll(),
            'buku' => $this->modelBuku->findAll(),
        ];
        return view('dashboard', $data);
    }
    
    // User CRUD
    public function create_user()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email')
        ];
        $this->modelUser->insert($data);
        return redirect()->to('/dashboard')->with('success', 'User added successfully');
    }
    
    public function update_user()
    {
        $id = $this->request->getPost('id');
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email')
        ];
        $this->modelUser->update($id, $data);
        return redirect()->to('/dashboard')->with('success', 'User updated successfully');
    }
    
    public function delete_user($id)
    {
        $this->modelUser->delete($id);
        return redirect()->to('/dashboard')->with('success', 'User deleted successfully');
    }
    
    // Book CRUD
    public function create_book()
    {
        $data = [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ];
        $this->modelBuku->insert($data);
        return redirect()->to('/dashboard')->with('success', 'Book added successfully');
    }
    
    public function update_book()
    {
        $id = $this->request->getPost('id');
        $data = [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ];
        $this->modelBuku->update($id, $data);
        return redirect()->to('/dashboard')->with('success', 'Book updated successfully');
    }
    
    public function delete_book($id)
    {
        $this->modelBuku->delete($id);
        return redirect()->to('/dashboard')->with('success', 'Book deleted successfully');
    }
}