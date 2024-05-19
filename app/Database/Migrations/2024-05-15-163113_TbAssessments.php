<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbAssessments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'assessment_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'lecturer_id' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'course_id' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'student_id' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'absence_attendance' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'task' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'quiz' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'midterm_exam' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'final_exam' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'number_assessments' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'average_value' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'letter_grade' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
        ]);
        $this->forge->addPrimaryKey('assessment_id');
        $this->forge->createTable('tb_assessments');
    }

    public function down()
    {
        $this->forge->dropTable('tb_assessments');
    }
}
