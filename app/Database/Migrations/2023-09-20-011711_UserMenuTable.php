<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMenuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'menu' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user_menu');
    }

    public function down()
    {
        //
    }
}
