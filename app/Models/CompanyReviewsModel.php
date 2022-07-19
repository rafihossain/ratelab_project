<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyReviewsModel extends Model
{
    protected $table            = 'company_reviews';
    protected $allowedFields    = [
        'company_id','user_id','company_rating','company_review'
    ];
    protected $returnType = 'App\Entities\CompanyReviewsEntitie';
    protected $useTimestamps = false;
}
