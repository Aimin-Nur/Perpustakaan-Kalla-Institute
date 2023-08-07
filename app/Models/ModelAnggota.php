<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAnggota extends Model
{

    public function ProfilAnggota($id_anggota)
    {
        return $this->db->table('anggota_mahasiswa')
        ->join('prodi', 'prodi.id_prodi = anggota_mahasiswa.id_prodi', 'left')
        ->where('id_anggota', $id_anggota)->get()->getRowArray();
    }

    public function Edit($data)
    {
        $this->db->table('anggota_mahasiswa')->where('id_anggota' , $data['id_anggota'])->update($data);
    }

    public function findById($id_anggota)
    {
        return $this->db->table('anggota_mahasiswa')->where('id_anggota', $id_anggota)->get()->getRowArray();
    }

    public function AllData()
    {
        return $this->db->table('anggota_mahasiswa')
        ->join('prodi', 'prodi.id_prodi = anggota_mahasiswa.id_prodi', 'left')
        ->get()->getResultArray();
    }

    public function getEmailPeminjam($id_pinjam)
    {
        // Ambil id_anggota dari tabel peminjaman
        $peminjaman = $this->db->table('tbl_peminjaman')
                            ->select('id_anggota')
                            ->where('id_pinjam', $id_pinjam)
                            ->get()
                            ->getRowArray();

        if ($peminjaman) {
            $id_anggota = $peminjaman['id_anggota'];
            // Ambil data email dari tabel anggota_mahasiswa berdasarkan id_anggota
            $anggota = $this->db->table('anggota_mahasiswa')
                            ->select('email')
                            ->where('id_anggota', $id_anggota)
                            ->get()
                            ->getRowArray();

            if ($anggota) {
                return $anggota['email'];
            }
        }

        return null;
    }


    
    public function JumlahAnggota()
    {
        return $this->db->table('tbl_buku')->countAll();
    }



    

}
