<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_barang', 'id_kategori', 'harga', 'stok', 'foto'];

    public function getBarangWithKategori()
    {
    return $this->select('barang.*, kategori.nama_kategori')
        ->join('kategori', 'kategori.id = barang.id_kategori')
        ->findAll();
    }

}

