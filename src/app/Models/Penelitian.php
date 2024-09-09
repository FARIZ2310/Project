<?php

namespace App\Models;

use CodeIgniter\Model;

class Penelitian extends Model
{
    protected $table            = 'tb_penelitian';
    protected $primaryKey       = 'id_penelitian';
    protected $allowedFields    = ['id_penelitian', 'jenis_penelitian', 'judul_penelitian', 'tahun_penelitian', 'abstrak_penelitian', 'peneliti', 'id_lembaga_penelitian', 'waktu_pelaksanaan', 'status', 'progress'];
}
