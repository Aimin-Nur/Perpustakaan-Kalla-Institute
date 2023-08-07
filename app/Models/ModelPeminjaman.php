<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjaman extends Model
{
    protected $table = 'tbl_peminjaman'; 
    protected $primaryKey = 'id_pinjam'; 
    protected $allowedFields = ['no_pinjam', 'tgl_pengajuan', 'id_anggota', 'id_prodi', 'tgl_pinjam', 'id_buku', 'qty', 'lama_pinjam', 'denda', 'keterlambatan','tgl_kembali', 'status_pinjam'];

    public function AddPengajuan($data)
    {
        $this->insert($data);
    }

    public function PengajuanBuku($id_anggota)
    {
        return $this->db->table('tbl_peminjaman')
        ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
        ->join('penulis', 'penulis.id_penulis = tbl_buku.id_penulis', 'left')
        ->join('penerbit', 'penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
        ->join('kategori', 'kategori.id_kategori = tbl_buku.id_kategori', 'left')
        ->where('id_anggota', $id_anggota)
        ->where('status_pinjam', 'Diajukan')
        ->get()->getResultArray();
    }


    public function PengajuanMasuk()
    {
        return $this->db->table('tbl_peminjaman')
        ->join('anggota_mahasiswa', 'anggota_mahasiswa.id_anggota = tbl_peminjaman.id_anggota', 'left')
        ->join('tbl_buku', 'tbl_buku.id_buku = tbl_buku.id_buku', 'left')
        ->join('prodi', 'prodi.id_prodi = anggota_mahasiswa.id_prodi', 'left')
        ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
        ->join('penulis', 'penulis.id_penulis = tbl_buku.id_penulis', 'left')
        ->join('penerbit', 'penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
        ->join('kategori', 'kategori.id_kategori = tbl_buku.id_kategori', 'left')
        ->where('status_pinjam', 'Diajukan')
        ->selectCount('tbl_peminjaman.id_anggota', 'qty')
        ->select('tbl_buku.id_buku,tbl_buku.kode_buku,tbl_buku.isbn,tbl_buku.foto_buku,tbl_buku.sinopsis,tbl_buku.judul_buku,anggota_mahasiswa.id_anggota,anggota_mahasiswa.nim,anggota_mahasiswa.nama_mhs,prodi.nama_prodi,anggota_mahasiswa.foto_mhs,tbl_peminjaman.tgl_pengajuan,tbl_peminjaman.tgl_pinjam,tbl_peminjaman.tgl_kembali,tbl_peminjaman.lama_pinjam,tbl_peminjaman.id_pinjam,kategori.kategori_buku,penulis.nama_penulis,penerbit.nama_penerbit,tbl_buku.jumlah_hlm,tbl_buku.dipinjam,tbl_buku.tersedia,tbl_rak.posisi_lantai')
        ->groupBy('tbl_peminjaman.id_anggota')
        ->get()->getResultArray();
    }

    public function Detail($id_pinjam)
    {
        
    }


    public function getDetailData($id_pinjam)
    {
        
        $buku = $this->db->table('tbl_peminjaman')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
            ->join('anggota_mahasiswa', 'anggota_mahasiswa.id_anggota = tbl_peminjaman.id_anggota', 'left')
            ->join('prodi', 'prodi.id_prodi = tbl_peminjaman.id_prodi', 'left')
            ->where('id_pinjam', $id_pinjam)
            ->get()
            ->getResultArray();

      
        $kategori = $this->db->table('tbl_buku')
            ->join('kategori', 'kategori.id_kategori = tbl_buku.id_kategori', 'left')
            ->join('penulis', 'penulis.id_penulis = tbl_buku.id_penulis', 'left')
            ->join('penerbit', 'penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
            ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
            ->where('id_buku', $buku[0]['id_buku']) 
            ->get()
            ->getRowArray();

        $result = [
            'buku' => $buku,
            'kategori' => $kategori,
        ];

        return $result;
    }

    public function EditData($data)
    {
        $this->db->table('tbl_peminjaman')->where('id_pinjam', $data['id_pinjam'])->update($data);
    } 


    public function SetNullDenda($id_pinjam)
    {
        $this->db->table('tbl_peminjaman')->where('id_pinjam', $id_pinjam)->set('keterlambatan', NULL)->update();
    }


    public function Denda()
    {
        return $this->db->table('tbl_peminjaman')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
            ->join('anggota_mahasiswa', 'anggota_mahasiswa.id_anggota = tbl_peminjaman.id_anggota', 'left')
            ->join('prodi', 'prodi.id_prodi = tbl_peminjaman.id_prodi', 'left')
            ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
            ->join('penulis', 'penulis.id_penulis = tbl_buku.id_penulis', 'left')
            ->join('penerbit', 'penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
            ->join('kategori', 'kategori.id_kategori = tbl_buku.id_kategori', 'left')
            ->where('keterlambatan IS NOT NULL ')
            ->select('tbl_buku.id_buku,tbl_buku.kode_buku,tbl_buku.isbn,tbl_buku.foto_buku,tbl_buku.sinopsis,tbl_buku.judul_buku,anggota_mahasiswa.id_anggota,anggota_mahasiswa.nim,anggota_mahasiswa.nama_mhs,prodi.nama_prodi,anggota_mahasiswa.foto_mhs,tbl_peminjaman.tgl_pengajuan,tbl_peminjaman.tgl_pinjam,tbl_peminjaman.ket,tbl_peminjaman.lama_pinjam,tbl_peminjaman.id_pinjam,tbl_peminjaman.status_pinjam,tbl_peminjaman.keterlambatan,kategori.kategori_buku,penulis.nama_penulis,penerbit.nama_penerbit,tbl_buku.jumlah_hlm,tbl_buku.dipinjam,tbl_buku.tersedia,tbl_rak.posisi_lantai')
            ->get()
            ->getResultArray();
    }

    public function Terima()
    {
        return $this->db->table('tbl_peminjaman')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
            ->join('anggota_mahasiswa', 'anggota_mahasiswa.id_anggota = tbl_peminjaman.id_anggota', 'left')
            ->join('prodi', 'prodi.id_prodi = tbl_peminjaman.id_prodi', 'left')
            ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
            ->join('penulis', 'penulis.id_penulis = tbl_buku.id_penulis', 'left')
            ->join('penerbit', 'penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
            ->join('kategori', 'kategori.id_kategori = tbl_buku.id_kategori', 'left')
            ->where('status_pinjam', 'Diterima')
            ->orWhere('status_pinjam', 'Ditolak')
            ->select('tbl_buku.id_buku,tbl_buku.kode_buku,tbl_buku.isbn,tbl_buku.foto_buku,tbl_buku.sinopsis,tbl_buku.judul_buku,anggota_mahasiswa.id_anggota,anggota_mahasiswa.nim,anggota_mahasiswa.nama_mhs,prodi.nama_prodi,anggota_mahasiswa.foto_mhs,tbl_peminjaman.tgl_pengajuan,tbl_peminjaman.tgl_pinjam,tbl_peminjaman.ket,tbl_peminjaman.lama_pinjam,tbl_peminjaman.tgl_kembali,tbl_peminjaman.id_pinjam,tbl_peminjaman.status_pinjam,kategori.kategori_buku,penulis.nama_penulis,penerbit.nama_penerbit,tbl_buku.jumlah_hlm,tbl_buku.dipinjam,tbl_buku.tersedia,tbl_rak.posisi_lantai')
            ->get()
            ->getResultArray();
    }

    public function BukuDiterima($id_anggota)
    {
        return $this->db->table('tbl_peminjaman')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
            ->join('anggota_mahasiswa', 'anggota_mahasiswa.id_anggota = tbl_peminjaman.id_anggota', 'left')
            ->join('prodi', 'prodi.id_prodi = tbl_peminjaman.id_prodi', 'left')
            ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
            ->join('penulis', 'penulis.id_penulis = tbl_buku.id_penulis', 'left')
            ->join('penerbit', 'penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
            ->join('kategori', 'kategori.id_kategori = tbl_buku.id_kategori', 'left')
            ->where('status_pinjam', 'Diterima')
            ->where('anggota_mahasiswa.id_anggota', $id_anggota)
            ->select('tbl_buku.id_buku,tbl_buku.kode_buku,tbl_buku.isbn,tbl_buku.foto_buku,tbl_buku.sinopsis,tbl_buku.judul_buku,anggota_mahasiswa.id_anggota,anggota_mahasiswa.nim,anggota_mahasiswa.nama_mhs,prodi.nama_prodi,anggota_mahasiswa.foto_mhs,tbl_peminjaman.tgl_pengajuan,tbl_peminjaman.tgl_pinjam,tbl_peminjaman.ket,tbl_peminjaman.lama_pinjam,tbl_peminjaman.tgl_kembali,tbl_peminjaman.id_pinjam,tbl_peminjaman.status_pinjam,tbl_peminjaman.no_pinjam,kategori.kategori_buku,penulis.nama_penulis,penerbit.nama_penerbit,tbl_buku.jumlah_hlm,tbl_buku.dipinjam,tbl_buku.tersedia,tbl_rak.posisi_lantai')
            ->get()
            ->getResultArray();
    }






    public function InfoPinjam()
    {
        return $this->db->table('tbl_peminjaman')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
            ->join('anggota_mahasiswa', 'anggota_mahasiswa.id_anggota = tbl_peminjaman.id_anggota', 'left')
            ->join('prodi', 'prodi.id_prodi = tbl_peminjaman.id_prodi', 'left')
            ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
            ->join('penulis', 'penulis.id_penulis = tbl_buku.id_penulis', 'left')
            ->join('penerbit', 'penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
            ->join('kategori', 'kategori.id_kategori = tbl_buku.id_kategori', 'left')
            ->where('status_pinjam', 'Dipinjam' )
            ->orWhere('status_pinjam', 'Waiting' )
            ->select('tbl_buku.id_buku,tbl_buku.kode_buku,tbl_buku.isbn,tbl_buku.foto_buku,tbl_buku.sinopsis,tbl_buku.judul_buku,anggota_mahasiswa.id_anggota,anggota_mahasiswa.nim,anggota_mahasiswa.nama_mhs,prodi.nama_prodi,anggota_mahasiswa.foto_mhs,tbl_peminjaman.tgl_pengajuan,tbl_peminjaman.tgl_pinjam,tbl_peminjaman.ket,tbl_peminjaman.lama_pinjam,tbl_peminjaman.tgl_kembali,tbl_peminjaman.id_pinjam,tbl_peminjaman.status_pinjam,kategori.kategori_buku,penulis.nama_penulis,penerbit.nama_penerbit,tbl_buku.jumlah_hlm,tbl_buku.dipinjam,tbl_buku.tersedia,tbl_rak.posisi_lantai')
            ->get()
            ->getResultArray();
    }

    public function HistoryBukuAgtPinjaman($id_anggota)
    {
        return $this->db->table('tbl_peminjaman')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
            ->join('anggota_mahasiswa', 'anggota_mahasiswa.id_anggota = tbl_peminjaman.id_anggota', 'left')
            ->join('prodi', 'prodi.id_prodi = tbl_peminjaman.id_prodi', 'left')
            ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
            ->join('penulis', 'penulis.id_penulis = tbl_buku.id_penulis', 'left')
            ->join('penerbit', 'penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
            ->join('kategori', 'kategori.id_kategori = tbl_buku.id_kategori', 'left')
            ->where('tbl_peminjaman.id_anggota', $id_anggota)
            ->where('status_pinjam', 'Dipinjam' )
            ->select('tbl_buku.id_buku,tbl_buku.kode_buku,tbl_buku.isbn,tbl_buku.foto_buku,tbl_buku.sinopsis,tbl_buku.judul_buku,anggota_mahasiswa.id_anggota,anggota_mahasiswa.nim,anggota_mahasiswa.nama_mhs,prodi.nama_prodi,anggota_mahasiswa.foto_mhs,tbl_peminjaman.tgl_pengajuan,tbl_peminjaman.tgl_pinjam,tbl_peminjaman.ket,tbl_peminjaman.lama_pinjam,tbl_peminjaman.tgl_kembali,tbl_peminjaman.id_pinjam,tbl_peminjaman.status_pinjam,kategori.kategori_buku,penulis.nama_penulis,penerbit.nama_penerbit,tbl_buku.jumlah_hlm,tbl_buku.dipinjam,tbl_buku.tersedia,tbl_rak.posisi_lantai')
            ->get()
            ->getResultArray();
    }


    public function HistoryBuku()
    {
        return $this->db->table('tbl_peminjaman')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
            ->join('anggota_mahasiswa', 'anggota_mahasiswa.id_anggota = tbl_peminjaman.id_anggota', 'left')
            ->join('prodi', 'prodi.id_prodi = tbl_peminjaman.id_prodi', 'left')
            ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
            ->join('penulis', 'penulis.id_penulis = tbl_buku.id_penulis', 'left')
            ->join('penerbit', 'penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
            ->join('kategori', 'kategori.id_kategori = tbl_buku.id_kategori', 'left')
            ->where('status_pinjam', 'Dikembalikan' )
            ->orWhere('status_pinjam', 'Belum Kembali' )
            ->select('tbl_buku.id_buku,tbl_buku.kode_buku,tbl_buku.isbn,tbl_buku.foto_buku,tbl_buku.sinopsis,tbl_buku.judul_buku,anggota_mahasiswa.id_anggota,anggota_mahasiswa.nim,anggota_mahasiswa.nama_mhs,prodi.nama_prodi,anggota_mahasiswa.foto_mhs,tbl_peminjaman.tgl_pengajuan,tbl_peminjaman.tgl_pinjam,tbl_peminjaman.ket,tbl_peminjaman.lama_pinjam,tbl_peminjaman.tgl_kembali,tbl_peminjaman.keterlambatan,tbl_peminjaman.denda,tbl_peminjaman.id_pinjam,tbl_peminjaman.status_pinjam,kategori.kategori_buku,penulis.nama_penulis,penerbit.nama_penerbit,tbl_buku.jumlah_hlm,tbl_buku.dipinjam,tbl_buku.tersedia,tbl_rak.posisi_lantai')
            ->get()
            ->getResultArray();
    }

    
    public function kembaliTerlambat($id_pinjam, $data)
    {
        $this->db->table('tbl_peminjaman')->where('id_pinjam', $id_pinjam)->update($data);
    }

    public function EditTerlambat($id_pinjam, $data)
    {
        $this->db->table('tbl_peminjaman')->where('id_pinjam', $id_pinjam)->update($data);
    }




    public function TolakAgt($id_anggota)
    {
        return $this->db->table('tbl_peminjaman')
        ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
        ->join('penulis', 'penulis.id_penulis = tbl_buku.id_penulis', 'left')
        ->join('penerbit', 'penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
        ->join('kategori', 'kategori.id_kategori = tbl_buku.id_kategori', 'left')
        ->where('id_anggota', $id_anggota)
        ->where('status_pinjam', 'Ditolak')
        ->get()->getResultArray();
    }


    public function HistoryBukuAgt($id_anggota)
    {
        return $this->db->table('tbl_peminjaman')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
            ->join('penulis', 'penulis.id_penulis = tbl_buku.id_penulis', 'left')
            ->join('penerbit', 'penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
            ->join('kategori', 'kategori.id_kategori = tbl_buku.id_kategori', 'left')
            ->where('tbl_peminjaman.id_anggota', $id_anggota)
            ->groupStart()
                ->where('status_pinjam', 'Dikembalikan')
                ->orWhere('status_pinjam', 'Belum Kembali')
            ->groupEnd()
            ->get()
            ->getResultArray();
    }




    public function getBookCountPerProdi()
    {
        $builder = $this->db->table('tbl_peminjaman');
        $builder->select('prodi.nama_prodi, COUNT(*) as jumlah_buku');
        $builder->join('anggota_mahasiswa', 'tbl_peminjaman.id_anggota = anggota_mahasiswa.id_anggota');
        $builder->join('prodi', 'anggota_mahasiswa.id_prodi = prodi.id_prodi');
        $builder->where('tbl_peminjaman.status_pinjam', 'Dipinjam');
        $builder->orWhere('tbl_peminjaman.status_pinjam', 'Belum Kembali');
        $builder->groupBy('prodi.nama_prodi');

        $query = $builder->get();
        return $query->getResultArray();

        var_dump($bookCounts);
    }

    
    public function JumlahBukuPinjam()
    {
        $query = $this->db->table('tbl_peminjaman')->where('status_pinjam', 'Dipinjam')->countAllResults();
        return $query;

    }


    public function JumlahBukuPinjamTerlambat()
    {
        $query = $this->db->table('tbl_peminjaman')->where('status_pinjam', 'Belum Kembali')->countAllResults();
        return $query;

    }




}
