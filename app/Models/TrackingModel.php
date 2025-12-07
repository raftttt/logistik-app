<?php

namespace App\Models;
use CodeIgniter\Model;

class TrackingModel extends Model
{
    protected $table = 'tracking_pengiriman';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_keluar', 'status', 'keterangan'];
}
