<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserRole extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'role' => [
                'type' =>'VARCHAR',
                'constraint' => '255'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user_role');
    }

    public function down()
    {
        //
    }
}
