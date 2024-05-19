<?php

namespace App\Controllers;

use App\Models\BuildingModel;
use App\Models\RoomModel;
use App\Models\FacultyModel;
use App\Models\StudyProgramModel;
use App\Models\StudentModel;
use App\Models\LecturerModel;
use App\Models\CourseModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $buildingModels = new BuildingModel();
        $buildingCount = $buildingModels->countAll();
        $roomModels = new RoomModel();
        $roomCount = $roomModels->countAll();
        $facultyModels = new FacultyModel();
        $facultyCount = $facultyModels->countAll();
        $studyProgramModels = new StudyProgramModel();
        $studyProgramCount = $studyProgramModels->countAll();
        $studentModels = new StudentModel();
        $studentCount = $studentModels->countAll();
        $lecturerModels = new LecturerModel();
        $lecturerCount = $lecturerModels->countAll();
        $courseModels = new CourseModel();
        $courseCount = $courseModels->countAll();

        $data = [
            'title' => 'Dashboard',
            'buildings' => $buildingCount,
            'rooms' => $roomCount,
            'facultys' => $facultyCount,
            'studyPrograms' => $studyProgramCount,
            'students' => $studentCount,
            'lecturers' => $lecturerCount,
            'courses' => $courseCount,
        ];
        return view('dashboard/index', $data);
    }
}
