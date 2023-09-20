<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserAccessMenuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'role_id' => ['type' => 'INT'],
            'menu_id' => ['type' => 'INT'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user_access_menu');
    }

    public function down()
    {
        //
    }
}
