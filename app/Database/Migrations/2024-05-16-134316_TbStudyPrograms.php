<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbStudyPrograms extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'study_program_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'faculty_code' => [
                'type' => 'INT',
                'constraint' => 15,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'study_program_code' => [
                'type' => 'INT',
                'constraint' => 15,
            ],
            'level' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);
        $this->forge->addPrimaryKey('study_program_id');
        $this->forge->createTable('tb_study_programs');
    }

    public function down()
    {
        $this->forge->dropTable('tb_study_programs');
    }
}
