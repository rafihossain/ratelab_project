<?php

namespace App\Models;

use CodeIgniter\Model;

class UserDetailsModel extends Model
{
    protected $table            = 'tbl_user_details';
    protected $allowedFields    = [
        'user_id','user_address','user_country','user_state','user_city','zip_code','user_about','user_image'
    ];
    protected $returnType = 'App\Entities\UserDetailsEntitie';
    protected $useTimestamps = false;
}
