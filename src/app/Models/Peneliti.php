<?php

namespace App\Models;

use CodeIgniter\Model;

class Peneliti extends Model
{
    protected $table            = 'tb_peneliti';
    protected $primaryKey       = 'id_peneliti';
    protected $allowedFields    = ['id_peneliti', 'nama_peneliti', 'gelar_peneliti', 'pendidikan_peneliti', 'alamat_peneliti', 'email_peneliti', 'id_lembaga_penelitian'];
}
