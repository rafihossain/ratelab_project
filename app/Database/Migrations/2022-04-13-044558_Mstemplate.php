<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mstemplate extends Migration
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
            'name'      => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'mail_subject'      => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'mail_body'     => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'mail_status'     => [
                'type'       => 'INT',
                'constraint'     => 11,
                'null'       => true,
            ],
            'sms_body'     => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'sms_status'     => [
                'type'       => 'INT',
                'constraint'     => 11,
                'null'       => true,
            ],
         
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ms_templates');
    }

    public function down()
    {
        $this->forge->dropTable('ms_templates');
    }
}
