<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\LecturerModel;
use Dompdf\Dompdf;

class CourseController extends BaseController
{
    public function index()
    {
        $courseModel = new CourseModel();
        $courses = $courseModel
            ->select('tb_courses.*, tb_lecturers.name as lecturer_name')
            ->join('tb_lecturers', 'tb_lecturers.nidn = tb_courses.lecturer_id', 'left')
            ->findAll();

        $data = [
            'title' => 'List Data Mata Kuliah',
            'courses' => $courses
        ];

        return view('course/index', $data);
    }

    public function create()
    {
        $lecturers = new LecturerModel();

        $data = [
            'title' => 'Buat Data Mata Kuliah',
            'lecturers' =>  $lecturers->findAll()
        ];
        return view('course/create', $data);
    }

    public function store()
    {
        $courseModel = new CourseModel();

        $validationRules = [
            'lecturer_id' => 'required|numeric',
            'course_code' => 'required',
            'name' => 'required',
            'semester_credit_unit' => 'required',
            'semester' => 'required'
        ];
        if ($this->request->getMethod() == 'POST') {
            if (!$this->validate($validationRules)) {
                return redirect()->to('/makul/create')->withInput()->with('errors', $this->validator->getErrors());
            }
            $data = [
                'lecturer_id' => $this->request->getPost('lecturer_id'),
                'course_code' => $this->request->getPost('course_code'),
                'name' => $this->request->getPost('name'),
                'semester_credit_unit' => $this->request->getPost('semester_credit_unit'),
                'semester' => $this->request->getPost('semester'),
            ];

            $courseModel->save($data);
            session()->setFlashdata('message', 'Data mata kuliah berhasil disimpan.');

            return redirect()->to('/makul');
        }
    }

    public function edit($id)
    {
        $lecturers = new LecturerModel();
        $courseModel = new CourseModel();
        $course = $courseModel->find($id);

        $data = [
            'title' => 'Edit Data Mahasiswa',
            'course' => $course,
            'lecturers' =>  $lecturers->findAll()
        ];
        return view('course/edit', $data);
    }

    public function update($id)
    {
        $courseModel = new CourseModel();
        $course = $courseModel->find($id);

        $validationRules = [
            'lecturer_id' => 'required|numeric',
            'course_code' => 'required',
            'name' => 'required',
            'semester_credit_unit' => 'required',
            'semester' => 'required'
        ];
        if ($this->request->getMethod() == 'POST') {

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = [
                'lecturer_id' => $this->request->getVar('lecturer_id'),
                'course_code' => $this->request->getVar('course_code'),
                'name' => $this->request->getVar('name'),
                'semester_credit_unit' => $this->request->getVar('semester_credit_unit'),
                'semester' => $this->request->getVar('semester'),
            ];

            if ($courseModel->update($id, $data)) {
                session()->setFlashdata('message', 'Data makul berhasil diperbarui.');
                return redirect()->to('/makul');
            } else {
                session()->setFlashdata('error', 'Gagal menyimpan data makul.');
                return redirect()->back();
            }

            $data = [
                'title' => 'Edit Data Mata Kuliah',
                'course' => $course,
            ];
            return view('course/edit', $data);
        }
    }

    public function delete($id)
    {
        $courseModel = new CourseModel();
        $course = $courseModel->find($id);

        if ($course) {
            $courseModel->delete($id);
            session()->setFlashdata('message', 'Data makul berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data makul tidak ditemukan.');
        }

        return redirect()->to('/makul');
    }

    public function printpdf()
    {
        $courseModel = new CourseModel();
        $courses = $courseModel
            ->select('tb_courses.*, tb_lecturers.name as lecturer_name')
            ->join('tb_lecturers', 'tb_lecturers.nidn = tb_courses.lecturer_id', 'left')
            ->findAll();

        $data = [
            'courses' => $courses,
        ];
        $html = view('course/lap_course', $data);
        $filename = date('y-m-d-H-i-s') . '-qadr-labs-report';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('course/lap_course'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('lap dosen.pdf', array(
        "Attachment" => false
        ));
    }

    public function view($id)
    {
        $courseModel = new CourseModel();
        $course = $courseModel
            ->select('tb_courses.*, tb_lecturers.name as lecturer_name')
            ->join('tb_lecturers', 'tb_lecturers.nidn = tb_courses.lecturer_id', 'left')
            ->find($id);

        // $courseModel = new CourseModel();
        // $course = $courseModel->find($id);

        if (!$course) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data mata kuliah dengan ID ' . $id . ' tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Data Dosen',
            'course' => $course
        ];

        return view('course/view', $data);
    }
}
