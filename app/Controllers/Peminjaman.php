<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;
use App\Models\ModelBuku;
use App\Models\ModelPeminjaman;
use App\Models\ModelUser;

use CodeIgniter\I18n\Time;

class Peminjaman extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAnggota = new ModelAnggota;
        $this->ModelBuku = new ModelBuku;
        $this->ModelPeminjaman = new ModelPeminjaman;
        $this->ModelUser = new ModelUser;
        $this->email = \Config\Services::email();
    }
    


    public function Pengajuan()
    {
        $id_anggota = session()->get('id_anggota');
        $data = [
            'menu' => 'peminjaman',
            'submenu'=> 'pengajuan',
            'judul' => 'Peminjaman Buku',
            'page' => 'v_peminjaman/v_pengajuan',
            'mhs' => $this->ModelAnggota->ProfilAnggota($id_anggota),
            'pengajuanbuku' => $this->ModelPeminjaman->PengajuanBuku($id_anggota),
        ];
        return view('v_template_anggota', $data);
    }


    public function PengajuanDitolakAgt()
    {
        $id_anggota = session()->get('id_anggota');
        $data = [
            'menu' => 'peminjaman',
            'submenu'=> 'ditolak',
            'judul' => 'Pengajuan Ditolak',
            'page' => 'v_peminjaman/v_tolak_agt',
            'tolak' => $this->ModelPeminjaman->TolakAgt($id_anggota),
            'mhs' => $this->ModelAnggota->ProfilAnggota($id_anggota),
        ];
        return view('v_template_anggota', $data);
    }

    public function HistoryAgt($id_anggota)
    {
        $id_anggota = session()->get('id_anggota');
       
        $data = [
            'id_anggota' => $id_anggota,
            'menu' => 'peminjaman',
            'submenu' => 'history',
            'judul' => 'History Peminjaman Buku',
            'page' => 'v_peminjaman/v_history_agt',
            'hstagt' => $this->ModelPeminjaman->HistoryBukuAgt($id_anggota),
            'mhs' => $this->ModelAnggota->ProfilAnggota($id_anggota),
        ];

        return view('v_template_anggota', $data);
       
    }

    
    
    public function TerimaAgt()
    {
        $id_anggota = session()->get('id_anggota');
        $no_pinjam = session()->get('no_pinjam');

        // // Jika data tidak ditemukan, tampilkan halaman 404 Not Found
        // if (!$peminjaman) {
        //     throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        // }else{

        $data = [
            'menu' => 'peminjaman',
            'submenu' => 'diterima',
            'judul' => 'Validasi Peminjaman Buku',
            'page' => 'v_peminjaman/v_terima_agt',
            'peminjaman' => $this->ModelPeminjaman->BukuDiterima($id_anggota, $no_pinjam),
            'mhs' => $this->ModelAnggota->ProfilAnggota($id_anggota),
        ];

        return view('v_template_anggota', $data);
       
    }


    public function detailPeminjaman($id_anggota, $no_pinjam)
    {
        $modelPeminjaman = new ModelPeminjaman();
        $data = [
            'page' => 'v_peminjaman/v_terima_agt',
            'peminjaman' => $modelPeminjaman->BukuDiterima($id_anggota, $no_pinjam)
        ];
        // Jika data tidak ditemukan, tampilkan halaman 404 Not Found
        if (!$data['peminjaman']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Tampilkan halaman view untuk menampilkan detail peminjaman
        return view('v_template_anggota', $data);
    }


    

    public function ShowBuku()
    {
        $id_anggota = session()->get('id_anggota');
        $data = [
            'menu' => 'peminjaman',
            'submenu'=> 'pengajuan',
            'judul' => 'Peminjaman Buku',
            'page' => 'v_peminjaman/v_show_buku',
            'mhs' => $this->ModelAnggota->ProfilAnggota($id_anggota),
            'buku' => $this->ModelBuku->AllData()
        ];
        return view('v_template_anggota', $data);

    }

    

    // public function AddPengajuan()
    // {
    //     if ($this->validate([
    //         'id_buku' => [
    //             'label' => 'Judul Buku',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib diisi !',
    //             ]
    //         ],
    //     ])){
    //         // tanggal harus kembali
    //         $hari_pinjam = Time::parse($this->request->getPost('tgl_pinjam'));
    //         $thn_pinjam = $hari_pinjam->getYear();   
    //         $bln_pinjam = $hari_pinjam->getMonth();  
    //         $tgl_pinjam = $hari_pinjam->getDay();   

    //         $lama_pinjam = $this->request->getPost('durasi');

    //         $tgl_harus_kembali = date("Y-m-d", mktime(0, 0, 0, $bln_pinjam, $tgl_pinjam + $lama_pinjam, $thn_pinjam,));

    //         $data = [
    //             'no_pinjam' => $this->request->getPost('post_no_pinjam'),
    //             'tgl_pengajuan' => date ('Y-m-d'),
    //             'id_anggota' => session()->get('id_anggota'),
    //             'tgl_pinjam' => $this->request->getPost('tgl_pinjam'),
    //             'id_buku' => $this->request->getPost('id_buku'),
    //             'qty' => '1',
    //             'lama_pinjam' => $this->request->getPost('durasi'),
    //             'tgl_kembali'=> $tgl_harus_kembali,
    //             'status_pinjam'=> 'Pengajuan',
    //         ];
    //         $this->ModelPeminjaman->AddData($data);
    //         session()->setFlashdata('pesan', 'Peminjaman Buku Berhasil diajukan');
    //         return redirect()->to(base_url('Peminjaman/Pengajuan/'));  

    //     }else{
    //         // jika tidak lulus validasi maka...
    //         session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
    //         return redirect()->to(base_url('Peminjaman/Pengajuan/'));
    //     }
    // }



    public function AddPengajuan()
    {
        if ($this->validate([
            'no_pinjam' => [
                'label' => 'Nomor Pinjam',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],
            'tgl_pinjam' => [
                'label' => 'Tanggal Pinjam',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Pinjam Masih Kosong !',
                ]
            ],
            'durasi' => [ 
                'label' => 'Durasi Pinjam',
                'rules' => 'required|numeric|min_length[1]|max_length[7]', 
                'errors' => [
                    'required' => 'Durasi Pinjam Wajib diisi !',
                    'numeric' => 'Durasi Pinjam harus berupa angka !',
                    'min_length' => 'Durasi Pinjam minimal 1 hari !',
                    'max_length' => 'Durasi Pinjam maksimal 7 hari !',
                ]
            ]
        ])) {
            $hari_pinjam = Time::parse($this->request->getPost('tgl_pinjam'));
            $thn_pinjam = $hari_pinjam->getYear();   
            $bln_pinjam = $hari_pinjam->getMonth();  
            $tgl_pinjam = $hari_pinjam->getDay();   

            $lama_pinjam = $this->request->getPost('durasi');

            $tgl_harus_kembali = date("Y-m-d", mktime(0, 0, 0, $bln_pinjam, $tgl_pinjam + $lama_pinjam, $thn_pinjam,));

            // Ambil data dari form
            $data = [
                'no_pinjam' => $this->request->getPost('no_pinjam'),
                'tgl_pengajuan' => date('Y-m-d'),
                'id_anggota' => session()->get('id_anggota'),
                'tgl_pinjam' => $this->request->getPost('tgl_pinjam'),
                'id_buku' => $this->request->getPost('judul_buku'),                                 
                'lama_pinjam' => $this->request->getPost('durasi'),
                'tgl_kembali' => $tgl_harus_kembali,
                'status_pinjam' => 'Diajukan',
                'id_prodi' => $this->request->getPost('id_prodi'),
            ];
            
            // Panggil model dan gunakan fungsi AddPengajuan
            $this->ModelPeminjaman->AddPengajuan($data);

            session()->setFlashdata('pesan', 'Peminjaman Buku Berhasil diajukan');
            return redirect()->to(base_url('Peminjaman/Pengajuan'));
            } else {
                // jika tidak lulus validasi maka...
                session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                return redirect()->to(base_url('Peminjaman/Pengajuan'));
            }
    }


    public function ShowBukuAll()
    {
        $id_anggota = session()->get('id_anggota');
        $data = [
            'menu' => 'showbuku',
            'submenu'=> 'showbuku',
            'judul' => 'Peminjaman Buku',
            'page' => 'v_peminjaman/v_show_buku',
            'mhs' => $this->ModelAnggota->ProfilAnggota($id_anggota),
            'buku' => $this->ModelBuku->AllData()
        ];
        return view('v_template_anggota', $data);
    }


    public function DetailBuku($id_buku) 
    {
        $id_anggota = session()->get('id_anggota');
        $data = [
            'id_buku' => $id_buku,
            'menu' => 'showbuku',
            'submenu'=> 'showbuku',
            'judul' => 'Detail Buku',
            'page' => 'buku/v_detail_buku',
            'mhs' => $this->ModelAnggota->ProfilAnggota($id_anggota),
            'buku' => $this->ModelBuku->AmbilDetail($id_buku),
        ];
        return view('v_template_anggota', $data);
    }


    public function kirimEmail($id_pinjam)
    {
        $peminjamanModel = new ModelPeminjaman();
        $peminjaman = $peminjamanModel->find($id_pinjam);

        if (!$peminjaman) {
            // Jika data peminjaman tidak ditemukan
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan.');
        }

        // Ambil email peminjam berdasarkan id_pinjam
        $anggotaMahasiswaModel = new ModelAnggota();
        $emailPeminjam = $anggotaMahasiswaModel->getEmailPeminjam($id_pinjam);

        if (!$emailPeminjam) {
            // Jika email peminjam tidak ditemukan
            return redirect()->back()->with('error', 'Email peminjam tidak ditemukan.');
        }

       
        $email = \Config\Services::email();

        $email->setFrom('projectwebfinal@gmail.com', 'Petugas Perpustakaan Kalla Institute');
        $email->setTo($emailPeminjam); //  email peminjam diambil dari Model
        $email->setSubject('Peminjaman Mendekati Waktu Limit');

        $endDate = new Time($peminjaman['tgl_kembali']);
        $message = 'Peminjaman Anda akan segera berakhir pada tanggal ' . $endDate->toLocalizedString('d MMMM yyyy') . '.';
        $email->setMessage($message);

        // Kirim email
        if ($email->send()) {
            return redirect()->back()->with('success', 'Email berhasil dikirim.');
        } else {
            return redirect()->back()->with('error', 'Email gagal dikirim.');
        }
    }


    public function kirimEmailTolak($id_pinjam)
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
        $email->setTo($emailPeminjam); //  email peminjam diambil dari Model
        $email->setSubject('Peminjaman Ditolak');

        $message = 'Peminjaman buku anda ditolak, karena buku hanya bisa dibaca diperpustakaan.';
        $email->setMessage($message);

        // Kirim email
        if ($email->send()) {
            session()->setFlashdata('pesan', 'Email Berhasil Dikirim');
            return redirect()->to(base_url('Admin/PengajuanDiterima'));
        } else {
            return redirect()->back()->with('error', 'Email gagal dikirim.');
        }
    }



    public function getBookCountPerProdi()
    {
        $builder = $this->db->table('tbl_peminjaman');
        $builder->select('prodi.nama_prodi, COUNT(*) as jumlah_buku');
        $builder->join('anggota', 'tbl_peminjaman.id_anggota = anggota.id_anggota');
        $builder->join('prodi', 'anggota.id_prodi = prodi.id_prodi');
        $builder->groupBy('prodi.nama_prodi');
        
        $query = $builder->get();
        return $query->getResultArray();
    }


    


    

   

}
