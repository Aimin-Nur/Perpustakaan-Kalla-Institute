<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_buku')
        ->join('penulis', 'penulis.id_penulis = tbl_buku.id_penulis', 'left')
        ->join('penerbit', 'penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
        ->join('kategori', 'kategori.id_kategori = tbl_buku.id_kategori', 'left')
        ->get()->getResultArray();
    }

    public function AmbilDetail($id_buku)
    {
        return $this->db->table('tbl_buku')
        ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
        ->join('penulis', 'penulis.id_penulis = tbl_buku.id_penulis', 'left')
        ->join('penerbit', 'penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
        ->join('kategori', 'kategori.id_kategori = tbl_buku.id_kategori', 'left')
        ->where('id_buku', $id_buku)->get()->getRowArray();
    }

    public function TambahBuku($data)
    {
        $this->db->table('tbl_buku')->insert($data);
    }

    public function HapusBuku($data)
    {
        $this->db->table('tbl_buku')->where('id_buku', $data['id_buku'])->delete($data);
    } 

    public function EditBuku($data)
    {
        $this->db->table('tbl_buku')->where('id_buku', $data['id_buku'])->update($data);
        
    } 

    // Model Buku Donut Chart
    public function GetBookCountPerCategory()
    {
        return $this->db->table('tbl_buku')
            ->select('kategori.kategori_buku, COUNT(tbl_buku.id_buku) as jumlah_buku')
            ->join('kategori', 'kategori.id_kategori = tbl_buku.id_kategori')
            ->groupBy('tbl_buku.id_kategori')
            ->get()
            ->getResultArray();
    }


    public function JumlahBuku()
    {
        return $this->db->table('tbl_buku')->countAll();
    }



}
