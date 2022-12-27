<?php

namespace App\Controllers;

class Pengguna extends BaseController
{
    public $title = 'Pengguna';
    public $url = 'pengguna';

    public function index()
    {
        $data['title'] = $this->title;
        $data['url'] = $this->url;
        $data['page'] = 'Data ' . $this->title;
        $PenggunaModel = new \App\Models\PenggunaModel();
        $data['getData'] = $PenggunaModel->orderBy('updated_at', 'DESC')
            ->findAll();
        return view('Pengguna/IndexView', $data);
    }

    public function form($id = '')
    {
        $PenggunaModel = new \App\Models\PenggunaModel();
        $data['title'] = $this->title;
        $data['url'] = $this->url;
        if ($id != '') {
            $getData = $PenggunaModel->asArray()->find($id);
        } else {
            $getData = null;
        }
        $data['getData'] = $getData;
        $data['page'] = 'Form ' . $this->title;
        return view('Pengguna/FormView', $data);
    }

    public function save()
    {
        $PenggunaModel = new \App\Models\PenggunaModel();
        $data = $this->request->getPost();

        $file = $this->request->getFile('file');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/pengguna', $newName);
            $data['pengguna_foto'] = $newName;
        } 

        if($this->request->getPost('pengguna_password')!='')
        {
            $data['pengguna_password'] = password_hash($this->request->getPost('pengguna_password'),PASSWORD_DEFAULT);
        }
        else {
            unset($data['pengguna_password']);
        }


        $save = $PenggunaModel->save($data);
        if ($save) {
            session()->setFlashData(['info' => 'success', 'message' => 'Sukses disimpan']);
            return redirect()->to($this->url);
        } else {
            session()->setFlashdata('hasForm', $this->request->getPost());
            session()->setFlashdata('validation', $PenggunaModel->errors());
            return redirect()->to($this->url . '/form/' . $this->request->getPost('id'));
        }
    }

    public function delete($id = '')
    {
        $PenggunaModel = new \App\Models\PenggunaModel();
        $PenggunaModel->delete($id);
        session()->setFlashData(['info' => 'success', 'message' => 'Sukses dihapus']);
        return redirect()->to($this->url);
    }

    public function checkusername($pengguna_username,$id='')
    {
        $PenggunaModel = new \App\Models\PenggunaModel();
        $checkUser = $PenggunaModel->where('pengguna_username',$pengguna_username);
        if($id!='')
        {
            $checkUser->where('id!=',$id);
        }

        if($checkUser->first()==null)
        {
            $status = true;
        }
        else {
            $status = false;
        }
        return $this->response->setJson(['status'=>$status]);
    }
}
