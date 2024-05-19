<?php

namespace App\Models;

use CodeIgniter\Model;

class FacultyModel extends Model
{
    protected $table      = 'tb_facultys';
    protected $primaryKey = 'faculty_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['faculty_id', 'name', 'faculty_code'];
}
