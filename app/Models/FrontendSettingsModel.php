<?php

namespace App\Models;

use CodeIgniter\Model;

class FrontendSettingsModel extends Model
{
    protected $table            = 'frontend_settings';
    protected $allowedFields    = [
        'group_name','settings_name','settings_value'
    ];
    protected $returnType       = 'array';
    protected $useTimestamps = false;

}
