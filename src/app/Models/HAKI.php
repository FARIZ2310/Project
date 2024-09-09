<?php

namespace App\Models;

use CodeIgniter\Model;

class HAKI extends Model
{
    protected $table            = 'tb_haki';
    protected $primaryKey       = 'id_haki';
    protected $allowedFields    = ['id_haki', 'jenis', 'nama_haki', 'pemilik_haki', 'registrasi'];

}
