<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;
use App\Models\ModelPeminjaman;

class DashboardAnggota extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAnggota = new ModelAnggota;
        $this->ModelPeminjaman = new ModelPeminjaman;
    }


    public function index()
    {
        $id_anggota = session()->get('id_anggota');
        $data = [
            'menu' => 'dashboard',
            'submenu'=> 'dashboard_anggota',
            'judul' => 'Dashboard',
            'page' => 'v_dashboard_anggota',
            'mhs' => $this->ModelAnggota->ProfilAnggota($id_anggota),
            'bkpjm' => $this->ModelPeminjaman->HistoryBukuAgtPinjaman($id_anggota),
        ];
        return view('v_template_anggota', $data);
    }

    public function Edit($id_anggota)
    {
        if ($this->validate([
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/gif,image/jpeg,image/ico]',
                'errors' => [
                    'max_size' => '{field} Max 1024 kb !',
                    'mime_in' => 'Format {field} Harus sesuai JPG, PNG, GIF, JPEG !',
                ]
            ],
        ])){
            // Menghapus foto lama (jika ada)
            $user = $this->ModelAnggota->findById($id_anggota);
            $oldFoto = $user['foto_mhs'];
            if ($oldFoto && file_exists('foto/' . $oldFoto)) {
                unlink('foto/' . $oldFoto);
            }
            
            // Jika validasi berhasil
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getRandomName();
            $data = [
                'id_anggota' => $id_anggota,
                'foto_mhs' => $nama_file,  
            ];
            // memindahkan file foto kedalam folder foto
            $foto->move('foto', $nama_file);
            $this->ModelAnggota->Edit($data);
            // Muncul notif berhasil
            session()->setFlashdata('pesan', 'Foto Profil Berhasil Diupdate');
            return redirect()->to(base_url('DashboardAnggota/index'));  
        } else {
            // jika tidak lolos validasi maka...
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('DashboardAnggota/index'));
        }

    }


}
