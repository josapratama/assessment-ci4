<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLecturersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'lecturer_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nidn' => [
                'type' => 'INT',
                'constraint' => 20,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'home_address' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addPrimaryKey('lecturer_id');
        $this->forge->createTable('tb_lecturers');
    }

    public function down()
    {
        $this->forge->dropTable('tb_lecturers');
    }
}
