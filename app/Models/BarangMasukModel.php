<?php

namespace App\Models;
use CodeIgniter\Model;

class BarangMasukModel extends Model
{
    protected $table      = 'barang_masuk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_barang', 'jumlah_masuk', 'tanggal', 'supplier', 'keterangan'];
}
