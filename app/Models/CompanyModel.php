<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table            = 'companies';
    protected $allowedFields    = [
        'company_name','category_id','user_id','email_address','tags','image','url','company_address','description','status',
    ];
    protected $returnType = 'App\Entities\CompanyEntitie';
    protected $useTimestamps = false;
}
