<?php

namespace App\Models;

use CodeIgniter\Model;

class LembagaPenelitian extends Model
{
    protected $table            = 'tb_lembaga_penelitian';
    protected $primaryKey       = 'id_lembaga_penelitian';
    protected $allowedFields    = ['id_lembaga_penelitian', 'nama_lembaga', 'email_lembaga', 'website_lembaga', 'alamat_lembaga'];
}
