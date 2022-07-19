<?php

namespace App\Models;

use CodeIgniter\Model;

class MstemplateModel extends Model
{
    protected $table            = 'ms_templates';
    protected $returnType       = \App\Entities\User::class;
    protected $allowedFields    = [
        'name','mail_subject','mail_body','mail_status','sms_body','sms_status'
    ];
    protected $useTimestamps = false;
}
