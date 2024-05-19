<?php

namespace App\Controllers;

use App\Models\FacultyModel;
use Dompdf\Dompdf;

class FacultyController extends BaseController
{
    public function index()
    {
        $facultyModel = new FacultyModel();
        $data = [
            'title' => 'List Data Fakultas',
            'facultys' => $facultyModel->findAll()
        ];
        return view('faculty/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Buat Data Fakultas',
        ];
        return view('faculty/create', $data);
    }

    public function store()
    {
        $facultyModel = new FacultyModel();

        $validationRules = [
            'name' => 'required',
            'faculty_code' => 'required',
        ];

        if ($this->request->getMethod() == 'POST') {
            if (!$this->validate($validationRules)) {
                return redirect()->to('/fakultas/create')->withInput()->with('errors', $this->validator->getErrors());
            }


            $data = [
                'name' => $this->request->getPost('name'),
                'faculty_code' => $this->request->getPost('faculty_code'),
            ];

            $facultyModel->save($data);
            session()->setFlashdata('message', 'Data Fakultas berhasil disimpan.');

            return redirect()->to('/fakultas');
        }
    }

    public function edit($id)
    {
        $facultyModel = new FacultyModel();
        $faculty = $facultyModel->find($id);

        $data = [
            'title' => 'Edit Data Fakultas',
            'faculty' => $faculty
        ];
        return view('faculty/edit', $data);
    }

    public function update($id)
    {
        $facultyModel = new FacultyModel();
        $faculty = $facultyModel->find($id);

        $validationRules = [
            'name' => 'required',
            'faculty_code' => 'required',
        ];

        if ($this->request->getMethod() == 'POST') {

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = [
                'name' => $this->request->getVar('name'),
                'faculty_code' => $this->request->getVar('faculty_code'),
            ];

            if ($facultyModel->update($id, $data)) {
                session()->setFlashdata('message', 'Data fakultas berhasil diperbarui.');
                return redirect()->to('/fakultas');
            } else {
                session()->setFlashdata('error', 'Gagal menyimpan data fakultas.');
                return redirect()->back();
            }

            $data = [
                'title' => 'Edit Data Fakultas',
                'faculty' => $faculty
            ];
            return view('faculty/edit', $data);
        }
    }

    public function delete($id)
    {
        $facultyModel = new FacultyModel();
        $faculty = $facultyModel->find($id);

        if ($faculty) {
            $facultyModel->delete($id);
            session()->setFlashdata('message', 'Data fakultas berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data fakultas tidak ditemukan.');
        }

        return redirect()->to('/fakultas');
    }

    public function printpdf()
    {
        $facultyModel = new FacultyModel();
        $data = [
            'facultys' => $facultyModel->findAll()
        ];
        $html = view('faculty/lap_faculty', $data);
        $filename = date('y-m-d-H-i-s') . '-qadr-labs-report';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('faculty/lap_faculty'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('lap fakultas.pdf', array(
        "Attachment" => false
        ));
    }

    public function view($id)
    {
        $facultyModel = new FacultyModel();
        $faculty = $facultyModel->find($id);

        if (!$faculty) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data fakultas dengan ID ' . $id . ' tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Data Fakultas',
            'faculty' => $faculty
        ];

        return view('faculty/view', $data);
    }
}
