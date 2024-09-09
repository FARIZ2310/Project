<?php

namespace App\Models;

use CodeIgniter\Model;

class BidangPenelitian extends Model
{
    protected $table            = 'tb_bidang_penelitian';
    protected $primaryKey       = 'id_bidang_penelitian';
    protected $allowedFields    = ['id_bidang_penelitian', 'nama_bidang_penelitian'];
}
