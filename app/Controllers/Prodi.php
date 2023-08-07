<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProdi;

class Prodi extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelProdi = new ModelProdi;
    }


    public function index()
    {
        $data = [
            'menu' => 'masteranggota',
            'submenu'=> 'Prodi',
            'judul' => 'Prodi Buku',
            'page' => 'anggota/v_prodi.php',
            'prodi' => $this->ModelProdi->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Tambah()
    {
        $data = [
            'nama_prodi' => $this->request->getPost('post_prodi'),
        ];
            $this->ModelProdi->Tambah($data);
            session()->setFlashdata('pesan', 'Prodi Berhasil Disimpan');
            return redirect()->to(base_url('Prodi'));  
    }

    public function EditProdi($id_Prodi)
    {
        $data = [
            'id_prodi' => $id_Prodi,
            'nama_prodi' => $this->request->getPost('post_prodi'),
        ];

            $this->ModelProdi->EditProdi($data);
            session()->setFlashdata('pesan', 'Data Prodi Berhasil Diupdate');
            return redirect()->to(base_url('Prodi'));  
    }

    public function HapusProdi($id_Prodi)
    {
        $data = [
            'id_prodi' => $id_Prodi
        ];

            $this->ModelProdi->HapusProdi($data);
            session()->setFlashdata('pesan', 'Data Prodi Berhasil Dihapus');
            return redirect()->to(base_url('Prodi'));  
    }

}
