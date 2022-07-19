<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table            = 'settings';
    protected $allowedFields    = [
        'sname','sgroup','svalue'
    ];
    protected $returnType       = \App\Entities\User::class;
    protected $useTimestamps = false;
}
