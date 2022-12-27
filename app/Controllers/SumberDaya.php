<?php

namespace App\Controllers;

use App\Models\SumberDayaModel;

class SumberDaya extends BaseController
{
    public function index()
    {
        $SumberDayaModel = new SumberDayaModel();
        $sumber = $SumberDayaModel->findAll();
        $data = [
            'title' => "Data Sumber Daya Mineral",
            'appname' => "UAS SIG",
            'heading' => "Data Sumber Daya Mineral",
            'sumber' => $sumber,
        ];
        return view('v_datasumber', $data);
    }
    public function create()
    {
        $data = [
            'title' => "Data Sumber Daya Mineral",
            'appname' => "UAS SIG",
            'heading' => "Data Sumber Daya Mineral",
            'title' => 'Tambah Data Sumber Daya',
            'validation' => \Config\Services::validation(),
        ];
        return view('v_createsumber', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'jenis_mineral' => 'required|string',
            'kualitas' => 'required',
            'ketersediaan' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',

        ])) {
            return redirect()->to('/create');
        }
        $SumberDayaModel = new SumberDayaModel();
        $data = [
            'jenis_mineral' => $this->request->getPost('jenis_mineral'),
            'kualitas' => $this->request->getPost('kualitas'),
            'ketersediaan' => $this->request->getPost('ketersediaan'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
        ];
        $SumberDayaModel->save($data);
        session()->setFlashdata('pesan', 'Data Potensial Berhasil Di Simpan.');
        return redirect()->to('/sumberdaya');
    }

    // public function hapus($id)
    // {
    //     // $Tambang = $this->PotensialModel->find($id);
    //     // if ($Tambang['foto_lokasi'] == "default.png") {
    //     //     $this->PotensialModel->delete($id);
    //     // } else {
    //     // unlink('img/potensial/' . $Tambang['foto_lokasi']);
    //     $this->PotensialModel->delete($id);


    //     session()->setFlashdata('pesan', 'Data Pertambangan Berhasil DiHapus');
    //     return redirect()->to('/sumberdaya/index');
    // }
}
