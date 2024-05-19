<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $table      = 'tb_classes';
    protected $primaryKey = 'class_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['class_id', 'class_code', 'class_name', 'study_program', 'semester', 'generation'];
}
