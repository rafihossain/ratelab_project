<?php

namespace App\Models;

use CodeIgniter\Model;

class SupportTicketModel extends Model
{
    protected $table            = 'support_tickets';
    protected $allowedFields    = [
        'full_name','user_id','ticket_id','priority','email_address','subject','message','attachments','status','created_at'
    ];
    protected $returnType = 'App\Entities\SupportTicketEntitie';
    protected $useTimestamps = false;
}
