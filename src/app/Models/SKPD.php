<?php

namespace App\Models;

use CodeIgniter\Model;

class SKPD extends Model
{
    protected $table            = 'tb_skpd';
    protected $primaryKey       = 'id_skpd';
    protected $allowedFields    = ['id_skpd', 'nama_skpd', 'alamat', 'email', 'kontak', 'website'];
}
