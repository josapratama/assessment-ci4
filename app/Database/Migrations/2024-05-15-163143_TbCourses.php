<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'course_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'lecturer_id' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'course_code' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'semester_credit_unit' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'semester' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
        ]);
        $this->forge->addPrimaryKey('course_id');
        $this->forge->createTable('tb_courses');
    }

    public function down()
    {
        $this->forge->dropTable('tb_courses');
    }
}
