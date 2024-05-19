<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassStudentModel extends Model
{
    protected $table      = 'tb_class_students';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['student_id', 'class_id'];

    // Tambahkan method lain jika diperlukan, seperti method untuk menambahkan siswa ke dalam kelas, dll.

    /**
     * Method untuk menambahkan siswa ke dalam kelas.
     *
     * @param int $studentId
     * @param int $classId
     * @return bool
     */
    public function addStudentToClass($studentId, $classId)
    {
        // Cek apakah siswa sudah terdaftar di kelas tersebut
        $existingRecord = $this->where('student_id', $studentId)
                               ->where('class_id', $classId)
                               ->first();

        if ($existingRecord) {
            return false; // Siswa sudah terdaftar di kelas tersebut
        }

        // Tambahkan siswa ke dalam kelas
        $data = [
            'student_id' => $studentId,
            'class_id'   => $classId,
        ];

        return $this->insert($data);
    }
}
