<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelWebSetting;

class WebSetting extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelWebSetting = new ModelWebSetting;
    }

    public function index()
    {
        $data = [
            'menu' => 'pengaturan',
            'submenu'=> 'pengaturan_web',
            'judul' => 'Setting Web',
            'page' => 'v_pengaturan_web',
            'web' => $this->ModelWebSetting->DetailWeb(),
        ];
        return view('v_template_admin', $data);
    }
}
