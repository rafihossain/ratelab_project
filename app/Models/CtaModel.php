<?php

namespace App\Models;

use CodeIgniter\Model;

class CtaModel extends Model
{
    protected $table            = 'cta_items';
    protected $allowedFields    = [
        'title','description','icon','url','button_name'
    ];
    protected $returnType       = 'array';
    protected $useTimestamps = false;
}
