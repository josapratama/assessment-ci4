<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // $this->call('AssessmentsSeeder');
        $this->call('StudentsSeeder');
        $this->call('LecturersSeeder');
        $this->call('BuildingsSeeder');
        $this->call('FacultysSeeder');
        $this->call('CoursesSeeder');
        $this->call('ClassesSeeder');
        $this->call('RoomsSeeder');
        $this->call('StudyProgramsSeeder');
        $this->call('UsersSeeder');
    }
}
