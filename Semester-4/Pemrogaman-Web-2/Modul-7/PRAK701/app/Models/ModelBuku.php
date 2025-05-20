<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelBuku extends Model
{
    protected $table = 'buku';
    protected $allowedFields = ['judul', 'penulis', 'penerbit', 'tahun_terbit'];

    protected $validationRules = [
        'judul'        => 'required|string',
        'penulis'      => 'required|string',
        'penerbit'     => 'required|string',
        'tahun_terbit' => 'required|integer|greater_than[1800]|less_than[2025]',
    ];
}