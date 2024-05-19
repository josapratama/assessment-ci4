<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbFacultys extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'faculty_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'faculty_code' => [
                'type' => 'INT',
                'constraint' => 15,
            ],
        ]);
        $this->forge->addPrimaryKey('faculty_id');
        $this->forge->createTable('tb_facultys');
    }

    public function down()
    {
        $this->forge->dropTable('tb_facultys');
    }
}
