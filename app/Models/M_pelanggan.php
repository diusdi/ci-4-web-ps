<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $allowedFields = ['nama', 'alamat', 'tgl'];
    // protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
}
