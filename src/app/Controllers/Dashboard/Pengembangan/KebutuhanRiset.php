<?php

namespace App\Controllers\Dashboard\Pengembangan;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class KebutuhanRiset extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('role')) {
            return redirect()->to('login');
        }
        return view('Dashboard/Pengembangan/kebutuhanRiset');
    }

    public function addKebutuhanRiset()
    {
        $model = new \App\Models\KebutuhanRiset();
        $validation = \Config\Services::validation();

        $this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Kebutuhan Riset tidak boleh kosong!'
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Kebutuhan Riset tidak boleh kosong!'
                ]
            ],
            'sasaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sasaran Kebutuhan Riset tidak boleh kosong!'
                ]
            ],
            'kontak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kontak Kebutuhan Riset tidak boleh kosong!'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Kebutuhan Riset tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'judul' => $this->request->getPost('judul'),
                'tujuan' => $this->request->getPost('tujuan'),
                'sasaran' => $this->request->getPost('sasaran'),
                'kontak' => $this->request->getPost('kontak'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            ];
            $query = $model->insert($data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil menambah data!']);
            } else {
                echo json_encode([
                    'code' => 0, 'msg' => 'Gagal menambah data!'
                ]);
            }
        }
    }

    public function getKebutuhanRiset()
    {
        $model = new \App\Models\KebutuhanRiset();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null]);
        }
    }

    public function updateKebutuhanRiset()
    {
        $model = new \App\Models\KebutuhanRiset();
        $validation = \Config\Services::validation();
        $id = $this->request->getPost('id_edit');

        $this->validate([
            'judul_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Kebutuhan Riset tidak boleh kosong!'
                ]
            ],
            'tujuan_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Kebutuhan Riset tidak boleh kosong!'
                ]
            ],
            'sasaran_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sasaran Kebutuhan Riset tidak boleh kosong!'
                ]
            ],
            'kontak_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kontak Kebutuhan Riset tidak boleh kosong!'
                ]
            ],
            'deskripsi_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Kebutuhan Riset tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'judul' => $this->request->getPost('judul_edit'),
                'tujuan' => $this->request->getPost('tujuan_edit'),
                'sasaran' => $this->request->getPost('sasaran_edit'),
                'kontak' => $this->request->getPost('kontak_edit'),
                'deskripsi' => $this->request->getPost('deskripsi_edit'),
            ];
            $query = $model->update($id, $data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil mengupdate data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal mengupdate data!']);
            }
        }
    }

    public function deleteKebutuhanRiset()
    {
        $model = new \App\Models\KebutuhanRiset();
        $id = $this->request->getPost('id');
        $query = $model->delete($id);

        if ($query) {
            echo json_encode(['code' => 1, 'msg' => 'Data berhasil dihapus!']);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data gagal dihapus!']);
        }
    }

    public function datatableKebutuhanRiset()
    {
        $db = db_connect();
        $builder = $db->table('tb_kebutuhan_riset')->select('id_kebutuhan, judul, tujuan, sasaran, kontak, deskripsi');

        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id_kebutuhan . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id_kebutuhan . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->addNumbering('no')
            ->toJson();
    }
}
