<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FaqItem extends Migration
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
            'question'      => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'answer'       => [
                'type' => 'TEXT',
                'null' => true,
            ],
           
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('faq_items');
    }

    public function down()
    {
        $this->forge->dropTable('faq_items');
    }
}

