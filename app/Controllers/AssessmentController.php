<?php

namespace App\Controllers;

use App\Models\AssessmentModel;
use App\Models\CourseModel;
use App\Models\StudentModel;

class AssessmentController extends BaseController
{
    public function index()
    {
        $assessmentModel = new AssessmentModel();
        $data = [
            'title' => 'List Data Penilaian',
            'assessment' => $assessmentModel->findAll()
        ];
        return view('assessment/index', $data);
    }

    public function create()
    {
        $students = new StudentModel();
        $courses = new CourseModel();

        $data = [
            'title' => 'Buat Data Penilaian',
            'courses' =>  $courses->findAll(),
            'students' =>  $students->findAll()
        ];
        return view('assessment/create', $data);
    }

    public function store()
    {
        $assessmentModel = new AssessmentModel();

        $validationRules = [
            'student_id' => 'required|numeric',
            'course_id' => 'required|numeric',
            'absence_attendance' => 'required',
            'task' => 'required',
            'quiz' => 'required',
            'midterm_exam' => 'required',
            'final_exam' => 'required',
        ];
        if ($this->request->getMethod() == 'POST') {
            if (!$this->validate($validationRules)) {
                return redirect()->to('/penilaian/create')->withInput()->with('errors', $this->validator->getErrors());
            }

            $absenceAttendance = $this->request->getPost('absence_attendance');
            $task = $this->request->getPost('task');
            $quiz = $this->request->getPost('quiz');
            $midtermExam = $this->request->getPost('midterm_exam');
            $finalExam = $this->request->getPost('final_exam');
            $numberAssessments = $absenceAttendance + $task + $quiz + $midtermExam + $finalExam;
            $averageValue = $numberAssessments / 5;
            $letterGrade = '';
            if ($averageValue > 85 && $averageValue <= 100) {
                $letterGrade = 'A';
            } elseif ($averageValue >= 75) {
                $letterGrade = 'B';
            } elseif ($averageValue >= 70) {
                $letterGrade = 'C';
            } elseif ($averageValue >= 60) {
                $letterGrade = 'D';
            } else {
                $letterGrade = 'E';
            }

            $data = [
                'student_id' => $this->request->getPost('student_id'),
                'course_id' => $this->request->getPost('course_id'),
                'absence_attendance' => $absenceAttendance,
                'task' => $task,
                'quiz' => $quiz,
                'midterm_exam' => $midtermExam,
                'final_exam' => $finalExam,
                'number_assessments' => $numberAssessments,
                'average_value' => $averageValue,
                'letter_grade' => $letterGrade
            ];

            $assessmentModel->save($data);
            session()->setFlashdata('message', 'Data penilaian berhasil disimpan.');

            return redirect()->to('/penilaian');
        }
    }

    public function edit($id)
    {
        $students = new StudentModel();
        $courses = new CourseModel();
        $assessmentModel = new AssessmentModel();
        $assessment = $assessmentModel->find($id);


        $data = [
            'title' => 'Edit Data Mahasiswa',
            'assessment' => $assessment,
            'students' =>  $students->findAll(),
            'courses' =>  $courses->findAll()
        ];
        return view('assessment/edit', $data);
    }

    public function update($id)
    {
        $assessmentModel = new AssessmentModel();
        $assessment = $assessmentModel->find($id);

        $validationRules = [
            'student_id' => 'required|numeric',
            'course_id' => 'required|numeric',
            'absence_attendance' => 'required',
            'task' => 'required',
            'quiz' => 'required',
            'midterm_exam' => 'required',
            'final_exam' => 'required',
        ];

        if ($this->request->getMethod() == 'POST') {
            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $absenceAttendance = $this->request->getPost('absence_attendance');
            $task = $this->request->getPost('task');
            $quiz = $this->request->getPost('quiz');
            $midtermExam = $this->request->getPost('midterm_exam');
            $finalExam = $this->request->getPost('final_exam');
            $numberAssessments = $absenceAttendance + $task + $quiz + $midtermExam + $finalExam;
            $averageValue = $numberAssessments / 5;
            $letterGrade = '';
            if ($averageValue > 85 && $averageValue <= 100) {
                $letterGrade = 'A';
            } elseif ($averageValue >= 75) {
                $letterGrade = 'B';
            } elseif ($averageValue >= 70) {
                $letterGrade = 'C';
            } elseif ($averageValue >= 60) {
                $letterGrade = 'D';
            } else {
                $letterGrade = 'E';
            }

            $data = [
                'student_id' => $this->request->getPost('student_id'),
                'course_id' => $this->request->getPost('course_id'),
                'absence_attendance' => $absenceAttendance,
                'task' => $task,
                'quiz' => $quiz,
                'midterm_exam' => $midtermExam,
                'final_exam' => $finalExam,
                'number_assessments' => $numberAssessments,
                'average_value' => $averageValue,
                'letter_grade' => $letterGrade
            ];

            if ($assessmentModel->update($id, $data)) {
                session()->setFlashdata('message', 'Data penilaian berhasil diperbarui.');
                return redirect()->to('/penilaian');
            } else {
                session()->setFlashdata('error', 'Gagal menyimpan data penilaian.');
                return redirect()->back();
            }

            $data = [
                'title' => 'Edit Data Penilaian',
                'assessment' => $assessment,
            ];
            return view('assessment/edit', $data);
        }
    }

    public function delete($id)
    {
        $assessmentModel = new AssessmentModel();
        $assessment = $assessmentModel->find($id);

        if ($assessment) {
            $assessmentModel->delete($id);
            session()->setFlashdata('message', 'Data penilaian berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data penilaian tidak ditemukan.');
        }

        return redirect()->to('/penilaian');
    }
}
