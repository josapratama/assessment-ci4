<?php

namespace App\Controllers;

use App\Models\RoomModel;
use App\Models\BuildingModel;
use Dompdf\Dompdf;

class RoomController extends BaseController
{
    public function index()
    {
        $roomModel = new RoomModel();
        $data = [
            'title' => 'List Data Ruangan',
            'rooms' => $roomModel->findAll()
        ];
        return view('room/index', $data);
    }

    public function create()
    {
        $buildingModel = new BuildingModel();
        $data = [
            'title' => 'Buat Data Ruangan',
            'buildings' => $buildingModel->findAll()
        ];
        return view('room/create', $data);
    }

    public function store()
    {
        $facultyModel = new RoomModel();

        $validationRules = [
            'room_code' => 'required',
            'room_name' => 'required',
            'room_floor' => 'required',
            'building_code' => 'required',
            'room_capacity' => 'required',
        ];

        if ($this->request->getMethod() == 'POST') {
            if (!$this->validate($validationRules)) {
                return redirect()->to('/ruang/create')->withInput()->with('errors', $this->validator->getErrors());
            }


            $data = [
                'room_code' => $this->request->getPost('room_code'),
                'room_name' => $this->request->getPost('room_name'),
                'room_floor' => $this->request->getPost('room_floor'),
                'building_code' => $this->request->getPost('building_code'),
                'room_capacity' => $this->request->getPost('room_capacity'),
            ];

            $facultyModel->save($data);
            session()->setFlashdata('message', 'Data Ruangan berhasil disimpan.');

            return redirect()->to('/ruang');
        }
    }

    public function edit($id)
    {
        $buildingModel = new BuildingModel();
        $roomModel = new RoomModel();
        $room = $roomModel->find($id);

        $data = [
            'title' => 'Edit Data Fakultas',
            'room' => $room,
            'buildings' => $buildingModel->findAll()
        ];
        return view('room/edit', $data);
    }

    public function update($id)
    {
        $roomModel = new RoomModel();
        $room = $roomModel->find($id);

        $validationRules = [
            'room_code' => 'required',
            'room_name' => 'required',
            'room_floor' => 'required',
            'building_code' => 'required',
            'room_capacity' => 'required',
        ];

        if ($this->request->getMethod() == 'POST') {

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = [
                'room_code' => $this->request->getVar('room_code'),
                'room_name' => $this->request->getVar('room_name'),
                'room_floor' => $this->request->getVar('room_floor'),
                'building_code' => $this->request->getVar('building_code'),
                'room_capacity' => $this->request->getVar('room_capacity'),
            ];

            if ($roomModel->update($id, $data)) {
                session()->setFlashdata('message', 'Data ruang berhasil diperbarui.');
                return redirect()->to('/ruang');
            } else {
                session()->setFlashdata('error', 'Gagal menyimpan data ruang.');
                return redirect()->back();
            }

            $data = [
                'title' => 'Edit Data Ruang',
                'room' => $room
            ];
            return view('room/edit', $data);
        }
    }

    public function delete($id)
    {
        $roomModel = new RoomModel();
        $room = $roomModel->find($id);

        if ($room) {
            $roomModel->delete($id);
            session()->setFlashdata('message', 'Data ruangan berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data ruangan tidak ditemukan.');
        }

        return redirect()->to('/ruang');
    }

    public function printpdf()
    {
        $facultyModel = new RoomModel();
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
        $roomModel = new RoomModel();
        $room = $roomModel->find($id);

        if (!$room) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data fakultas dengan ID ' . $id . ' tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Data Fakultas',
            'room' => $room
        ];

        return view('room/view', $data);
    }
}
