<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    public function AllData()
    {
        return $this->db->table('kategori')->orderBy('id_kategori', 'DESC')->get()->getResultArray();
    }

    public function Tambah($data)
    {
        $this->db->table('kategori')->insert($data);
    }

    public function HapusKategori($data)
    {
        $this->db->table('kategori')->where('id_kategori', $data['id_kategori'])->delete($data);
    } 

    public function EditKategori($data)
    {
        $this->db->table('kategori')->where('id_kategori', $data['id_kategori'])->update($data);
    } 
}
