<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenulis extends Model
{
    public function AllData()
    {
        return $this->db->table('penulis')->orderBy('id_penulis', 'DESC')->get()->getResultArray();
    }

    public function Tambah($data)
    {
        $this->db->table('penulis')->insert($data);
    }

    public function Hapuspenulis($data)
    {
        $this->db->table('penulis')->where('id_penulis', $data['id_penulis'])->delete($data);
    } 

    public function Editpenulis($data)
    {
        $this->db->table('penulis')->where('id_penulis', $data['id_penulis'])->update($data);
    } 
}
