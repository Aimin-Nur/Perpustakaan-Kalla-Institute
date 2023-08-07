<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;

class Anggota extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAnggota = new ModelAnggota;
    }


    public function index()
    {
        $data = [
            'menu' => 'masteranggota',
            'submenu'=> 'anggota',
            'judul' => 'Dashboard Anggota',
            'page' => 'anggota/v_anggota.php',
            'agt' => $this->ModelAnggota->AllData(),
        ];
        return view('v_template_admin', $data);
    }
}
