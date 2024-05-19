<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CoursesSeeder extends Seeder
{
    public function run()
    {
        // $faker = \Faker\Factory::create();

        // $data = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $data[] = [
        //         'lecturer_id'          => $faker->numberBetween(1, 10),
        //         'course_code'          => $faker->numberBetween(1000, 9999),
        //         'name'                 => $faker->sentence(3),
        //         'semester_credit_unit' => $faker->numberBetween(1, 4),
        //         'semester'             => $faker->numberBetween(1, 8),
        //     ];
        // }

        $data = [
            [
                'lecturer_id' => 1,
                'course_code' => 1001,
                'name' => 'Introduction to Programming',
                'semester_credit_unit' => 3,
                'semester' => 1,
            ],
            [
                'lecturer_id' => 2,
                'course_code' => 2001,
                'name' => 'Database Management Systems',
                'semester_credit_unit' => 3,
                'semester' => 2,
            ],
            [
                'lecturer_id' => 3,
                'course_code' => 3001,
                'name' => 'Web Development',
                'semester_credit_unit' => 3,
                'semester' => 3,
            ],
            [
                'lecturer_id' => 4,
                'course_code' => 4001,
                'name' => 'Data Structures and Algorithms',
                'semester_credit_unit' => 3,
                'semester' => 4,
            ],
            [
                'lecturer_id' => 5,
                'course_code' => 5001,
                'name' => 'Software Engineering',
                'semester_credit_unit' => 3,
                'semester' => 5,
            ],
        ];

        $this->db->table('tb_courses')->insertBatch($data);
    }
}
