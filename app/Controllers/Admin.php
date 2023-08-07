<?php

namespace App\Controllers;
use App\Models\ModelAnggota;
use App\Models\ModelBuku;
use App\Models\ModelPeminjaman;
use App\Models\ModelProdi;
use App\Models\ModelAuth;


use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
    protected $ModelBuku;

    public function __construct()
    {
        helper('form');
        $this->ModelAnggota = new ModelAnggota;
        $this->ModelBuku = new ModelBuku;
        $this->ModelPeminjaman = new ModelPeminjaman;
        $this->ModelProdi = new ModelProdi;
        $this->ModelAuth = new ModelAuth;
        $this->email = \Config\Services::email();
    }


    public function index()
    {
       
        $data = [
            'menu' => 'dashboard',
            'submenu' => 'dashboard',
            'judul' => 'Sistem Informasi Perpustakaan Kalla Institute',
            'page' => 'v_admin',
            'donut' => $this->ModelBuku->GetBookCountPerCategory(),
            'bookCounts' => $this->ModelPeminjaman->getBookCountPerProdi(), 
            'jumlah' => $this->ModelBuku->JumlahBuku(), 
            'anggota' => $this->ModelAnggota->JumlahAnggota(), 
            'pinjam' => $this->ModelPeminjaman->JumlahBukuPinjam(), 
            'terlambat' => $this->ModelPeminjaman->JumlahBukuPinjamTerlambat(), 
        ];
 
        return view('v_template_admin', $data);
    }

    

    public function PengajuanMasuk()
    {
        $data = [
            'menu' => 'pengajuan',
            'submenu'=> 'pengajuanmasuk',
            'judul' => 'Pengajuan Masuk',
            'page' => 'v_peminjaman/v_pengajuanMasuk',
            'pengajuanbuku' => $this->ModelPeminjaman->PengajuanMasuk(),
        ];
        return view('v_template_admin', $data);
    }


    public function DetailPinjam($id_pinjam)
    {
        $detailData = $this->ModelPeminjaman->getDetailData($id_pinjam);
        $data = [
            'menu' => 'pengajuan',
            'submenu'=> 'pengajuanmasuk',
            'judul' => 'Pengajuan Masuk',
            'page' => 'v_peminjaman/v_detail',
            'detailData' => $detailData,
        ];
        return view('v_template_admin', $data);
    }


    public function List($id_pinjam)
    {
        $data = [
            'menu' => 'pengajuan',
            'submenu'=> 'pengajuanmasuk',
            'judul' => 'Pengajuan Masuk',
            'page' => 'v_peminjaman/v_pengajuanMasuk',
            'buku' => $this->ModelPeminjaman->Detail($id_pinjam),
        ];
        return view('v_template_admin', $data);
    }



    public function TolakPeminjaman($id_pinjam)
    {
        $data = [
            'id_pinjam' => $id_pinjam,
            'status_pinjam'=> 'Ditolak',
            'ket' => $this->request->getPost('post_tolak')
        ];

        $this->ModelPeminjaman->EditData($data);
        session()->setFlashdata('ditolak', 'Pengajuan Peminjaman Berhasi Ditolak');
        return redirect()->to(base_url('Admin/PengajuanDiterima'));  
    }

    public function TerimaPeminjaman($id_pinjam)
    {
        $data = [
            'id_pinjam' => $id_pinjam,
            'status_pinjam'=> 'Diterima',
            'id_prodi' => $this->request->getPost('post_prodi'),
        ];

        $this->ModelPeminjaman->EditData($data);
        session()->setFlashdata('diterima', 'Pengajuan Peminjaman Berhasi Diterima');
        return redirect()->to(base_url('Admin/PengajuanDiterima'));  
    }


    public function AmbilBuku($id_pinjam)
    {
        $data = [
            'id_pinjam' => $id_pinjam,
            'status_pinjam'=> 'Dipinjam',
        ];

        $this->ModelPeminjaman->EditData($data);
        session()->setFlashdata('Diambil', ' Buku sudah diambil oleh peminjam');
        return redirect()->to(base_url('Admin/InfoPinjam'));  
    }

    public function BelumKembali($id_pinjam)
    {
        $data = [
            'id_pinjam' => $id_pinjam,
            'status_pinjam'=> 'Belum Kembali',
        ];

        $this->ModelPeminjaman->EditData($data);
        session()->setFlashdata('diterima', 'Pengajuan Peminjaman Berhasi Diterima');
        return redirect()->to(base_url('Admin/PengajuanMasuk'));  
    }


    public function PengajuanDitolak()
    {
        $data = [
            'menu' => 'pengajuan',
            'submenu'=> 'pengajuantolak',
            'judul' => 'Denda Peminjaman Terlambat',
            'page' => 'v_peminjaman/v_tolak',
            'tolak' => $this->ModelPeminjaman->Denda(),
        ];
        return view('v_template_admin', $data);
    }

    public function PengajuanDiterima()
    {
        $data = [
            'menu' => 'pengajuan',
            'submenu'=> 'pengajuanterima',
            'judul' => 'Informasi Peminjaman Pengajuan Buku',
            'page' => 'v_peminjaman/v_terima',
            'terima' => $this->ModelPeminjaman->Terima(),
           
        ];
        return view('v_template_admin', $data);
    }

  


    public function InfoPinjam()
    {
        $data = [
            'menu' => 'pengajuan',
            'submenu'=> 'pinjambuku',
            'judul' => 'Informasi Buku yang dipinjam',
            'page' => 'v_peminjaman/v_info',
            'info' => $this->ModelPeminjaman->InfoPinjam(),
        ];
        return view('v_template_admin', $data);
    }

    public function History()
    {
        $data = [
            'menu' => 'pengajuan',
            'submenu'=> 'history',
            'judul' => 'Riwayat Peminjaman Buku',
            'page' => 'v_peminjaman/v_history',
            'hst' => $this->ModelPeminjaman->HistoryBuku(),
            'info' => $this->ModelPeminjaman->InfoPinjam(),
        ];

        return view('v_template_admin', $data);
    }

   
  
    public function dashboard()
    {
        $data = [
            'page' => 'v_admin',
            'donut' => $this->ModelBuku->GetBookCountPerCategory(),
            'bookCounts' => $this->ModelPeminjaman->getBookCountPerProdi(),
        ];

        return view('v_template_admin', $data);
    }

    // public function PengembalianBuku($id_pinjam)
    // {
    //     $data = [
    //         'status_pinjam' => $this->request->getPost('post_kembali'),
    //     ];

    //     $this->ModelPeminjaman->EditData($data);
    // }

    public function SimpanPengembalian($id_pinjam)
    {
        $ModelPeminjaman = new \App\Models\ModelPeminjaman();

        $peminjaman = $ModelPeminjaman->find($id_pinjam);

        if ($peminjaman) {
            // Cek jika tgl_terlambat sudah tersimpan di database
            if ($peminjaman['tgl_terlambat'] === null) {
                // Simpan tgl_terlambat (tanggal hari ini) ke dalam database
                $tglTerlambat = date('Y-m-d');
                $data = [
    
                    'tgl_terlambat' => $tglTerlambat,

                ];
                $ModelPeminjaman->EditTerlambat($id_pinjam, $data);
        
                // Hitung durasi keterlambatan (tgl_kembali - tgl_terlambat) dalam hari
                $tglKembali = new \DateTime($peminjaman['tgl_kembali']);
                $tglTerlambatObj = new \DateTime($tglTerlambat);
                $durasi = $tglKembali->diff($tglTerlambatObj)->days;
        
              
                $data = [
                    'keterlambatan' => $durasi,
                ];
                $ModelPeminjaman->EditTerlambat($id_pinjam, $data);
            } else {
                
                $data = [
                    'status_pinjam' => 'Belum Kembali',
                ];
                $ModelPeminjaman->EditTerlambat($id_pinjam, $data);
            }
        }
        
        return redirect()->to(base_url('Admin/PengajuanDitolak'));
    }


    public function BukuDenda($id_pinjam)
    {
        $data = [
            'id_pinjam' => $id_pinjam,
            'status_pinjam'=> 'Dikembalikan',
            'keterlambatan' => NULL
        ];

        $this->ModelPeminjaman->SetNullDenda($id_pinjam);
        $this->ModelPeminjaman->EditData($data);
        session()->setFlashdata('pesan', 'Data Pengemablian Buku Berhasi Disimpan');
        return redirect()->to(base_url('Admin/History'));  
    }

    public function PengembalianOntime($id_pinjam)
    {
        $data = [
            'id_pinjam' => $id_pinjam,
            'keterlambatan'=> '0',
            'status_pinjam' =>'Dikembalikan',
        ];

        $this->ModelPeminjaman->EditTerlambat($id_pinjam, $data);
        return redirect()->to(base_url('Admin/History'));
    }


    public function EmailTelat($id_pinjam)
    {
        $peminjamanModel = new ModelPeminjaman();
        $peminjaman = $peminjamanModel->find($id_pinjam);

        if (!$peminjaman) {
           
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan.');
        }

       
        $anggotaMahasiswaModel = new ModelAnggota();
        $emailPeminjam = $anggotaMahasiswaModel->getEmailPeminjam($id_pinjam);

        if (!$emailPeminjam) {
           
            return redirect()->back()->with('error', 'Email peminjam tidak ditemukan.');
        }

      
        $email = \Config\Services::email();

        $email->setFrom('projectwebfinal@gmail.com', 'Petugas Perpustakaan Kalla Institute');
        $email->setTo($emailPeminjam); // Menggunakan email peminjam yang telah diambil dari Model
        $email->setSubject('Waktu peminjaman buku anda telah berakhir');

        $endDate = new Time($peminjaman['tgl_kembali']);
        $message = 'Peminjaman Buku Anda telah berakhir sejak tanggal ' . $endDate->toLocalizedString('d MMMM yyyy') . ' Harap mengembalikan buku ke perpustakaan segera.';
        $email->setMessage($message);

        // Kirim email
        if ($email->send()) {
            session()->setFlashdata('pesan', 'Email Berhasil Dikirim');
            return redirect()->to(base_url('Admin/History'));
        } else {
            return redirect()->back()->with('error', 'Email gagal dikirim.');
        }
    }


    
    
}
