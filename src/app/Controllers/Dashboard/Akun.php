<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class Akun extends BaseController
{
    public function index()
    {
        return view('Dashboard/SKPD');
    }

    public function addSKPD()
    {
        $model = new \App\Models\UserModel();
        $validation = \Config\Services::validation();

        $this->validate([
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
            'conf_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi Password tidak boleh kosong!',
                    'matches[password]' => 'Konfirmasi Password tidak boleh berbeda!',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong!'
                ]
            ],
        ]);

        if (
            $validation->run() == FALSE
        ) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => md5($this->request->getPost('password')),
                'role' => 'SKPD',
                'nama' => $this->request->getPost('nama'),
            ];
            $query = $model->insert($data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil menambah data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal menambah data!']);
            }
        }
    }

    public function getSKPD()
    {
        $model = new \App\Models\UserModel();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null]);
        }
    }

    public function updateSKPD()
    {
        $model = new \App\Models\UserModel();
        $validation = \Config\Services::validation();
        $id = $this->request->getPost('id_edit');

        $this->validate([
            'username_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong!'
                ]
            ],
            'password_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong!'
                ]
            ],
            'conf_password_edit' => [
                'rules' => 'required|matches[password_edit]',
                'errors' => [
                    'required' => 'Konfirmasi Password tidak boleh kosong!',
                    'matches[password_edit]' => 'Konfirmasi Password tidak boleh berbeda!'
                ]
            ],
            'nama_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong!'
                ]
            ],
        ]);

        if (
            $validation->run() == FALSE
        ) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'username' => $this->request->getPost('username_edit'),
                'password' => md5($this->request->getPost('password_edit')),
                'nama' => $this->request->getPost('nama_edit'),
            ];
            $query = $model->update($id, $data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil mengupdate data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal mengupdate data!']);
            }
        }
    }

    public function deleteSKPD()
    {
        $model = new \App\Models\UserModel();
        $id = $this->request->getPost('id');
        $query = $model->delete($id);

        if ($query) {
            echo json_encode(['code' => 1, 'msg' => 'Data berhasil dihapus!']);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data gagal dihapus!']);
        }
    }

    public function datatableSKPD()
    {
        $db = db_connect();
        $builder = $db->table('tb_akun')->select('id, username, nama');

        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->addNumbering('no')
            ->toJson();
    }
}
