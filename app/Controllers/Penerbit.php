<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenerbit;

class Penerbit extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelPenerbit = new ModelPenerbit;
    }


    public function index()
    {
         $data = [
            'menu' => 'masterdata',
            'submenu'=> 'penerbit',
            'judul' => 'Data Penerbit Buku',
            'page' => 'v_penerbit',
            'penerbit' => $this->ModelPenerbit->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Tambah()
    {
        $data = [
            'nama_penerbit' => $this->request->getPost('nama_penerbit')
        ];
            $this->ModelPenerbit->Tambah($data);
            session()->setFlashdata('pesan', 'Data Penerbit Berhasil Disimpan');
            return redirect()->to(base_url('Penerbit'));  
    }

    public function HapusPenerbit($id_penerbit)
    {
        $data = [
            'id_penerbit' => $id_penerbit
        ];

            $this->ModelPenerbit->HapusPenerbit($data);
            session()->setFlashdata('pesan', 'Data Penerbit Berhasil Dihapus');
            return redirect()->to(base_url('Penerbit'));  
    }

    public function EditPenerbit($id_penerbit)
    {
        $data = [
            'id_penerbit' => $id_penerbit,
            'nama_penerbit' => $this->request->getPost('nama_penerbit')  
        ];

            $this->ModelPenerbit->EditPenerbit($data);
            session()->setFlashdata('pesan', 'Kategori Berhasil Disimpan');
            return redirect()->to(base_url('Penerbit'));  
    }

}
