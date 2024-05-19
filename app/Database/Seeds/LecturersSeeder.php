<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use GuzzleHttp\Client;

class LecturersSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $client = new Client();

        // $data = [];
        // for ($i = 0; $i < 5; $i++) {
        //     $nidn = $this->generateUUID();

        //     $imageUrl = $faker->imageUrl(640, 480, 'people');
        //     $imagePath = $this->downloadImage($client, $imageUrl);

        //     $data[] = [
        //         'nidn'          => $nidn,
        //         'name'          => $faker->name,
        //         'photo'         => $imagePath,
        //         'home_address'  => $faker->address,
        //     ];
        // }

        $imageUrl = $faker->imageUrl(640, 480, 'people');
        $imagePath = $this->downloadImage($client, $imageUrl);

        $data = [
            [
                'nidn' => 1234567890,
                'name' => 'John Doe',
                'photo' => $imagePath,
                'home_address' => '123 Main Street',
            ],
            [
                'nidn' => 2345678901,
                'name' => 'Jane Smith',
                'photo' => $imagePath,
                'home_address' => '456 Elm Street',
            ],
            [
                'nidn' => 3456789012,
                'name' => 'David Johnson',
                'photo' => $imagePath,
                'home_address' => '789 Oak Street',
            ],
            [
                'nidn' => 4567890123,
                'name' => 'Emily Brown',
                'photo' => $imagePath,
                'home_address' => '1011 Pine Street',
            ],
            [
                'nidn' => 5678901234,
                'name' => 'Michael Wilson',
                'photo' => $imagePath,
                'home_address' => '1213 Cedar Street',
            ],
        ];

        $this->db->table('tb_lecturers')->insertBatch($data);
    }

    private function downloadImage($client, $url)
    {
        $response = $client->get($url);
        $imageName = uniqid() . '.jpg';
        $imagePath = FCPATH . 'uploads/lecturers/' . $imageName;
        file_put_contents($imagePath, $response->getBody());
        return $imageName;
    }

    // private function generateUUID()
    // {
    //     return \Ramsey\Uuid\Uuid::uuid4()->toString();
    // }
}
