<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        if (Auth() != false) {
            return redirect()->to('home');
        }
        $data['title'] = 'Dashboard';
        return view('Auth/IndexView', $data);
    }

    public function registrasi()
    {
        $data['title'] = 'Registrasi';
        return view('Auth/RegistrasiView', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth');
    }

    public function register()
    {
        $MemberModel = new \App\Models\MemberModel();
        $PenggunaModel = new \App\Models\PenggunaModel();

        $member_nama = $this->request->getPost('nama');
        $member_hp = $this->request->getPost('hp');
        $member_email = $this->request->getPost('email');
        $pengguna_username = $this->request->getPost('username');
        $pengguna_password = $this->request->getPost('password');

        $PenggunaModel->insert([
            'pengguna_username' => $pengguna_username,
            'pengguna_password' => password_hash($pengguna_password,PASSWORD_DEFAULT),
            'pengguna_nama' => $member_nama,
            'pengguna_status' => 'A',
            'pengguna_level' => 'Member',
        ]);

        $MemberModel->insert([
            'member_nama' => $member_nama,
            'member_email' => $member_email,
            'member_hp' => $member_hp,
            'pengguna_id' => $PenggunaModel->getInsertID()
        ]);

        session()->setFlashData(['info' => 'success', 'message' => 'Akun telah dibuat, silakan login']);
        return redirect()->to('auth');
    }

    public function login()
    {
        $PenggunaModel = new \App\Models\PenggunaModel();
        $pengguna_username = $this->request->getPost('username');
        $pengguna_password = $this->request->getPost('password');
        $getPengguna = $PenggunaModel->where('pengguna_username',$pengguna_username)->first();
        if($getPengguna!=null)
        {
            if(password_verify($pengguna_password, $getPengguna->pengguna_password))
            {
                if($getPengguna->pengguna_status=='A')
                {
                    session()->set('userId', $getPengguna->id);
                    return redirect()->to('home');
                }
                else {
                    session()->setFlashData(['info' => 'error', 'message' => 'Akun telah dinonaktifkan, hubungi admin']);
                }
            }
            else {
                session()->setFlashData(['info' => 'error', 'message' => 'Username atau password salah']);
            }

        }
        else {
            session()->setFlashData(['info' => 'error', 'message' => 'Username atau password salah']);
        }
        return redirect()->to('auth');
    }
}
