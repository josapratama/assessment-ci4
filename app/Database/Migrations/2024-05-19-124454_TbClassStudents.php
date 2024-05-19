<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbClassStudents extends Migration
{
    public function up()
    {
        // $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'student_id' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'class_id' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('student_id', 'tb_students', 'student_id');
        $this->forge->addForeignKey('class_id', 'tb_classes', 'class_id');
        $this->forge->createTable('tb_class_students');

        // $this->db->enpableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('tb_class_students');
    }
}
