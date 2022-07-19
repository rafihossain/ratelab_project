<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialIconModel extends Model
{
    protected $table            = 'social_icons';
    protected $allowedFields    = [
        'title','social_icon','url'
    ];
    protected $returnType       = 'array';
    protected $useTimestamps = false;
}
