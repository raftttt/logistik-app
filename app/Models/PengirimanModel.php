<?php

namespace App\Models;
use CodeIgniter\Model;

class PengirimanModel extends Model
{
    protected $table = 'pengiriman';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_barang', 'id_kurir', 'resi', 'qr', 'status'
    ];

    public function getPengirimanFull()
    {
        return $this->db->table('pengiriman')
        ->select('
            pengiriman.*,
            barang.nama_barang,
            kurir.nama AS nama_kurir
        ')
        ->join('barang', 'barang.id = pengiriman.id_barang', 'left')
        ->join('kurir', 'kurir.id = pengiriman.id_kurir', 'left')
        ->get()
        ->getResultArray();
    }
}
