<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Auth extends ResourceController
{
    protected $format    = 'json';
    protected $helpers = ['nhashing'];

    public function index()
    {
        $PenggunaModel = new \App\Models\PenggunaModel();
        $pengguna_username = $this->request->getPost('username');
        $pengguna_password = $this->request->getPost('password');
        $getPengguna = $PenggunaModel->where('pengguna_username', $pengguna_username)
                                    ->where('pengguna_level','Member')
                                    ->first();
        if ($getPengguna != null) {
            if (password_verify($pengguna_password, $getPengguna->pengguna_password)) {
                if ($getPengguna->pengguna_status == 'A') {
                    $response = [
                        'status' => 200,
                        'error' => false,
                        'message' => 'Sukses login',
                        'tokenUn' => enchash($getPengguna->pengguna_username),
                        'tokenPw' => enchash($getPengguna->pengguna_password)
                    ];
                } else {
                    $response = [
                        'status' => 200,
                        'error' => true,
                        'message' => 'Akun telah dinonaktifkan, hubungi admin',
                        'token' =>null
                    ];
                }
            } else {
                $response = [
                    'status' => 200,
                    'error' => true,
                    'message' => 'Username atau password salah',
                    'token' => null
                ];
            }
        } else {
            $response = [
                'status' => 200,
                'error' => true,
                'message' => 'Username atau password salah',
                'token' => null
            ];
        }
        return $this->respond($response,$response['status']);
    }


    public function check()
    {
        $username = isset($_SERVER['PHP_AUTH_USER'])? dechash($_SERVER['PHP_AUTH_USER']): '';
        $password = isset($_SERVER['PHP_AUTH_PW']) ? dechash($_SERVER['PHP_AUTH_PW']) : '';
        $PenggunaModel = new \App\Models\PenggunaModel();
        $getPengguna = $PenggunaModel->where('pengguna_username', $username)
                                ->where('pengguna_password',$password)
                                ->first();
        if($getPengguna!=NULL)
        {
            $response = [
                'status' => 200,
                'error' => true,
                'message' => 'Authorize!',
            ];
        }
        else {

            $response = [
                'status' => 401,
                'error' => true,
                'message' => 'Unauthorize',
            ];
        }
        return $this->respond($response, $response['status']);

    }

    // ...
}
