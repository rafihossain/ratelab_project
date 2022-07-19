<?php

namespace App\Models;

use CodeIgniter\Model;

class ChooseReasonModel extends Model
{
    protected $table            = 'choose_reason_items';
    protected $allowedFields    = [
        'title','description','icon'
    ];
    protected $returnType       = 'array';
    protected $useTimestamps = false;
}
