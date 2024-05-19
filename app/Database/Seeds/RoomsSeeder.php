<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoomsSeeder extends Seeder
{
    public function run()
    {
        // $faker = \Faker\Factory::create();

        // $data = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $data[] = [
        //         'room_code'     => $faker->unique()->numberBetween(100000000000000, 999999999999999),
        //         'room_name'     => $faker->word . ' Room',
        //         'room_floor'    => $faker->numberBetween(1, 10),
        //         'building_code' => $faker->unique()->lexify('Building-???'),
        //         'room_capacity' => $faker->numberBetween(10, 100),
        //     ];
        // }

        $data = [
            [
                'room_code' => 101,
                'room_name' => 'Room 101',
                'room_floor' => 1,
                'building_code' => 'BLD001',
                'room_capacity' => 30,
            ],
            [
                'room_code' => 201,
                'room_name' => 'Room 201',
                'room_floor' => 2,
                'building_code' => 'BLD002',
                'room_capacity' => 25,
            ],
            [
                'room_code' => 301,
                'room_name' => 'Room 301',
                'room_floor' => 3,
                'building_code' => 'BLD003',
                'room_capacity' => 40,
            ],
            [
                'room_code' => 401,
                'room_name' => 'Room 401',
                'room_floor' => 4,
                'building_code' => 'BLD004',
                'room_capacity' => 35,
            ],
            [
                'room_code' => 501,
                'room_name' => 'Room 501',
                'room_floor' => 5,
                'building_code' => 'BLD005',
                'room_capacity' => 20,
            ],
        ];

        $this->db->table('tb_rooms')->insertBatch($data);
    }
}
