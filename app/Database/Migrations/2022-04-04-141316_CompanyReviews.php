<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CompanyReviews extends Migration
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
             'company_id'      => [
                'type'       => 'INT',
                'constraint' => '11',
                'null'       => true,
            ],
             'user_id'      => [
                'type'       => 'INT',
                'constraint' => '11',
                'null'       => true,
            ],
            'company_rating'      => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'company_review'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
           
           
        
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('company_reviews');
    }

    public function down()
    {
        $this->forge->dropTable('company_reviews');
    }
}
