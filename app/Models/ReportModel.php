<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
     protected $table            = 'reports';
    protected $allowedFields    = [
        'user_name','last_login','ip_address','location','windows_os'
    ];
    protected $returnType = 'App\Entities\ReportEntitie';
    protected $useTimestamps = false;
}
