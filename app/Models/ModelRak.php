<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRak extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_rak')->orderBy('id_rak', 'DESC')->get()->getResultArray();
    }

    public function Tambah($data)
    {
        $this->db->table('tbl_rak')->insert($data);
    }

    public function HapusRak($data)
    {
        $this->db->table('tbl_rak')->where('id_rak', $data['id_rak'])->delete($data);
    } 

    public function EditRak($data)
    {
        $this->db->table('tbl_rak')->where('id_rak', $data['id_rak'])->update($data);
    } 
}
