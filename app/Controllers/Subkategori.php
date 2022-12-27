<?php

namespace App\Controllers;

class Subkategori extends BaseController
{
    public $title = 'Sub Kategori';
    public $url = 'subkategori';

    public function index()
    {

        $data['title'] = $this->title;
        $data['url'] = $this->url;
        $data['page'] = 'Data '.$this->title;
        $SubkategoriModel = new \App\Models\SubkategoriModel();
        $data['getData'] = $SubkategoriModel->orderBy('subkategori.updated_at','DESC')
                                     ->withJoin()
                                        ->findAll();
        return view('Subkategori/IndexView', $data);
    }

    public function form($id='')
    {
        $SubkategoriModel = new \App\Models\SubkategoriModel();
        $data['title'] = $this->title;
        $data['url'] = $this->url;
        if($id!='')
        {
            $getData = $SubkategoriModel->asArray()->find($id);
        }
        else {
            $getData = null;
        }
        $data['getData'] = $getData;
        $data['page'] = 'Form ' . $this->title;
        return view('Subkategori/FormView', $data);
    }

    public function save()
    {
        $SubkategoriModel = new \App\Models\SubkategoriModel();
        $data = $this->request->getPost();
        
        $file = $this->request->getFile('file');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH.'uploads/subkategori', $newName);
            $data['subkategori_ikon'] = $newName;
        } 
        $save = $SubkategoriModel->save($data);
        if($save)
        {
            session()->setFlashData(['info' => 'success', 'message' => 'Sukses disimpan']);
            return redirect()->to($this->url);
        }
        else {
            session()->setFlashdata('hasForm', $this->request->getPost());
            session()->setFlashdata('validation', $SubkategoriModel->errors());
            return redirect()->to($this->url.'/form/'.$this->request->getPost('id'));
        }
    }

    public function delete($id='')
    {
        $SubkategoriModel = new \App\Models\SubkategoriModel();
        $SubkategoriModel->delete($id);
        session()->setFlashData(['info'=>'success','message'=>'Sukses dihapus']);
        return redirect()->to($this->url);
    }
    
}
