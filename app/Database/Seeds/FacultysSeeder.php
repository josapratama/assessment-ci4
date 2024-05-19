<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FacultysSeeder extends Seeder
{
    public function run()
    {
        // $faker = \Faker\Factory::create();

        // $data = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $data[] = [
        //         'name'         => $faker->unique()->sentence(2),
        //         'faculty_code' => $faker->unique()->numberBetween(100000000000000, 999999999999999),
        //     ];
        // }

        $data = [
            [
                'name' => 'Ilmu Komputer',
                'faculty_code' => 10001,
            ],
            [
                'name' => 'Ekonomi',
                'faculty_code' => 10002,
            ],
            [
                'name' => 'Teknik',
                'faculty_code' => 10003,
            ],
            [
                'name' => 'Kedokteran',
                'faculty_code' => 10004,
            ],
            [
                'name' => 'FKIP',
                'faculty_code' => 10005,
            ],
        ];


        $this->db->table('tb_facultys')->insertBatch($data);
    }
}
