<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWebSetting extends Model
{
    public function DetailWeb()
    {
        return $this->db->table('web_setting')->where('id_web', '1')->get()->getRowArray();
    }

}
