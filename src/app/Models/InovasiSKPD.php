<?php

namespace App\Models;

use CodeIgniter\Model;

class InovasiSKPD extends Model
{
    protected $table            = 'tb_inovasi_SKPD';
    protected $primaryKey       = 'id_inovasi_SKPD';
    protected $allowedFields    = ['id_inovasi_SKPD', 'judul_inovasi', 'jenis_inovasi', 'tahun_inovasi', 'latar_belakang', 'tujuan', 'manfaat', 'status', 'progress', 'id_skpd'];
}
