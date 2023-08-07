<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBuku;
use App\Models\ModelKategori;
use App\Models\ModelRak;
use App\Models\ModelPenulis;
use App\Models\ModelPenerbit;
use CodeIgniter\Pager\Pager;

class Cbuku extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelBuku = new ModelBuku;
        $this->ModelKategori = new ModelKategori;
        $this->ModelRak = new ModelRak;
        $this->ModelPenulis = new ModelPenulis;
        $this->ModelPenerbit = new ModelPenerbit;
    }


    public function paginateData()
{
    $model = new ModelBuku();
    $perPage = 3; // Jumlah data per halaman

    $data = [
        'menu' => 'masterdata',
        'submenu' => 'buku',
        'judul' => 'Data Informasi Buku',
        'page' => 'buku/v_buku',
        'buku' => $model->paginate($perPage), // Mengambil data berdasarkan halaman
        'pager' => $model->pager,
        'kategori' => $this->ModelKategori->AllData(),
        'rak' => $this->ModelRak->AllData(),
        'penulis' => $this->ModelPenulis->AllData(),
        'penerbit' => $this->ModelPenerbit->AllData(),
    ];

    return view('v_template_admin', $data);
}


    public function index()
    {
        $pager = $this->ModelBuku->pager;
        $data = [
            'menu' => 'masterdata',
            'submenu'=> 'buku',
            'judul' => 'Data Informasi Buku',
            'page' => 'buku/v_buku',
            'pager' => $pager,
            'buku' => $this->ModelBuku->AllData(),
            'kategori' => $this->ModelKategori->AllData(),
            'rak' => $this->ModelRak->AllData(),
            'penulis' => $this->ModelPenulis->AllData(),
            'penerbit' => $this->ModelPenerbit->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function DetailBuku($id_buku) 
    {
        $data = [
            'id_buku' => $id_buku,
            'menu' => 'masterdata',
            'submenu'=> 'buku',
            'judul' => 'Data Buku',
            'page' => 'buku/v_detail_buku',
            'buku' => $this->ModelBuku->AmbilDetail($id_buku),
        ];
        return view('v_template_admin', $data);
    }


    public function TambahBuku()
    {
        if ($this->validate([
            'foto' => [
                'label' => 'Foto Buku',
                'rules' => 'uploaded[foto]|max_size[foto,10024]|mime_in[foto,image/png,image/jpg,image/gif,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi !',
                    'max_size' => '{field} Max 1024 kb !',
                    'mime_in' => 'Format {field} Harus sesuai JPG, PNG, GIF, JPEG !',
                ]
            ],
        ])){
        $foto = $this->request->getFile('foto');
        $nama_file = $foto->getRandomName();
        $data = [
            'kode_buku' => $this->request->getPost('post_kode'),
            'judul_buku' => $this->request->getPost('post_judul'),
            'judul_buku' => $this->request->getPost('post_judul'),
            'id_penulis' => $this->request->getPost('post_penulis'),
            'id_rak' => $this->request->getPost('post_rak'),
            'id_kategori' => $this->request->getPost('post_kategori'),
            'id_penerbit' => $this->request->getPost('post_penerbit'),
            'sinopsis' => $this->request->getPost('post_sinopsis'),
            'jumlah_hlm' => $this->request->getPost('post_hlm'),
            'tersedia' => $this->request->getPost('post_qty'),
            'isbn' => $this->request->getPost('post_isbn'),
            'foto_buku' => $nama_file,
        ];
        $foto->move('buku', $nama_file);
            $this->ModelBuku->TambahBuku($data);
            session()->setFlashdata('pesan', 'Data Buku Berhasil Ditambahkan');
            return redirect()->to(base_url('Cbuku/index'));  
        } else {
            // jika tidak lulus validasi maka...
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Cbuku/index'))->withInput('validation', \Config\Services::validation());
        }
        
        return view('v_template_admin', $data);
    }


    public function HapusBuku($id_buku)
    {
        $data = [
            'id_buku' => $id_buku
        ];

            $this->ModelBuku->HapusBuku($data);
            session()->setFlashdata('pesan', 'Buku Berhasil Dihapus');
            return redirect()->to(base_url('Cbuku'));  
    }


    public function EditBuku($id_buku)
    {
        
        $data = [
            'id_buku' => $id_buku,
            'kode_buku' => $this->request->getPost('post_kode'),
            'judul_buku' => $this->request->getPost('post_judul'),
            'id_penulis' => $this->request->getPost('post_penulis'),
            'id_rak' => $this->request->getPost('post_rak'),
            'id_kategori' => $this->request->getPost('post_kategori'),
            'id_penerbit' => $this->request->getPost('post_penerbit'),
            'sinopsis' => $this->request->getPost('post_sinopsis'),
            'jumlah_hlm' => $this->request->getPost('post_hlm'),
            'tersedia' => $this->request->getPost('post_qty'),
            'isbn' => $this->request->getPost('post_isbn'),
            
        ];

            $this->ModelBuku->EditBuku($data);
            session()->setFlashdata('pesan', 'Data Buku Berhasil Diedit');
            return redirect()->to(base_url('Cbuku'));  
    }

    
}
