<?php

namespace App\Models;

use CodeIgniter\Model;

class KurirModel extends Model
{
    protected $table = 'kurir';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'kontak', 'status'];
}
