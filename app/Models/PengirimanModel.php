<?php

namespace App\Models;
use CodeIgniter\Model;

class PengirimanModel extends Model
{
    protected $table = 'pengiriman';
    protected $allowedFields = ['id_barang', 'id_kurir', 'tanggal', 'status', 'catatan'];
}
