<?php

namespace App\Models;

use CodeIgniter\Model;

class PolicyPageModel extends Model
{
    protected $table            = 'policy_pages';
    protected $allowedFields    = [
        'title','details',
    ];
    protected $returnType       = 'array';
    protected $useTimestamps = false;
}
