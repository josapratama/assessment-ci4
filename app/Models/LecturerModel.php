<?php

namespace App\Models;

use CodeIgniter\Model;

class LecturerModel extends Model
{
    protected $table      = 'tb_lecturers';
    protected $primaryKey = 'lecturer_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['nidn', 'photo', 'name', 'home_address'];
}
