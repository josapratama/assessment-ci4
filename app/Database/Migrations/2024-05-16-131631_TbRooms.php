<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbRooms extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'room_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'room_code' => [
                'type' => 'INT',
                'constraint' => 15,
            ],
            'room_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'room_floor' => [
                'type' => 'INT',
                'constraint' => 15,
            ],
            'building_code' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'room_capacity' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
        ]);
        $this->forge->addPrimaryKey('room_id');
        $this->forge->createTable('tb_rooms');
    }

    public function down()
    {
        $this->forge->dropTable('tb_rooms');
    }
}
