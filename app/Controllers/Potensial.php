<?php

namespace App\Controllers;

use App\Models\PotensialModel;

class Potensial extends BaseController
{

    public function index()
    {
        $PotensialModel = new PotensialModel();
        $potensial = $PotensialModel->findAll();
        $data = [
            'title' => "Data Pertambangan dan Aktivitas Manusia",
            'appname' => "UAS SIG",
            'heading' => "Data Pertambangan dan Aktivitas Manusia",
            'potensial' => $potensial,
        ];
        return view('v_datapotensial', $data);
    }
    public function create()
    {
        $data = [
            'title' => "Data Pertambangan dan Aktivitas Manusia",
            'appname' => "UAS SIG",
            'heading' => "Data Pertambangan dan Aktivitas Manusia",
            'validation' => \Config\Services::validation(),
        ];
        return view('v_createpotensial', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'foto_lokasi ' => 'max_size[foto_lokasi,5000]|is_image[foto_lokasi]|mime_in[foto_lokasi,image/jpg,image/jpeg,image/png]',
            'kondisi_lahan' => 'required|string',
            'akses' => 'required',
            'jenis_aktivitas' => 'required',
            'intensitas' => 'required',
            'dampak' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'checkbox' => 'required',

        ])) {
            return redirect()->to('/create');
        }

        $FileFoto = $this->request->getFile('foto_lokasi');
        if ($FileFoto == "") {
            $NamaFile = "default.png";
        } else {
            $NamaFile = $FileFoto->getRandomName();
            $FileFoto->move('img/potensial', $NamaFile);
        }

        $potensialModel = new PotensialModel();
        $data = [
            'foto_lokasi' => $NamaFile,
            'kondisi_lahan' => $this->request->getPost('kondisi_lahan'),
            'akses' => $this->request->getPost('akses'),
            'jenis_aktivitas' => $this->request->getPost('jenis_aktivitas'),
            'intensitas' => $this->request->getPost('intensitas'),
            'dampak' => $this->request->getPost('dampak'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
        ];
        $potensialModel->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Simpan.');
        return redirect()->to('/potensial');
    }

    // public function hapus($id)
    // {
    //     $Tambang = $this->PotensialModel->find($id);
    //     if ($Tambang['foto_lokasi'] == "default.png") {
    //         $this->PotensialModel->delete($id);
    //     } else {
    //         // unlink('img/potensial/' . $Tambang['foto_lokasi']);
    //         $this->PotensialModel->delete($id);
    //     }

    //     session()->setFlashdata('pesan', 'Data Pertambangan Berhasil DiHapus');
    //     return redirect()->to('/potensial/index');
    // }
}
