<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelUser = new ModelUser;
    }


    public function index()
    {
        $data = [
            'menu' => 'pengaturan',
            'submenu'=> 'Kelola User',
            'judul' => 'Halaman User',
            'page' => 'user/v_index.php',
            'user' => $this->ModelUser->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function TambahUser()
    {
        $data = [
            'menu' => 'pengaturan',
            'submenu'=> 'Kelola User',
            'judul' => 'Tambah User',
            'page' => 'user/v_adddata.php',
        ];
        return view('v_template_admin', $data);
    }

    public function SimpanData()
    {
        if ($this->validate([
            'pos_nama' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],
            'pos_email' => [
                'label' => 'E-Mail',
                'rules' => 'required|is_unique[tbl_user.email_user]',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                    'is_unique' => '{field} Sudah terdaftar, silahkan gunakan email yang lain !',
                ]
            ],
            'pos_password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],
            'pos_hp' => [
                'label' => 'No Handphone',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],
            'pos_level' => [
                'label' => 'level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],
            'foto' => [
                'label' => 'Foto User',
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
                'nama_user' => $this->request->getPost('pos_nama'),
                'email_user' => $this->request->getPost('pos_email'),
                'password' => $this->request->getPost('pos_password'),
                'no_hp' => $this->request->getPost('pos_hp'),
                'level' => $this->request->getPost('pos_level'),
                'foto' => $nama_file,  
            ];
            $foto->move('foto', $nama_file);
            $this->ModelUser->Tambah($data);
            session()->setFlashdata('pesan', 'Data user Berhasil Ditambahkan');
            return redirect()->to(base_url('User/index'));  
        } else {
            // jika lulus validasi maka...
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('User/TambahUser'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function EditData($id_user)
    {
        $data = [
            'menu' => 'pengaturan',
            'submenu'=> 'Edit Data User',
            'judul' => 'Halaman Edit Data User',
            'page' => 'user/v_editdata.php',
            'user' => $this->ModelUser->AmbilDetail(),
        ];
        return view('v_template_admin' , $data);
    }

    public function HapusData($id_user)
    {
        $user = $this->ModelUser->AmbilDetail($id_user);
        if ($user['foto'] = '') {
            unlink('foto/' . $user['foto']);
        }

        $data = [
            'id_user' => $id_user
        ];

            $this->ModelUser->HapusUser($data);
            session()->setFlashdata('pesan', 'Data User Dihapus');
            return redirect()->to(base_url('User'));  
    }

}
