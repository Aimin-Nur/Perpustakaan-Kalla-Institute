<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelRak;

class Rak extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelRak = new ModelRak;
    }


    public function index()
    {
        $data = [
            'menu' => 'masterdata',
            'submenu'=> 'rak',
            'judul' => 'Rak Buku',
            'page' => 'v_rak',
            'rak' => $this->ModelRak->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Tambah()
    {
        $data = [
            'rak_buku' => $this->request->getPost('bku_rak'),
            'posisi_lantai' => $this->request->getPost('lantai_rak'),
        ];
            $this->ModelRak->Tambah($data);
            session()->setFlashdata('pesan', 'Kategori Berhasil Disimpan');
            return redirect()->to(base_url('Rak'));  
    }

    public function EditRak($id_rak)
    {
        $data = [
            'id_rak' => $id_rak,
            'rak_buku' => $this->request->getPost('bku_rak'),
            'posisi_lantai' => $this->request->getPost('lantai_rak')  
        ];

            $this->ModelRak->EditRak($data);
            session()->setFlashdata('pesan', 'Data Rak Berhasil Diupdate');
            return redirect()->to(base_url('Rak'));  
    }

    public function HapusRak($id_rak)
    {
        $data = [
            'id_rak' => $id_rak
        ];

            $this->ModelRak->HapusRak($data);
            session()->setFlashdata('pesan', 'Data Rak Berhasil Dihapus');
            return redirect()->to(base_url('Rak'));  
    }

}
