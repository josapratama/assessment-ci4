<?php

namespace App\Controllers;

use App\Models\BuildingModel;
use Dompdf\Dompdf;

class BuildingController extends BaseController
{
    public function index()
    {
        $buildingModel = new BuildingModel();
        $data = [
            'title' => 'List Data Gedung',
            'buildings' => $buildingModel->findAll()
        ];
        return view('building/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Buat Data Gedung',
        ];
        return view('building/create', $data);
    }

    public function store()
    {
        $buildingModel = new BuildingModel();

        $validationRules = [
            'building_code' => 'required',
            'building_name' => 'required',
            'total_floor' => 'required',
            'total_room' => 'required',
        ];

        if ($this->request->getMethod() == 'POST') {
            if (!$this->validate($validationRules)) {
                return redirect()->to('/gedung/create')->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = [
                'building_code' => $this->request->getPost('building_code'),
                'building_name' => $this->request->getPost('building_name'),
                'total_floor' => $this->request->getPost('total_floor'),
                'total_room' => $this->request->getPost('total_room'),
            ];

            $buildingModel->save($data);
            session()->setFlashdata('message', 'Data Gedung berhasil disimpan.');

            return redirect()->to('/gedung');
        }
    }

    public function edit($id)
    {
        $buildingModel = new BuildingModel();
        $building = $buildingModel->find($id);

        $data = [
            'title' => 'Edit Data Gedung',
            'building' => $building
        ];
        return view('building/edit', $data);
    }

    public function update($id)
    {
        $buildingModel = new BuildingModel();
        $building = $buildingModel->find($id);

        $validationRules = [
            'building_code' => 'required',
            'building_name' => 'required',
            'total_floor' => 'required',
            'total_room' => 'required',
        ];

        if ($this->request->getMethod() == 'POST') {

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = [
                'building_code' => $this->request->getVar('building_code'),
                'building_name' => $this->request->getVar('building_name'),
                'total_floor' => $this->request->getVar('total_floor'),
                'total_room' => $this->request->getVar('total_room'),
            ];

            if ($buildingModel->update($id, $data)) {
                session()->setFlashdata('message', 'Data gedung berhasil diperbarui.');
                return redirect()->to('/gedung');
            } else {
                session()->setFlashdata('error', 'Gagal menyimpan data gedung.');
                return redirect()->back();
            }

            $data = [
                'title' => 'Edit Data Fakultas',
                'building' => $building
            ];
            return view('building/edit', $data);
        }
    }

    public function delete($id)
    {
        $buildingModel = new BuildingModel();
        $building = $buildingModel->find($id);

        if ($building) {
            $buildingModel->delete($id);
            session()->setFlashdata('message', 'Data fakultas berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data fakultas tidak ditemukan.');
        }

        return redirect()->to('/gedung');
    }

    public function printpdf()
    {
        $buildingModel = new BuildingModel();
        $data = [
            'buildings' => $buildingModel->findAll()
        ];
        $html = view('building/lap_building', $data);
        $filename = date('y-m-d-H-i-s') . '-qadr-labs-report';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('building/lap_building'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('lap gedung.pdf', array(
        "Attachment" => false
        ));
    }

    public function view($id)
    {
        $buildingModel = new BuildingModel();
        $building = $buildingModel->find($id);

        if (!$building) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data fakultas dengan ID ' . $id . ' tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Data Fakultas',
            'building' => $building
        ];

        return view('building/view', $data);
    }
}
