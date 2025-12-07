<?php

namespace App\Models;
use CodeIgniter\Model;

class BarangKeluarModel extends Model
{
    protected $table      = 'barang_keluar';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_barang', 
        'jumlah_keluar', 
        'tanggal', 
        'penerima', 
        'kurir', 
        'status'
    ];
}
