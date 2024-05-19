<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbClasses extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'class_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => false,
                'auto_increment' => true,
            ],
            'class_code' => [
                'type' => 'INT',
                'constraint' => 15,
            ],
            'class_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'study_program' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'semester' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'generation' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
        ]);
        $this->forge->addPrimaryKey('class_id');
        $this->forge->createTable('tb_classes');
    }

    public function down()
    {
        $this->forge->dropTable('tb_classes');
    }
}
