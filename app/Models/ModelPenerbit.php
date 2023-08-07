<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenerbit extends Model
{
    public function AllData()
    {
        return $this->db->table('penerbit')->orderBy('id_penerbit', 'DESC')->get()->getResultArray();
    }

    public function Tambah($data)
    {
        $this->db->table('penerbit')->insert($data);
    }

    public function HapusPenerbit($data)
    {
        $this->db->table('penerbit')->where('id_penerbit', $data['id_penerbit'])->delete($data);
    } 

    public function EditPenerbit($data)
    {
        $this->db->table('penerbit')->where('id_penerbit', $data['id_penerbit'])->update($data);
    } 
}
