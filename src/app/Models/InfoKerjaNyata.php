<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoKerjaNyata extends Model
{
    // TODO: Renaming attribute 'perguruan_tinggi' to 'intansi'
    // TODO: add attribute 'hasil', 'peserta', 'masa_magang'
    protected $table            = 'tb_info_kerja_nyata';
    protected $primaryKey       = 'id_info_kerja_nyata';
    protected $allowedFields    = ['id_info_kerja_nyata', 'intansi', 'lokasi', 'link_gmap', 'pelaksanaan', 'hasil', 'peserta', 'masa_magang'];
}
