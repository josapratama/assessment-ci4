<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AssessmentsSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $absence_attendance = $faker->numberBetween(0, 100);
            $task = $faker->numberBetween(0, 100);
            $quiz = $faker->numberBetween(0, 100);
            $midterm_exam = $faker->numberBetween(0, 100);
            $final_exam = $faker->numberBetween(0, 100);
            $number_assessments = 5;
            $average_value = ($absence_attendance + $task + $quiz + $midterm_exam + $final_exam) / $number_assessments;
            $letter_grade = $this->calculateLetterGrade($average_value);

            $data[] = [
                'lecturer_id'        => $faker->numberBetween(1, 10),
                'course_id'          => $faker->numberBetween(1, 10),
                'student_id'         => $faker->numberBetween(1, 50),
                'absence_attendance' => $absence_attendance,
                'task'               => $task,
                'quiz'               => $quiz,
                'midterm_exam'       => $midterm_exam,
                'final_exam'         => $final_exam,
                'number_assessments' => $number_assessments,
                'average_value'      => $average_value,
                'letter_grade'       => $letter_grade,
            ];
        }

        $this->db->table('tb_assessments')->insertBatch($data);
    }

    private function calculateLetterGrade($average_value)
    {
        if ($average_value >= 90) {
            return 'A';
        } elseif ($average_value >= 80) {
            return 'B';
        } elseif ($average_value >= 70) {
            return 'C';
        } elseif ($average_value >= 60) {
            return 'D';
        } else {
            return 'F';
        }
    }
}
