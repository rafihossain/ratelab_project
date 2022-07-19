<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table            = 'blogs';
    protected $allowedFields    = [
        'title','description','image'
    ];
    protected $returnType       = 'array';
    protected $useTimestamps = false;
}
