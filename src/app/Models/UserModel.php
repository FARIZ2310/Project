<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tb_akun';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'username', 'password', 'nama', 'role'];
    protected $returnType       = 'object';
}
