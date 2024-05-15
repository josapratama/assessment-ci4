<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table      = 'tb_students';
    protected $primaryKey = 'student_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['nim', 'name', 'faculty', 'study_program', 'photo', 'home_address'];
}
