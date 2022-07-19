<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SupportTicket extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'full_name'      => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'user_id'        => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'       => true,
            ],
            'ticket_id'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'priority'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'email_address'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],

            'subject'      => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'message'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'attachments'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'status'       => [
                'type'       => 'INT',
                'constraint' => '11',
                'default'=>0,
            ],

        
        'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('support_tickets');
    }

    public function down()
    {
        $this->forge->dropTable('support_tickets');
    }
}
