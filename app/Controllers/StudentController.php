<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\FacultyModel;
use App\Models\StudyProgramModel;
use Dompdf\Dompdf;

class StudentController extends BaseController
{
    public function index()
    {
        $studentModel = new StudentModel();
        $data = [
            'title' => 'List Data Mahasiswa',
            'students' => $studentModel->findAll()
        ];
        return view('student/index', $data);
    }

    public function create()
    {
        $facultyModel = new FacultyModel();
        $studyProgramModel = new StudyProgramModel();

        $data = [
            'title' => 'Buat Data Mahasiswa',
            'facultys' => $facultyModel->findAll(),
            'studyPrograms' => $studyProgramModel->findAll()
        ];
        return view('student/create', $data);
    }

    public function store()
    {
        $studentModel = new StudentModel();

        $validationRules = [
            'nim' => 'required|numeric',
            'photo' => 'uploaded[photo]|max_size[photo,1024]|is_image[photo]',
            'name' => 'required',
            'faculty' => 'required',
            'study_program' => 'required',
            'home_address' => 'required'
        ];

        if ($this->request->getMethod() == 'POST') {
            if (!$this->validate($validationRules)) {
                return redirect()->to('/mahasiswa/create')->withInput()->with('errors', $this->validator->getErrors());
            }

            $photo = $this->request->getFile('photo');
            $photoName = $photo->getRandomName();
            $photo->move(ROOTPATH . 'public/uploads/students/', $photoName);

            $data = [
                'nim' => $this->request->getPost('nim'),
                'photo' => $photoName,
                'name' => $this->request->getPost('name'),
                'faculty' => $this->request->getPost('faculty'),
                'study_program' => $this->request->getPost('study_program'),
                'home_address' => $this->request->getPost('home_address'),
            ];

            $studentModel->save($data);
            session()->setFlashdata('message', 'Data mahasiswa berhasil disimpan.');

            return redirect()->to('/mahasiswa');
        }
    }

    public function edit($id)
    {
        $facultyModel = new FacultyModel();
        $studyProgramModel = new StudyProgramModel();
        $studentModel = new StudentModel();
        $student = $studentModel->find($id);

        $data = [
            'title' => 'Edit Data Mahasiswa',
            'student' => $student,
            'facultys' => $facultyModel->findAll(),
            'studyPrograms' => $studyProgramModel->findAll()
        ];
        return view('student/edit', $data);
    }

    public function update($id)
    {
        $studentModel = new StudentModel();
        $student = $studentModel->find($id);

        $validationRules = [
            'nim' => 'required|numeric',
            'name' => 'required',
            'faculty' => 'required',
            'study_program' => 'required',
            'home_address' => 'required'
        ];

        if ($this->request->getMethod() == 'POST') {

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $photo = $this->request->getFile('photo');
            $data = [
                'nim' => $this->request->getVar('nim'),
                'name' => $this->request->getVar('name'),
                'faculty' => $this->request->getVar('faculty'),
                'study_program' => $this->request->getVar('study_program'),
                'home_address' => $this->request->getVar('home_address'),
            ];

            if ($photo && $photo->isValid() && !$photo->hasMoved()) {
                if (file_exists(ROOTPATH . 'public/uploads/students/' . $student['photo'])) {
                    unlink(ROOTPATH . 'public/uploads/students/' . $student['photo']);
                }
                $photoName = $photo->getRandomName();
                $photo->move(ROOTPATH . 'public/uploads/students/', $photoName);
                $data['photo'] = $photoName;
            }

            if ($studentModel->update($id, $data)) {
                session()->setFlashdata('message', 'Data mahasiswa berhasil diperbarui.');
                return redirect()->to('/mahasiswa');
            } else {
                session()->setFlashdata('error', 'Gagal menyimpan data mahasiswa.');
                return redirect()->back();
            }

            $data = [
                'title' => 'Edit Data Mahasiswa',
                'student' => $student
            ];
            return view('student/edit', $data);
        }
    }

    public function delete($id)
    {
        $studentModel = new StudentModel();
        $student = $studentModel->find($id);

        if ($student) {
            $studentModel->delete($id);
            session()->setFlashdata('message', 'Data mahasiswa berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data mahasiswa tidak ditemukan.');
        }

        return redirect()->to('/mahasiswa');
    }

    public function printpdf()
    {
        $studentModel = new StudentModel();
        $data = [
            'students' => $studentModel->findAll()
        ];
        $html = view('student/lap_student', $data);
        $filename = date('y-m-d-H-i-s') . '-qadr-labs-report';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('student/lap_student'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('lap mahasiswa.pdf', array(
        "Attachment" => false
        ));
    }

    public function view($id)
    {
        $studentModel = new StudentModel();
        $student = $studentModel->find($id);

        if (!$student) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data mahasiswa dengan ID ' . $id . ' tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Data Mahasiswa',
            'student' => $student
        ];

        return view('student/view', $data);
    }
}
