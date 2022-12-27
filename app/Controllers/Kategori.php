<?php

namespace App\Controllers;

class Kategori extends BaseController
{
    public $title = 'Kategori';
    public $url = 'kategori';

    public function index()
    {
        $data['title'] = $this->title;
        $data['url'] = $this->url;
        $data['page'] = 'Data '.$this->title;
        $KategoriModel = new \App\Models\KategoriModel();
        $data['getData'] = $KategoriModel->orderBy('updated_at','DESC')
                                        ->findAll();
        return view('Kategori/IndexView', $data);
    }

    public function form($id='')
    {
        $KategoriModel = new \App\Models\KategoriModel();
        $data['title'] = $this->title;
        $data['url'] = $this->url;
        if($id!='')
        {
            $getData = $KategoriModel->asArray()->find($id);
        }
        else {
            $getData = null;
        }
        $data['getData'] = $getData;
        $data['page'] = 'Form ' . $this->title;
        return view('Kategori/FormView', $data);
    }

    public function save()
    {
        $KategoriModel = new \App\Models\KategoriModel();
        $save = $KategoriModel->save($this->request->getPost());
        if($save)
        {
            session()->setFlashData(['info' => 'success', 'message' => 'Sukses disimpan']);
            return redirect()->to($this->url);
        }
        else {
            session()->setFlashdata('hasForm', $this->request->getPost());
            session()->setFlashdata('validation', $KategoriModel->errors());
            return redirect()->to($this->url.'/form/'.$this->request->getPost('id'));
        }
    }

    public function delete($id='')
    {
        $KategoriModel = new \App\Models\KategoriModel();
        $KategoriModel->delete($id);
        session()->setFlashData(['info'=>'success','message'=>'Sukses dihapus']);
        return redirect()->to($this->url);
    }
    
}
