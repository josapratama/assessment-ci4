<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // $faker = \Faker\Factory::create();

        // $data = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $data[] = [
        //         'full_name'      => $faker->name,
        //         'username'       => $faker->unique()->userName,
        //         'email_address'  => $faker->unique()->safeEmail,
        //         'phone_number'   => $faker->numerify('###########'),
        //         'password'       => password_hash($faker->password, PASSWORD_DEFAULT),
        //         'retype_password'=> password_hash($faker->password, PASSWORD_DEFAULT),
        //     ];
        // }

        $data = [
            [
                'full_name' => 'a',
                'username' => 'a',
                'email_address' => 'a@gmail.com',
                'phone_number' => '1234567890',
                'password' => password_hash('12345678', PASSWORD_DEFAULT),
                'retype_password' => password_hash('12345678', PASSWORD_DEFAULT),
            ],
            [
                'full_name' => 'Jane Doe',
                'username' => 'janedoe',
                'email_address' => 'janedoe@example.com',
                'phone_number' => '9876543210',
                'password' => password_hash('password456', PASSWORD_DEFAULT),
                'retype_password' => password_hash('password456', PASSWORD_DEFAULT),
            ],
            [
                'full_name' => 'Alice Smith',
                'username' => 'alicesmith',
                'email_address' => 'alice@example.com',
                'phone_number' => '4561237890',
                'password' => password_hash('password789', PASSWORD_DEFAULT),
                'retype_password' => password_hash('password789', PASSWORD_DEFAULT),
            ],
            [
                'full_name' => 'Bob Johnson',
                'username' => 'bobjohnson',
                'email_address' => 'bob@example.com',
                'phone_number' => '7894561230',
                'password' => password_hash('passwordabc', PASSWORD_DEFAULT),
                'retype_password' => password_hash('passwordabc', PASSWORD_DEFAULT),
            ],
            [
                'full_name' => 'Eve Wilson',
                'username' => 'evewilson',
                'email_address' => 'eve@example.com',
                'phone_number' => '3216549870',
                'password' => password_hash('passwordefg', PASSWORD_DEFAULT),
                'retype_password' => password_hash('passwordefg', PASSWORD_DEFAULT),
            ],
        ];

        $this->db->table('tb_users')->insertBatch($data);
    }
}
