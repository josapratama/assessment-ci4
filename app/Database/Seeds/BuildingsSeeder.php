<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BuildingsSeeder extends Seeder
{
    public function run()
    {
        // $faker = \Faker\Factory::create();

        // $data = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $data[] = [
        //         'building_code' => $faker->unique()->numberBetween(100000000000000, 999999999999999),
        //         'building_name' => $faker->unique()->word . ' Building',
        //         'total_floor'   => $faker->numberBetween(1, 10),
        //         'total_room'    => $faker->numberBetween(5, 50),
        //     ];
        // }

        $data = [
            [
                'building_code' => 1001,
                'building_name' => 'Ilmu Komputer',
                'total_floor' => 5,
                'total_room' => 50,
            ],
            [
                'building_code' => 1002,
                'building_name' => 'Kedokteran',
                'total_floor' => 4,
                'total_room' => 40,
            ],
            [
                'building_code' => 1003,
                'building_name' => 'Ekonomi',
                'total_floor' => 6,
                'total_room' => 60,
            ],
            [
                'building_code' => 1004,
                'building_name' => 'Teknik',
                'total_floor' => 3,
                'total_room' => 30,
            ],
            [
                'building_code' => 1005,
                'building_name' => 'FKIP',
                'total_floor' => 2,
                'total_room' => 20,
            ],
        ];


        $this->db->table('tb_buildings')->insertBatch($data);
    }
}
