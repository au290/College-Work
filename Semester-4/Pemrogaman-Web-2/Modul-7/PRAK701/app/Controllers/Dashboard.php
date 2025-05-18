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
        return view('dashboard',$data);
    }
}
