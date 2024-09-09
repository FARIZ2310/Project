<?php

namespace App\Models;

use CodeIgniter\Model;

class KebutuhanRiset extends Model
{
    // TODO: add attribute 'deskripsi'
    // TODO: change attribute 'info' to 'kontak'
    // TODO: change attribute 'manfaat' to 'sasaran'
    protected $table            = 'tb_kebutuhan_riset';
    protected $primaryKey       = 'id_kebutuhan';
    protected $allowedFields    = ['id_kebutuhan', 'judul', 'tujuan', 'sasaran', 'kontak', 'deskripsi'];
}
