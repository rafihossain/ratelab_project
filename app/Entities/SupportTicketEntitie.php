<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SupportTicketEntitie extends Entity
{
    protected $datamap = [];
    protected $dates   = ['updated_at', 'deleted_at'];
    protected $casts   = [];
}
