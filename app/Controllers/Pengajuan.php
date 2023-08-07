<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;
use App\Models\ModelBuku;
use App\Models\ModelPeminjaman;
use CodeIgniter\I18n\Time;

class Pengajuan extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelAnggota = new ModelAnggota;
        $this->ModelBuku = new ModelBuku;
        $this->ModelPeminjaman = new ModelPeminjaman;
    }

    public function index()
    {
        if ($this->validate([
            'id_buku' => [
                'label' => 'Judul Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],
            'post_tgl_pinjam' => [
                'label' => 'Tanggal Pinjam',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Pinjam Masih Kosong !',
                ]
            ],
            'post_durasi' => [ 
                'label' => 'Durasi Pinjam',
                'rules' => 'required|numeric|min_length[1]|max_length[7]', 
                'errors' => [
                    'required' => 'Durasi Pinjam Wajib diisi !',
                    'numeric' => 'Durasi Pinjam harus berupa angka !',
                    'min_length' => 'Durasi Pinjam minimal 1 hari !',
                    'max_length' => 'Durasi Pinjam maksimal 7 hari !',
                ]
            ]
        ])){
            // tanggal harus kembali
            $hari_pinjam = Time::parse($this->request->getPost('tgl_pinjam'));
            $thn_pinjam = $hari_pinjam->getYear();   
            $bln_pinjam = $hari_pinjam->getMonth();  
            $tgl_pinjam = $hari_pinjam->getDay();   

            $lama_pinjam = $this->get('post_durasi');

            $tgl_harus_kembali = date("Y-m-d", mktime(0, 0, 0, $bln_pinjam, $tgl_pinjam + $lama_pinjam, $thn_pinjam,));

            $data = [
                'no_pinjam' => $this->request->getpost('post_no_pinjam'),
                'tgl_pengajuan' => date ('Y-m-d'),
                'id_anggota' => session()->get('id_anggota'),
                'tgl_pinjam' => $this->request->getpost('post_tgl_pinjam'),
                'id_buku' => $this->request->getpost('id_buku'),
                'qty' => '1',
                'lama_pinjam' => $this->request->getpost('post_durasi'),
                'tgl_kembali'=> $tgl_harus_kembali,
                'status_pinjam'=> 'Pengajuan',
            ];
            $this->ModelPeminjaman->AddData($data);
            session()->setFlashdata('pesan', 'Peminjaman Buku Berhasil diajukan');
            return redirect()->to(base_url('Auth'));  

        }else{
            // jika tidak lulus validasi maka...
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Cbuku/index'));
        }
    }
}

