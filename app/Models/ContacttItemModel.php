<?php

namespace App\Models;

use CodeIgniter\Model;

class ContacttItemModel extends Model
{
    protected $table            = 'contact_us_items';
    protected $allowedFields    = [
        'title','icon','content'
    ];
    protected $returnType       = 'array';
    protected $useTimestamps = false;
}
