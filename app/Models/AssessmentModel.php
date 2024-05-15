<?php

namespace App\Models;

use CodeIgniter\Model;

class AssessmentModel extends Model
{
    protected $table      = 'tb_assessments';
    protected $primaryKey = 'assessment_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['student_id', 'course_id', 'absence_attendance', 'task', 'quiz', 'midterm_exam', 'final_exam', 'number_assessments', 'average_value', 'letter_grade'];
}
