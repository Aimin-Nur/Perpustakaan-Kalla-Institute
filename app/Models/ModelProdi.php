<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProdi extends Model
{
    public function AllData()
    {
        return $this->db->table('prodi')->orderBy('id_prodi', 'DESC')->get()->getResultArray();
    }

    public function Tambah($data)
    {
        $this->db->table('prodi')->insert($data);
    }

    public function HapusProdi($data)
    {
        $this->db->table('prodi')->where('id_Prodi', $data['id_prodi'])->delete($data);
    } 

    public function EditProdi($data)
    {
        $this->db->table('prodi')->where('id_prodi', $data['id_prodi'])->update($data);
    } 
}
