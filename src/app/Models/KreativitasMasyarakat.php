<?php

namespace App\Models;

use CodeIgniter\Model;

class KreativitasMasyarakat extends Model
{
    protected $table            = 'tb_kreativitas';
    protected $primaryKey       = 'id_kreativitas';
    protected $allowedFields    = ['id_kreativitas', 'nama_kreativitas', 'kreator', 'deskripsi', 'status'];
}
