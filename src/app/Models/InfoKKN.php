<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoKKN extends Model
{
    protected $table            = 'tb_info_kkn';
    protected $primaryKey       = 'id_info_kkn';
    protected $allowedFields    = ['id_info_kkn', 'perguruan_tinggi', 'lokasi', 'link_gmap', 'pelaksanaan'];
}
