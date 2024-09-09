<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogSaran extends Model
{
    protected $table            = 'tb_blog_saran';
    protected $primaryKey       = 'id_saran';
    protected $allowedFields    = ['id_saran', 'saran', 'tanggapan'];
}
