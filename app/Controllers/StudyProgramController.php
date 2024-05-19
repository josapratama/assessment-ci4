<?php

namespace App\Controllers;

use App\Models\StudyProgramModel;
use App\Models\FacultyModel;
use Dompdf\Dompdf;

class StudyProgramController extends BaseController
{
    public function index()
    {
        $studyProgramModel = new StudyProgramModel();
        $studyPrograms = $studyProgramModel
            ->select('tb_study_programs.*, tb_facultys.name as faculty_name')
            ->join('tb_facultys', 'tb_facultys.faculty_code = tb_study_programs.faculty_code', 'left')
            ->findAll();
        $data = [
            'title' => 'List Data Program Studi',
            'studyPrograms' => $studyPrograms
        ];
        return view('study-program/index', $data);
    }

    public function create()
    {
        $facultys = new FacultyModel();

        $data = [
            'title' => 'Buat Data Program Studi',
            'facultys' =>  $facultys->findAll()
        ];
        return view('study-program/create', $data);
    }

    public function store()
    {
        $studyProgramModel = new StudyProgramModel();

        $validationRules = [
            'name' => 'required',
            'faculty_code' => 'required',
            'study_program_code' => 'required',
            'level' => 'required',
        ];

        if ($this->request->getMethod() == 'POST') {
            if (!$this->validate($validationRules)) {
                return redirect()->to('/prodi/create')->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = [
                'name' => $this->request->getPost('name'),
                'faculty_code' => $this->request->getPost('faculty_code'),
                'study_program_code' => $this->request->getPost('study_program_code'),
                'level' => $this->request->getPost('level'),
            ];

            $studyProgramModel->save($data);
            session()->setFlashdata('message', 'Data Fakultas berhasil disimpan.');

            return redirect()->to('/prodi');
        }
    }

    public function edit($id)
    {
        $facultys = new FacultyModel();
        $studyProgramModel = new StudyProgramModel();
        $studyProgram = $studyProgramModel->find($id);

        $data = [
            'title' => 'Edit Data Fakultas',
            'studyProgram' => $studyProgram,
            'facultys' =>  $facultys->findAll()
        ];
        return view('study-program/edit', $data);
    }

    public function update($id)
    {
        $StudyProgramModel = new StudyProgramModel();
        $studyProgram = $StudyProgramModel->find($id);

        $validationRules = [
            'name' => 'required',
            'faculty_code' => 'required',
            'study_program_code' => 'required',
            'level' => 'required',
        ];

        if ($this->request->getMethod() == 'POST') {

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = [
                'name' => $this->request->getVar('name'),
                'faculty_code' => $this->request->getVar('faculty_code'),
                'study_program_code' => $this->request->getVar('study_program_code'),
                'level' => $this->request->getVar('level'),
            ];

            if ($StudyProgramModel->update($id, $data)) {
                session()->setFlashdata('message', 'Data fakultas berhasil diperbarui.');
                return redirect()->to('/prodi');
            } else {
                session()->setFlashdata('error', 'Gagal menyimpan data fakultas.');
                return redirect()->back();
            }

            $data = [
                'title' => 'Edit Data Program Studi',
                'studyProgram' => $studyProgram
            ];
            return view('study-program/edit', $data);
        }
    }

    public function delete($id)
    {
        $studyProgramModel = new StudyProgramModel();
        $studyProgram = $studyProgramModel->find($id);

        if ($studyProgram) {
            $studyProgramModel->delete($id);
            session()->setFlashdata('message', 'Data Program Studi berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data Program Studi tidak ditemukan.');
        }

        return redirect()->to('/prodi');
    }

    public function printpdf()
    {
        $studyProgramModel = new StudyProgramModel();
        $studyPrograms = $studyProgramModel
            ->select('tb_study_programs.*, tb_facultys.name as faculty_name')
            ->join('tb_facultys', 'tb_facultys.faculty_code = tb_study_programs.faculty_code', 'left')
            ->findAll();
        $data = [
            'studyProgram' => $studyPrograms
        ];
        $html = view('study-program/lap_study_program', $data);
        $filename = date('y-m-d-H-i-s') . '-qadr-labs-report';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('study-program/lap_study_program'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('lap prodi.pdf', array(
        "Attachment" => false
        ));
    }

    public function view($id)
    {
        $studyProgramModel = new StudyProgramModel();
        $studyProgram = $studyProgramModel
            ->select('tb_study_programs.*, tb_facultys.name as faculty_name')
            ->join('tb_facultys', 'tb_facultys.faculty_code = tb_study_programs.faculty_code', 'left')
            ->find($id);

        if (!$studyProgram) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data fakultas dengan ID ' . $id . ' tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Data Program Studi',
            'studyProgram' => $studyProgram
        ];

        return view('study-program/view', $data);
    }
}
