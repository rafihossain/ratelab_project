<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PolicyPages extends Migration
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
            'title'      => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'details'       => [
                'type' => 'TEXT',
                'null' => true,
            ],
           
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('policy_pages');
    }

    public function down()
    {
        $this->forge->dropTable('policy_pages');
    }
}
