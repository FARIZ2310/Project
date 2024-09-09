<?php

namespace App\Models;

use CodeIgniter\Model;

class BidangPeneliti extends Model
{
    protected $table            = 'tb_bidang_peneliti';
    protected $primaryKey       = 'id_bidang_peneliti';
    protected $allowedFields    = ['id_bidang_peneliti', 'id_peneliti', 'id_bidang_penelitian'];
}
