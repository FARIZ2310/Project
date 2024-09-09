<?php

namespace App\Controllers\Dashboard\Penelitian;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class Penelitian extends BaseController
{
    // TODO: change Title to 'Penelitian/Kajian/Publikasi/Desiminasi/Fasilitasi
    // TODO: add attribute 'waktu_pelaksanaan', 'status', 'progress'
    public function index()
    {
        $session = session();
        if (!$session->get('role')) {
            return redirect()->to('login');
        }
        return view('Dashboard/Penelitian/penelitian');
    }

    public function addPenelitian()
    {
        $model = new \App\Models\Penelitian();
        $validation = \Config\Services::validation();

        $this->validate([
            'jenis_penelitian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Penelitian tidak boleh kosong!'
                ]
            ],
            'judul_penelitian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Penelitian tidak boleh kosong!'
                ]
            ],
            'tahun_penelitian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Penelitian tidak boleh kosong!'
                ]
            ],
            'abstrak_penelitian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Abstrak Penelitian tidak boleh kosong!'
                ]
            ],
            'peneliti' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Peneliti tidak boleh kosong!'
                ]
            ],
            'id_lembaga_penelitian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lembaga Peneliti tidak boleh kosong!'
                ]
            ],
            'waktu_pelaksanaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu Pelaksanaan tidak boleh kosong!'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status tidak boleh kosong!'
                ]
            ],
            'progress' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Progress tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'jenis_penelitian' => $this->request->getPost('jenis_penelitian'),
                'judul_penelitian' => $this->request->getPost('judul_penelitian'),
                'tahun_penelitian' => $this->request->getPost('tahun_penelitian'),
                'abstrak_penelitian' => $this->request->getPost('abstrak_penelitian'),
                'peneliti' => $this->request->getPost('peneliti'),
                'id_lembaga_penelitian' => $this->request->getPost('id_lembaga_penelitian'),
                'waktu_pelaksanaan' => $this->request->getPost('waktu_pelaksanaan'),
                'status' => $this->request->getPost('status'),
                'progress' => $this->request->getPost('progress'),
            ];
            $query = $model->insert($data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil menambah data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal menambah data!']);
            }
        }
    }

    public function getPenelitian()
    {
        $model = new \App\Models\Penelitian();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null]);
        }
    }

    public function updatePenelitian()
    {
        $model = new \App\Models\Penelitian();
        $validation = \Config\Services::validation();
        $id = $this->request->getPost('id_edit');

        $this->validate([
            'jenis_penelitian_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Penelitian tidak boleh kosong!'
                ]
            ],
            'judul_penelitian_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Penelitian tidak boleh kosong!'
                ]
            ],
            'tahun_penelitian_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Penelitian tidak boleh kosong!'
                ]
            ],
            'abstrak_penelitian_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Abstrak Penelitian tidak boleh kosong!'
                ]
            ],
            'peneliti_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Peneliti tidak boleh kosong!'
                ]
            ],
            'id_lembaga_penelitian_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lembaga Peneliti tidak boleh kosong!'
                ]
            ],
            'waktu_pelaksanaan_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu Pelaksanaan tidak boleh kosong!'
                ]
            ],
            'status_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status tidak boleh kosong!'
                ]
            ],
            'progress_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Progress tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'jenis_penelitian' => $this->request->getPost('jenis_penelitian_edit'),
                'judul_penelitian' => $this->request->getPost('judul_penelitian_edit'),
                'tahun_penelitian' => $this->request->getPost('tahun_penelitian_edit'),
                'abstrak_penelitian' => $this->request->getPost('abstrak_penelitian_edit'),
                'peneliti' => $this->request->getPost('peneliti_edit'),
                'id_lembaga_penelitian' => $this->request->getPost('id_lembaga_penelitian_edit'),
                'waktu_pelaksanaan' => $this->request->getPost('waktu_pelaksanaan_edit'),
                'status' => $this->request->getPost('status_edit'),
                'progress' => $this->request->getPost('progress_edit'),
            ];
            $query = $model->update($id, $data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil mengupdate data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal mengupdate data!']);
            }
        }
    }

    public function deletePenelitian()
    {
        $model = new \App\Models\Penelitian();
        $id = $this->request->getPost('id');
        $query = $model->delete($id);

        if ($query) {
            echo json_encode(['code' => 1, 'msg' => 'Data berhasil dihapus!']);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data gagal dihapus!']);
        }
    }

    public function datatablePenelitian()
    {
        $db = db_connect();
        $builder = $db->table('tb_penelitian')->select('id_penelitian, jenis_penelitian, judul_penelitian, tahun_penelitian, abstrak_penelitian, peneliti, nama_lembaga, waktu_pelaksanaan, status, progress')->join('tb_lembaga_penelitian', 'tb_lembaga_penelitian.id_lembaga_penelitian = tb_penelitian.id_lembaga_penelitian');

        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id_penelitian . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id_penelitian . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->addNumbering('no')
            ->toJson();
    }
}
