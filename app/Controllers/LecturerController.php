<?php

namespace App\Controllers;

use App\Models\LecturerModel;
use Dompdf\Dompdf;

class LecturerController extends BaseController
{
    public function index()
    {
        $lecturerModel = new LecturerModel();
        $data = [
            'title' => 'List Data Dosen',
            'lecturers' => $lecturerModel->findAll()
        ];
        return view('lecturer/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Buat Data Dosen',
        ];
        return view('lecturer/create', $data);
    }

    public function store()
    {
        $lecturerModel = new LecturerModel();

        $validationRules = [
            'nidn' => 'required|numeric',
            'photo' => 'uploaded[photo]|max_size[photo,1024]|is_image[photo]',
            'name' => 'required',
            'home_address' => 'required'
        ];

        if ($this->request->getMethod() == 'POST') {

            if (!$this->validate($validationRules)) {
                return redirect()->to('/dosen/create')->withInput()->with('errors', $this->validator->getErrors());
            }

            $photo = $this->request->getFile('photo');
            $photoName = $photo->getRandomName();
            $photo->move(ROOTPATH . 'public/uploads/lecturers', $photoName);

            $data = [
                'nidn' => $this->request->getPost('nidn'),
                'photo' => $photoName,
                'name' => $this->request->getPost('name'),
                'home_address' => $this->request->getPost('home_address'),
            ];

            $lecturerModel->save($data);
            session()->setFlashdata('message', 'Data dosen berhasil disimpan.');

            return redirect()->to('/dosen');
        }
    }

    public function edit($id)
    {
        $lecturerModel = new LecturerModel();
        $lecturer = $lecturerModel->find($id);

        $data = [
            'title' => 'Edit Data Mahasiswa',
            'lecturer' => $lecturer
        ];
        return view('lecturer/edit', $data);
    }

    public function update($id)
    {
        $lecturerModel = new LecturerModel();
        $lecturer = $lecturerModel->find($id);

        $validationRules = [
            'nidn' => 'required|numeric',
            'name' => 'required',
            'home_address' => 'required'
        ];
        if ($this->request->getMethod() == 'POST') {
            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $photo = $this->request->getFile('photo');
            $data = [
                'nidn' => $this->request->getVar('nidn'),
                'name' => $this->request->getVar('name'),
                'home_address' => $this->request->getVar('home_address'),
            ];

            if ($photo && $photo->isValid() && !$photo->hasMoved()) {
                if (file_exists(ROOTPATH . 'public/uploads/lecturers' . $lecturer['photo'])) {
                    unlink(ROOTPATH . 'public/uploads/lecturers' . $lecturer['photo']);
                }
                $photoName = $photo->getRandomName();
                $photo->move(ROOTPATH . 'public/uploads/lecturers', $photoName);
                $data['photo'] = $photoName;
            }

            if ($lecturerModel->update($id, $data)) {
                session()->setFlashdata('message', 'Data dosen berhasil diperbarui.');
                return redirect()->to('/dosen');
            } else {
                session()->setFlashdata('error', 'Gagal menyimpan data dosen.');
                return redirect()->back();
            }

            $data = [
                'title' => 'Edit Data Mahasiswa',
                'lecturer' => $lecturer
            ];
            return view('lecturer/edit', $data);
        }
    }

    public function delete($id)
    {
        $lecturerModel = new LecturerModel();
        $lecturer = $lecturerModel->find($id);

        if ($lecturer) {
            $lecturerModel->delete($id);
            session()->setFlashdata('message', 'Data dosen berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data dosen tidak ditemukan.');
        }

        return redirect()->to('/dosen');
    }

    public function printpdf()
    {
        $lecturerModel = new LecturerModel();
        $data = [
            'lecturers' => $lecturerModel->findAll()
        ];
        $html = view('lecturer/lap_lecturer', $data);
        $filename = date('y-m-d-H-i-s') . '-qadr-labs-report';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('lecturer/lap_lecturer'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('lap dosen.pdf', array(
        "Attachment" => false
        ));
    }

    public function view($id)
    {
        $lecturerModel = new LecturerModel();
        $lecturer = $lecturerModel->find($id);

        if (!$lecturer) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data dosen dengan ID ' . $id . ' tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Data Dosen',
            'lecturer' => $lecturer
        ];

        return view('lecturer/view', $data);
    }
}
