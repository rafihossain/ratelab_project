<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tbl_users';
    protected $allowedFields    = [
        'first_name','last_name','email_address','phone_number','user_name','user_password','user_type','remember_key','password_reset_token','status','email_verification','sms_verification'
    ];
    protected $returnType = 'App\Entities\User';
    protected $useTimestamps = false;
}
