<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialItemModel extends Model
{
    protected $table            = 'testimonial_items';
    protected $allowedFields    = [
        'name','address','quote','image'
    ];
    protected $returnType       = 'array';
    protected $useTimestamps = false;
}
