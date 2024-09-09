<?php

namespace App\Models;

use CodeIgniter\Model;

class InovasiOPD extends Model
{
    protected $table            = 'tb_inovasi_opd';
    protected $primaryKey       = 'id_inovasi_opd';
    protected $allowedFields    = ['id_inovasi_opd', 'judul_inovasi', 'tahun_inovasi', 'latar_belakang', 'tujuan', 'manfaat', 'status', 'progress'];

}
