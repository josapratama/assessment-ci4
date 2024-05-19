<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClassesSeeder extends Seeder
{
    public function run()
    {
        // $faker = \Faker\Factory::create();

        // $data = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $data[] = [
        //         'class_code' => $faker->unique()->numberBetween(100000000000000, 999999999999999),
        //         'class_name' => $faker->unique()->sentence(3),
        //         'semester'   => $faker->numberBetween(1, 10),
        //         'generation' => $faker->numberBetween(2010, 2024),
        //     ];
        // }

        $data = [
            [
                'class_code' => 1001,
                'class_name' => 'Introduction to Programming',
                'study_program' => 'Informatika',
                'semester' => 1,
                'generation' => 2022,
            ],
            [
                'class_code' => 1002,
                'class_name' => 'Database Management Systems',
                'study_program' => 'Informatika',
                'semester' => 2,
                'generation' => 2022,
            ],
            [
                'class_code' => 1003,
                'class_name' => 'Web Development',
                'study_program' => 'Informatika',
                'semester' => 1,
                'generation' => 2023,
            ],
            [
                'class_code' => 1004,
                'class_name' => 'Computer Networks',
                'study_program' => 'Informatika',
                'semester' => 2,
                'generation' => 2023,
            ],
            [
                'class_code' => 1005,
                'class_name' => 'Software Engineering',
                'study_program' => 'Informatika',
                'semester' => 1,
                'generation' => 2024,
            ],
        ];

        $this->db->table('tb_classes')->insertBatch($data);
    }
}
