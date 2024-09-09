<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class SKPD extends BaseController
{
    public function index()
    {
        return view('Dashboard/SKPD');
    }

    public function addSKPD()
    {
        $model = new \App\Models\SKPD();
        $validation = \Config\Services::validation();

        $this->validate([
            'nama_skpd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama SKPD tidak boleh kosong!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong!'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email tidak boleh kosong!'
                ]
            ],
            'kontak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kontak tidak boleh kosong!'
                ]
            ],
            'website' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Website tidak boleh kosong!'
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
                'nama_skpd' => $this->request->getPost('nama_skpd'),
                'alamat' => $this->request->getPost('alamat'),
                'email' => $this->request->getPost('email'),
                'kontak' => $this->request->getPost('kontak'),
                'website' => $this->request->getPost('website'),
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
        $model = new \App\Models\SKPD();
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
        $model = new \App\Models\SKPD();
        $validation = \Config\Services::validation();
        $id = $this->request->getPost('id_edit');

        $this->validate([
            'nama_skpd_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama SKPD tidak boleh kosong!'
                ]
            ],
            'alamat_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong!'
                ]
            ],
            'email_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email tidak boleh kosong!'
                ]
            ],
            'kontak_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kontak tidak boleh kosong!'
                ]
            ],
            'website_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Website tidak boleh kosong!'
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
                'nama_skpd' => $this->request->getPost('nama_skpd_edit'),
                'alamat' => $this->request->getPost('alamat_edit'),
                'email' => $this->request->getPost('email_edit'),
                'kontak' => $this->request->getPost('kontak_edit'),
                'website' => $this->request->getPost('website_edit'),
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
        $model = new \App\Models\SKPD();
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
        $builder = $db->table('tb_skpd')->select('id_skpd, nama_skpd, alamat, email, kontak, website');

        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id_skpd . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id_skpd . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->addNumbering('no')
            ->toJson();
    }
}
