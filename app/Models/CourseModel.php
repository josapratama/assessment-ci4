<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table      = 'tb_courses';
    protected $primaryKey = 'course_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['lecturer_id', 'name', 'course_code', 'semester_credit_unit', 'semester'];

    // public function lecturer()
    // {
    //     return $this->belongsTo('App\Models\LecturerModel', 'lecturer_id', 'lecturer_id');
    // }
}
