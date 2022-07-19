<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
    protected $table            = 'faq_items';
    protected $allowedFields    = [
        'question','answer',
    ];
    protected $returnType       = 'array';
    protected $useTimestamps = false;
}
