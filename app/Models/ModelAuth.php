<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{

    public function loginAdmin($email, $password)
    {
        return $this->db->table('tbl_user')
        ->where([
            'email_user' => $email,
            'password' => $password,
        ])->get()->getRowArray();
    }


    public function Register($data)
    {
        $this->db->table('anggota_mahasiswa')->insert($data);
    } 

    public function LoginAnggota($nim, $password)
    {
        return $this->db->table('anggota_mahasiswa')
        ->where([
            'nim' => $nim,
            'password' => $password,
        ])->get()->getRowArray();

    }


}
