<?php

namespace App\Models;

use CodeIgniter\Model;

class AdvertisementModel extends Model
{
    protected $table            = 'advertisements';
    protected $allowedFields    = [
        'type', 'size', 'impression', 'click', 'redirect', 'image', 'script', 'status'
    ];
    protected $returnType       = \App\Entities\Advertisement::class;
    protected $useTimestamps = false;
}
