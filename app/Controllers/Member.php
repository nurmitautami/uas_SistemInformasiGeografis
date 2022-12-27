<?php

namespace App\Controllers;

class Member extends BaseController
{
    public $title = 'Member';
    public $url = 'member';

    public function index()
    {
        $data['title'] = $this->title;
        $data['url'] = $this->url;
        $data['page'] = 'Data ' . $this->title;
        $MemberModel = new \App\Models\MemberModel();
        $data['getData'] = $MemberModel->orderBy('updated_at', 'DESC')
                                    ->withJoin()
                                    ->findAll();
        return view('Member/IndexView', $data);
    }

    public function setstatus($penggunaId='',$status='N')
    {
        $PenggunaModel = new \App\Models\PenggunaModel();
        $PenggunaModel->save([
            'id' => $penggunaId,
            'pengguna_status' => $status,
        ]);

        session()->setFlashData(['info' => 'success', 'message' => 'Status akun telah diubah']);
        return redirect()->to($this->url);

    }

}
