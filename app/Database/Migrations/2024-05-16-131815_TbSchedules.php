<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbSchedules extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'schedule_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'room_code' => [
                'type' => 'INT',
                'constraint' => 15,
            ],
            'capacity' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
        ]);
        $this->forge->addPrimaryKey('schedule_id');
        $this->forge->createTable('tb_schedules');
    }

    public function down()
    {
        $this->forge->dropTable('tb_schedules');
    }
}
