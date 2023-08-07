<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_user'; 
    protected $primaryKey = 'id_user'; // Kolom primary key pada tabel
    protected $allowedFields = ['nama_user', 'email_user', 'no_hp', 'password', 'foto', 'level']; // Kolom yang diizinkan untuk diisi

    public function getAllUsers($id_admin)
    {
        return $this->findAll();
    }
}
