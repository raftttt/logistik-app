<?php

namespace App\Models;
use CodeIgniter\Model;

class KurirModel extends Model
{
    protected $table = 'kurir';
    protected $allowedFields = ['nama', 'no_hp', 'kendaraan'];
}
