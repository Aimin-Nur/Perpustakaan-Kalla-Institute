<?php

namespace App\Controllers;
use App\Models\ModelAuth;
use App\Models\ModelProdi;

class Auth extends BaseController
{

    public function __construct(){
        helper('form');
        $this->ModelAuth = new ModelAuth();
        $this->ModelProdi = new ModelProdi();
    }
    public function login()
    {
        $data = [
            'judul' => 'Login',
            'page' => 'v_login',
        ];
        return view('v_template_login', $data);
    }

    public function loginAdmin() {
        $data = [
            'judul' => 'Login Pustakawan',
            'page' => 'v_login_user',
        ];
        return view('v_template_login', $data);
    }


    public function cekLoginAdmin(){
        if($this->validate([
            'email' => [
                'label' => 'E-mail',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'E-mail Masih Kosong !',
                    'valid_email' => ' Gunakan format e-mail !',
                ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password Masih Kosong !',
                    ]
                ]
        ])){
            $email = $this->request->getpost('email');
            $password = $this->request->getpost('password');
            // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $cek_login = $this->ModelAuth->loginAdmin($email, $password);
            if($cek_login){
                session()->set('nama_user', $cek_login['nama_user']);
                session()->set('email', $cek_login['email_user']);
                session()->set('level', $cek_login['level']);
                return redirect()->to(base_url('Admin'));
            }else{
                session()->setFlashdata('pesan', 'E-mail Atau Password Salah');
                return redirect()->to(base_url('Auth/loginAdmin'));
            }
        }else{
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/loginAdmin'));
        }
        
    }

    public function loginAnggota() {
        $data = [
            'judul' => 'Login Mahasiswa',
            'page' => 'v_login_agt',
        ];
        return view('v_template_login.php', $data);

    }

    public function logOut(){
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Logout Berhasil !');
        return redirect()->to(base_url('Auth/loginAdmin'));
    }

    public function LogOutAnggota(){
        session()->remove('id_anggota');
        session()->remove('nama_user');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Logout Berhasil !');
        return redirect()->to(base_url('Auth/loginAnggota'));
    }

    public function DaftarAnggota()
    {
        $data = [
            'judul' => 'Register Anggota',
            'page' => 'v_registerAgt',
            'prodi' => $this->ModelProdi->AllData(),
        ];
        return view('v_template_login', $data);
    }

    public function Register()
    {
        if ($this->validate([
            'post_nama' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],
            'post_nim' => [
                'label' => 'NIM',
                'rules' => 'required|is_unique[anggota_mahasiswa.nim]',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                    'is_unique' => '{field} Sudah terdaftar, silahkan gunakan email yang lain !',
                ]
            ],
            'post_sandi' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],
            
            'post_hp' => [
                'label' => 'No. Handphone',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],
            'post_prodi' => [
                'label' => 'Prodi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !',
                ]
            ],
        ])) {
            
            $data = [
                'id_prodi' => $this->request->getpost('post_prodi'),
                'nim' => $this->request->getPost('post_nim'),
                'nama_mhs' => $this->request->getPost('post_nama'),
                'email' => $this->request->getPost('post_email'),
                'no_hp' => $this->request->getPost('post_hp'),
                'password' => $this->request->getPost('post_sandi'),
                'gender' => $this->request->getPost('post_gender'),
            ];
    
                $this->ModelAuth->Register($data);
                session()->setFlashdata('sukses', 'Data Berhasil Didaftar');
                return redirect()->to(base_url('Auth/LoginAnggota'));  
        }else{
        
             session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
             return redirect()->to(base_url('Auth/DaftarAnggota'))->withInput('validation', \Config\Services::validation());
        }

    }


    public function CekLoginAgt(){
        if($this->validate([
            'post_nim' => [
                'label' => 'Nim',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !',
                ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password Masih Kosong !',
                    ]
                ]
        ])){
            $nim = $this->request->getpost('post_nim');
            $password = $this->request->getpost('password');
            // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $cek_login = $this->ModelAuth->loginAnggota($nim, $password);
            if($cek_login){
                session()->set('id_anggota', $cek_login['id_anggota']);
                session()->set('nama_mhs', $cek_login['nama_mhs']);
                session()->set('level', 'Anggota');
                return redirect()->to(base_url('DashboardAnggota'));
            }else{
                session()->setFlashdata('pesan', 'NIM atau Password salah !');
                return redirect()->to(base_url('Auth/loginAnggota'));
            }
        }else{
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/loginAnggota'));
        }
    }

    
}
