<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StudyProgramsSeeder extends Seeder
{
    public function run()
    {
        // $faker = \Faker\Factory::create();

        // $data = [];
        // $levels = ['Undergraduate', 'Master', 'Doctorate'];

        // $facultyCount = $this->db->table('tb_facultys')->countAllResults();
        // if ($facultyCount > 0) {
        //     for ($i = 0; $i < $facultyCount; $i++) {
               
        //         $studyProgramCount = $faker->numberBetween(1, 5);

        //         for ($j = 0; $j < $studyProgramCount; $j++) {
        //             $data[] = [
        //                 'faculty_code'         => $faker->unique()->numberBetween(100000000000000, 999999999999999),
        //                 'name'                 => $faker->unique()->sentence(3),
        //                 'study_program_code'   => $faker->unique()->numberBetween(100000000000000, 999999999999999),
        //                 'level'                => $faker->randomElement($levels),
        //             ];
        //         }
        //     }
        $data = [
            [
                'faculty_code' => 12345,
                'name' => 'Computer Science',
                'study_program_code' => 101,
                'level' => 'Undergraduate',
            ],
            [
                'faculty_code' => 23456,
                'name' => 'Electrical Engineering',
                'study_program_code' => 102,
                'level' => 'Undergraduate',
            ],
            [
                'faculty_code' => 34567,
                'name' => 'English Literature',
                'study_program_code' => 103,
                'level' => 'Undergraduate',
            ],
            [
                'faculty_code' => 45678,
                'name' => 'Business Administration',
                'study_program_code' => 104,
                'level' => 'Undergraduate',
            ],
            [
                'faculty_code' => 56789,
                'name' => 'Medicine',
                'study_program_code' => 105,
                'level' => 'Undergraduate',
            ],
        ];

            $this->db->table('tb_study_programs')->insertBatch($data);
        // }
    }
}
