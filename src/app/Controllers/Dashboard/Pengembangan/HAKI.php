<?php

namespace App\Controllers\Dashboard\Pengembangan;

use \Hermawan\DataTables\DataTable;

use App\Controllers\BaseController;

class HAKI extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('role')) {
            return redirect()->to('login');
        }
        return view('Dashboard/Pengembangan/haki');
    }

    public function addHaki()
    {
        $model = new \App\Models\HAKI();
        $validation = \Config\Services::validation();

        $this->validate([
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis tidak boleh kosong!'
                ]
            ],
            'nama_haki' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Haki tidak boleh kosong!'
                ]
            ],
            'pemilik_haki' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pemilik HAKI tidak boleh kosong!'
                ]
            ],
            'registrasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pendaftar HAKI tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'jenis' => $this->request->getPost('jenis'),
                'nama_haki' => $this->request->getPost('nama_haki'),
                'pemilik_haki' => $this->request->getPost('pemilik_haki'),
                'registrasi' => $this->request->getPost('registrasi'),
            ];
            $query = $model->insert($data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil menambah data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal menambah data!']);
            }
        }
    }

    public function getHaki()
    {
        $model = new \App\Models\HAKI();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null]);
        }
    }

    public function updateHaki()
    {
        $model = new \App\Models\HAKI();
        $validation = \Config\Services::validation();
        $id = $this->request->getPost('id_edit');

        $this->validate([
            'jenis_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis tidak boleh kosong!'
                ]
            ],
            'nama_haki_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Haki tidak boleh kosong!'
                ]
            ],
            'pemilik_haki_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pemilik HAKI tidak boleh kosong!'
                ]
            ],
            'registrasi_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pendaftar HAKI tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'jenis' => $this->request->getPost('jenis_edit'),
                'nama_haki' => $this->request->getPost('nama_haki_edit'),
                'pemilik_haki' => $this->request->getPost('pemilik_haki_edit'),
                'registrasi' => $this->request->getPost('registrasi_edit'),
            ];
            $query = $model->update($id, $data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil mengupdate data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal mengupdate data!']);
            }
        }
    }

    public function deleteHaki()
    {
        $model = new \App\Models\HAKI();
        $id = $this->request->getPost('id');
        $query = $model->delete($id);

        if ($query) {
            echo json_encode(['code' => 1, 'msg' => 'Data berhasil dihapus!']);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data gagal dihapus!']);
        }
    }

    public function datatableHaki()
    {
        $db = db_connect();
        $builder = $db->table('tb_haki')->select('id_haki, jenis, nama_haki, pemilik_haki, registrasi');

        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id_haki . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id_haki . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->addNumbering('no')
            ->toJson();
    }
}
