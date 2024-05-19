<?php

namespace App\Models;

use CodeIgniter\Model;

class StudyProgramModel extends Model
{
    protected $table      = 'tb_study_programs';
    protected $primaryKey = 'study_program_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['study_program_id', 'name', 'faculty_code', 'study_program_code', 'level'];
}
