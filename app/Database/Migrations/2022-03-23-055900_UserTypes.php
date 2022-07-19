<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTypes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tbl_user_type_id'        => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'type_name'     => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('tbl_user_type_id', true);
        $this->forge->createTable('tbl_user_types');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_user_types');
    }
}
