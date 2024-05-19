<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbBuildings extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'building_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'building_code' => [
                'type' => 'INT',
                'constraint' => 15,
            ],
            'building_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'total_floor' => [
                'type' => 'INT',
                'constraint' => 15,
            ],
            
            'total_room' => [
                'type' => 'INT',
                'constraint' => 15,
            ],
        ]);
        $this->forge->addPrimaryKey('building_id');
        $this->forge->createTable('tb_buildings');
    }

    public function down()
    {
        $this->forge->dropTable('tb_buildings');
    }
}
