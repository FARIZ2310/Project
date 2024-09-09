<?php

namespace App\Models;

use CodeIgniter\Model;

class PenelitiPenelitian extends Model
{
    protected $table            = 'tb_peneliti_penelitian';
    protected $primaryKey       = 'id_peneliti_penelitian';
    protected $allowedFields    = ['id_peneliti_penelitian', 'id_penelitian', 'id_peneliti'];
}
