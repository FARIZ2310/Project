<?php

namespace App\Controllers\Dashboard\Penelitian;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class Peneliti extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('role')) {
            return redirect()->to('login');
        }
        return view('Dashboard/Penelitian/peneliti');
    }

    public function addPeneliti()
    {
        $model = new \App\Models\Peneliti();
        $validation = \Config\Services::validation();

        $this->validate([
            'nama_peneliti' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Peneliti tidak boleh kosong!'
                ]
            ],
            'gelar_peneliti' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Gelar Peneliti tidak boleh kosong!'
                ]
            ],
            'pendidikan_peneliti' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pendidikan Peneliti tidak boleh kosong!'
                ]
            ],
            'alamat_peneliti' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Peneliti tidak boleh kosong!'
                ]
            ],
            'email_peneliti' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email Peneliti tidak boleh kosong!'
                ]
            ],
            'id_lembaga_penelitian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lembaga Peneliti tidak boleh kosong!'
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
                'nama_peneliti' => $this->request->getPost('nama_peneliti'),
                'gelar_peneliti' => $this->request->getPost('gelar_peneliti'),
                'pendidikan_peneliti' => $this->request->getPost('pendidikan_peneliti'),
                'alamat_peneliti' => $this->request->getPost('alamat_peneliti'),
                'email_peneliti' => $this->request->getPost('email_peneliti'),
                'id_lembaga_penelitian' => $this->request->getPost('id_lembaga_penelitian'),
            ];
            $query = $model->insert($data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil menambah data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal menambah data!']);
            }
        }
    }

    public function getPeneliti()
    {
        $model = new \App\Models\Peneliti();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null]);
        }
    }

    public function updatePeneliti()
    {
        $model = new \App\Models\Peneliti();
        $validation = \Config\Services::validation();
        $id = $this->request->getPost('id_edit');

        $this->validate([
            'nama_peneliti_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Peneliti tidak boleh kosong!'
                ]
            ],
            'gelar_peneliti_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Gelar Peneliti tidak boleh kosong!'
                ]
            ],
            'pendidikan_peneliti_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pendidikan Peneliti tidak boleh kosong!'
                ]
            ],
            'alamat_peneliti_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Peneliti tidak boleh kosong!'
                ]
            ],
            'email_peneliti_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email Peneliti tidak boleh kosong!'
                ]
            ],
            'id_lembaga_penelitian_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lembaga Peneliti tidak boleh kosong!'
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
                'nama_peneliti' => $this->request->getPost('nama_peneliti_edit'),
                'gelar_peneliti' => $this->request->getPost('gelar_peneliti_edit'),
                'pendidikan_peneliti' => $this->request->getPost('pendidikan_peneliti_edit'),
                'alamat_peneliti' => $this->request->getPost('alamat_peneliti_edit'),
                'email_peneliti' => $this->request->getPost('email_peneliti_edit'),
                'id_lembaga_penelitian' => $this->request->getPost('id_lembaga_penelitian_edit'),
            ];
            $query = $model->update($id, $data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil mengupdate data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal mengupdate data!']);
            }
        }
    }

    public function deletePeneliti()
    {
        $model = new \App\Models\Peneliti();
        $id = $this->request->getPost('id');
        $query = $model->delete($id);

        if ($query) {
            echo json_encode(['code' => 1, 'msg' => 'Data berhasil dihapus!']);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data gagal dihapus!']);
        }
    }

    public function datatablePeneliti()
    {
        $db = db_connect();
        $builder = $db->table('tb_peneliti')->select('id_peneliti, nama_peneliti, gelar_peneliti, pendidikan_peneliti, alamat_peneliti, email_peneliti, nama_lembaga')->join('tb_lembaga_penelitian', 'tb_lembaga_penelitian.id_lembaga_penelitian = tb_peneliti.id_lembaga_penelitian');

        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id_peneliti . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id_peneliti . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->addNumbering('no')
            ->toJson();
    }
}
