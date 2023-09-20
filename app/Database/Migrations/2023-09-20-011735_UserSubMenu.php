<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserSubMenu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'menu_id' => ['type' => 'INT'],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'url' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'is_active' => ['type' => 'INT']
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user_sub_menu');
    }

    public function down()
    {
        //
    }
}
