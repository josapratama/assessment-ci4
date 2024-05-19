<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use GuzzleHttp\Client;

class StudentsSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $client = new Client();

        // $usedNim = [];

        // $data = [];
        // for ($i = 0; $i < 10; $i++) {
        //     do {
        //         $nim = $faker->unique()->numberBetween(1000000000, 9999999999);
        //     } while (in_array($nim, $usedNim) || $nim < 0);

        //     $usedNim[] = $nim;

        //     $imageUrl = $faker->imageUrl(640, 480, 'people');
        //     $imagePath = $this->downloadImage($client, $imageUrl);

        //     $data[] = [
        //         'nim'           => $nim,
        //         'name'          => $faker->name,
        //         'faculty'       => $faker->word,
        //         'study_program' => $faker->word,
        //         'photo'         => $imagePath,
        //         'home_address'  => $faker->address,
        //     ];
        // }
        $imageUrl = $faker->imageUrl(640, 480, 'people');
        $imagePath = $this->downloadImage($client, $imageUrl);

        $data = [
            [
                'nim'           => 1234567890,
                'name'          => 'John Doe',
                'faculty'       => 'Faculty of Engineering',
                'study_program' => 'Computer Science',
                'photo'         => $imagePath,
                'home_address'  => '123 Main Street, Cityville',
            ],
            [
                'nim'           => 2345678901,
                'name'          => 'Jane Smith',
                'faculty'       => 'Faculty of Arts',
                'study_program' => 'English Literature',
                'photo'         => $imagePath,
                'home_address'  => '456 Elm Street, Townsville',
            ],
            [
                'nim'           => 3456789012,
                'name'          => 'Michael Johnson',
                'faculty'       => 'Faculty of Science',
                'study_program' => 'Biology',
                'photo'         => $imagePath,
                'home_address'  => '789 Oak Street, Villageton',
            ],
            [
                'nim'           => 4567890123,
                'name'          => 'Emily Brown',
                'faculty'       => 'Faculty of Business',
                'study_program' => 'Accounting',
                'photo'         => $imagePath,
                'home_address'  => '012 Pine Street, Hamletville',
            ],
            [
                'nim'           => 5678901234,
                'name'          => 'Christopher Wilson',
                'faculty'       => 'Faculty of Medicine',
                'study_program' => 'Pharmacy',
                'photo'         => $imagePath,
                'home_address'  => '345 Cedar Street, Villatown',
            ],
        ];

        $this->db->table('tb_students')->insertBatch($data);
    }

    private function downloadImage($client, $url)
    {
        $response = $client->get($url);
        $imageName = uniqid() . '.jpg';
        $imagePath = FCPATH . 'uploads/students/' . $imageName;
        file_put_contents($imagePath, $response->getBody());
        return $imageName;
    }
}
