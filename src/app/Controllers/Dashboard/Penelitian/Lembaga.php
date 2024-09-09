<?php

namespace App\Controllers\Dashboard\Penelitian;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class Lembaga extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('role')) {
            return redirect()->to('login');
        }
        return view('Dashboard/Penelitian/lembaga');
    }

    public function addLembaga()
    {
        $model = new \App\Models\LembagaPenelitian();
        $validation = \Config\Services::validation();

        $this->validate([
            'nama_lembaga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lembaga tidak boleh kosong!'
                ]
            ],
            'email_lembaga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email Lembaga tidak boleh kosong!'
                ]
            ],
            'website_lembaga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Website Lembaga tidak boleh kosong!'
                ]
            ],
            'alamat_lembaga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Lembaga tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'nama_lembaga' => $this->request->getPost('nama_lembaga'),
                'email_lembaga' => $this->request->getPost('email_lembaga'),
                'website_lembaga' => $this->request->getPost('website_lembaga'),
                'alamat_lembaga' => $this->request->getPost('alamat_lembaga'),
            ];
            $query = $model->insert($data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil menambah data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal menambah data!']);
            }
        }
    }

    public function getLembaga()
    {
        $model = new \App\Models\LembagaPenelitian();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null]);
        }
    }

    public function getAllLembaga()
    {
        $model = new \App\Models\LembagaPenelitian();
        $data = $model->findAll();
        if ($data) {
            $lembaga = '<option value="">Pilih Lembaga</option>';
            foreach ($data as $v) {
                $lembaga .= '<option value="' . $v['id_lembaga_penelitian'] . '">' . $v['nama_lembaga'] . '</option>';
            }
            echo $lembaga;
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null]);
        }
    }

    public function updateLembaga()
    {
        $model = new \App\Models\LembagaPenelitian();
        $validation = \Config\Services::validation();
        $id = $this->request->getPost('id_edit');

        $this->validate([
            'nama_lembaga_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lembaga tidak boleh kosong!'
                ]
            ],
            'email_lembaga_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email Lembaga tidak boleh kosong!'
                ]
            ],
            'website_lembaga_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Website Lembaga tidak boleh kosong!'
                ]
            ],
            'alamat_lembaga_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Lembaga tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'nama_lembaga' => $this->request->getPost('nama_lembaga_edit'),
                'email_lembaga' => $this->request->getPost('email_lembaga_edit'),
                'website_lembaga' => $this->request->getPost('website_lembaga_edit'),
                'alamat_lembaga' => $this->request->getPost('alamat_lembaga_edit'),
            ];
            $query = $model->update($id, $data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil mengupdate data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal mengupdate data!']);
            }
        }
    }

    public function deleteLembaga()
    {
        $model = new \App\Models\LembagaPenelitian();
        $id = $this->request->getPost('id');
        $query = $model->delete($id);

        if ($query) {
            echo json_encode(['code' => 1, 'msg' => 'Data berhasil dihapus!']);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data gagal dihapus!']);
        }
    }

    public function datatableLembaga()
    {
        $db = db_connect();
        $builder = $db->table('tb_lembaga_penelitian')->select('id_lembaga_penelitian, nama_lembaga, email_lembaga, website_lembaga, alamat_lembaga');

        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id_lembaga_penelitian . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id_lembaga_penelitian . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->addNumbering('no')
            ->toJson();
    }
}
