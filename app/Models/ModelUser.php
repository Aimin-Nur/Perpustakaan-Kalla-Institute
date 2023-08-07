<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_user')->orderBy('id_user', 'DESC')->get()->getResultArray();
    }

    public function AmbilDetail($id_user)
    {
        return $this->db->table('tbl_user')->where('id_user', $id_user)->get()->getRowArray();
    }

    public function Tambah($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }

    public function Hapususer($data)
    {
        $this->db->table('tbl_user')->where('id_user', $data['id_user'])->delete($data);
    } 

    public function Edituser($data)
    {
        $this->db->table('tbl_user')->where('id_user', $data['id_user'])->update($data);
    } 
}
