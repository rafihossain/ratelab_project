<?php

namespace App\Models;

use CodeIgniter\Model;

class NewPageModel extends Model
{
    protected $table            = 'new_pages';
    protected $allowedFields    = [
        'page_name','slug','selected_section'
    ];
    protected $returnType       = 'array';
    protected $useTimestamps = false;
}
