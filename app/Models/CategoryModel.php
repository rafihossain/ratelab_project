<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
   protected $table            = 'categories';
    protected $allowedFields    = [
        'category_name','category_icon','status'
    ];
    protected $returnType = 'App\Entities\CategoryEntitie';
    protected $useTimestamps = false;
}
