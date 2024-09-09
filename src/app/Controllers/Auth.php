<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{

    public function index()
    {
        $session = session();
        if ($session->get('role')) {
            return redirect()->to('Dashboard');
        }
        return view('Dashboard/login');
    }

    public function loginUser()
    {
        $session = session();
        $model = new \App\Models\UserModel();
        $validation = \Config\Services::validation();

        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong!'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong!'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Username atau Password tidak boleh kosong!');
        } else {
            $find = $model->where('username', $this->request->getPost('username'))->first();

            if (!$find) {
                return redirect()->back()->with('error', 'Username atau Password salah!');
            }

            if (!hash_equals($find->password, md5($this->request->getPost('password')))) {
                return redirect()->back()->with('error', 'Username atau Password salah!');
            }

            $data = [
                'nama' => $find->nama,
                'id_user' => $find->id,
                'username' => $find->username,
                'role'     => $find->role,
            ];

            $session->set($data);

            return redirect()->to('Dashboard');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
