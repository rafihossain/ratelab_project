<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table            = 'notifications';
    protected $allowedFields    = [
        'mail_sub','mail_body','mail_tags','sys_tags','sys_content'
    ];
    protected $returnType       = \App\Entities\User::class;
    protected $useTimestamps = false;
}
