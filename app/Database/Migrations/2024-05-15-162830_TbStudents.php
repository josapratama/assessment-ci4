<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbStudents extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'student_id'      => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nim' => [
                'type'           => 'INT',
                'constraint'     => 20,
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'faculty' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'study_program' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'photo' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'home_address' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
        ]);
        $this->forge->addPrimaryKey('student_id');
        $this->forge->createTable('tb_students');
    }

    public function down()
    {
        $this->forge->dropTable('tb_students');
    }
}
