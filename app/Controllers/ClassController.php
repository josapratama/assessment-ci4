<?php

namespace App\Controllers;

use App\Models\ClassModel;
use App\Models\ClassStudentModel;
use App\Models\StudentModel;
use Dompdf\Dompdf;

class ClassController extends BaseController
{
    public function index()
    {
        $classModel = new ClassModel();
        $data = [
            'title' => 'List Data Kelas',
            'classes' => $classModel->findAll()
        ];
        return view('class/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Buat Data Kelas',
        ];
        return view('class/create', $data);
    }

    public function store()
    {
        $classModel = new ClassModel();

        $validationRules = [
            'class_code' => 'required',
            'class_name' => 'required',
            'semester' => 'required',
            'generation' => 'required',
        ];

        if ($this->request->getMethod() == 'POST') {
            if (!$this->validate($validationRules)) {
                return redirect()->to('/kelas/create')->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = [
                'class_code' => $this->request->getPost('class_code'),
                'class_name' => $this->request->getPost('class_name'),
                'semester' => $this->request->getPost('semester'),
                'generation' => $this->request->getPost('generation'),
            ];

            $classModel->save($data);
            session()->setFlashdata('message', 'Data kelas berhasil disimpan.');

            return redirect()->to('/kelas');
        }
    }

    public function edit($id)
    {
        $classModel = new ClassModel();
        $class = $classModel->find($id);

        $data = [
            'title' => 'Edit Data Gedung',
            'class' => $class
        ];
        return view('class/edit', $data);
    }

    public function update($id)
    {
        $classModel = new ClassModel();
        $class = $classModel->find($id);

        $validationRules = [
            'class_code' => 'required',
            'class_name' => 'required',
            'semester' => 'required',
            'generation' => 'required',
        ];

        if ($this->request->getMethod() == 'POST') {

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = [
                'class_code' => $this->request->getVar('class_code'),
                'class_name' => $this->request->getVar('class_name'),
                'semester' => $this->request->getVar('semester'),
                'generation' => $this->request->getVar('generation'),
            ];

            if ($classModel->update($id, $data)) {
                session()->setFlashdata('message', 'Data kelas berhasil diperbarui.');
                return redirect()->to('/kelas');
            } else {
                session()->setFlashdata('error', 'Gagal menyimpan data kelas.');
                return redirect()->back();
            }

            $data = [
                'title' => 'Edit Data Fakultas',
                'class' => $class
            ];
            return view('class/edit', $data);
        }
    }

    public function delete($id)
    {
        $classModel = new ClassModel();
        $class = $classModel->find($id);

        if ($class) {
            $classModel->delete($id);
            session()->setFlashdata('message', 'Data kelas berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data kelas tidak ditemukan.');
        }

        return redirect()->to('/kelas');
    }

    public function printpdf()
    {
        $classModel = new ClassModel();
        $data = [
            'classes' => $classModel->findAll()
        ];
        $html = view('building/lap_kelas', $data);
        $filename = date('y-m-d-H-i-s') . '-qadr-labs-report';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('building/lap_kelas'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('lap kelas.pdf', array(
        "Attachment" => false
        ));
    }

    public function view($id)
    {
        $classModel = new ClassModel();
        $class = $classModel->find($id);

        if (!$class) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data kelas dengan ID ' . $id . ' tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Data kelas',
            'class' => $class
        ];

        return view('class/view', $data);
    }

    public function addStudentForm($classId, $studentId = null)
    {
        $classModel = new ClassModel();
        $class = $classModel->find($classId);

        $studentModel = new StudentModel();
        $students = $studentModel->where('study_program', $class['study_program'])->findAll();

        $data = [
            'title' => 'Tambah Siswa ke Kelas',
            'classId' => $classId,
            'studentId' => $studentId, // Menyertakan $studentId dalam data
            'students' => $students
        ];
        return view('class/add_student', $data);
    }

    public function addStudentToClass($studentId, $classId)
    {
        // Instance model
        $classStudentModel = new ClassStudentModel();
        $classModel = new ClassModel();

        // Cari kelas berdasarkan ID
        $class = $classModel->find($classId);

        // Pastikan kelas ada
        if (!$class) {
            // Jika kelas tidak ditemukan, beri pesan error dan redirect
            session()->setFlashdata('error', 'Kelas tidak ditemukan.');
            return redirect()->to('/kelas');
        }

        // Cek apakah siswa sudah terdaftar di kelas tersebut
        $existingRecord = $classStudentModel->where('student_id', $studentId)
                                             ->where('class_id', $classId)
                                             ->first();

        if ($existingRecord) {
            // Jika siswa sudah terdaftar di kelas tersebut, beri pesan error dan redirect
            session()->setFlashdata('error', 'Siswa sudah terdaftar di kelas tersebut.');
            return redirect()->to('/kelas');
        }

        // Tambahkan siswa ke dalam kelas
        if ($classStudentModel->addStudentToClass($studentId, $classId)) {
            // Jika berhasil menambahkan siswa, beri pesan sukses dan redirect
            session()->setFlashdata('message', 'Siswa berhasil ditambahkan ke dalam kelas.');
            return redirect()->to('/kelas');
        } else {
            // Jika gagal menambahkan siswa, beri pesan error dan redirect
            session()->setFlashdata('error', 'Gagal menambahkan siswa ke dalam kelas.');
            return redirect()->to('/kelas');
        }
    }
}
