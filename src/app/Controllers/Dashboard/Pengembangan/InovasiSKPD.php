<?php

namespace App\Controllers\Dashboard\Pengembangan;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class InovasiSKPD extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('role')) {
            return redirect()->to('login');
        }
        $db = db_connect();
        $builder = $db->table('tb_skpd')->select('id_skpd, nama_skpd')->get()->getResult();
        $data = [
            'skpd' => $builder
        ];

        return view('Dashboard/Pengembangan/inovasiSKPD', $data);
    }

    public function addInovasiSKPD()
    {
        $model = new \App\Models\InovasiSKPD();
        $validation = \Config\Services::validation();
        $session = session();

        $this->validate([
            'judul_inovasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'jenis_inovasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'tahun_inovasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'latar_belakang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Latar Belakang Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'manfaat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Manfaat Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'progress' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Progress Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'id_skpd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'SKPD tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'judul_inovasi' => $this->request->getPost('judul_inovasi'),
                'jenis_inovasi' => $this->request->getPost('jenis_inovasi'),
                'tahun_inovasi' => $this->request->getPost('tahun_inovasi'),
                'latar_belakang' => $this->request->getPost('latar_belakang'),
                'tujuan' => $this->request->getPost('tujuan'),
                'manfaat' => $this->request->getPost('manfaat'),
                'status' => $this->request->getPost('status'),
                'progress' => $this->request->getPost('progress'),
                'id_skpd' => $this->request->getPost('id_skpd'),
            ];
            $query = $model->insert($data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil menambah data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal menambah data!']);
            }
        }
    }

    public function getInovasiSKPD()
    {
        $model = new \App\Models\InovasiSKPD();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null]);
        }
    }

    public function updateInovasiSKPD()
    {
        $model = new \App\Models\InovasiSKPD();
        $validation = \Config\Services::validation();
        $session = session();
        $id = $this->request->getPost('id_edit');

        $this->validate([
            'judul_inovasi_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'jenis_inovasi_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'tahun_inovasi_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'latar_belakang_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Latar Belakang Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'tujuan_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'manfaat_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Manfaat Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'status_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'progress_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Progress Inovasi SKPD tidak boleh kosong!'
                ]
            ],
            'id_skpd_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'SKPD tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'judul_inovasi' => $this->request->getPost('judul_inovasi_edit'),
                'jenis_inovasi' => $this->request->getPost('jenis_inovasi_edit'),
                'tahun_inovasi' => $this->request->getPost('tahun_inovasi_edit'),
                'latar_belakang' => $this->request->getPost('latar_belakang_edit'),
                'tujuan' => $this->request->getPost('tujuan_edit'),
                'manfaat' => $this->request->getPost('manfaat_edit'),
                'status' => $this->request->getPost('status_edit'),
                'progress' => $this->request->getPost('progress_edit'),
                'id_skpd' => $this->request->getPost('id_skpd_edit'),
            ];
            $query = $model->update($id, $data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil mengupdate data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal mengupdate data!']);
            }
        }
    }

    public function deleteInovasiSKPD()
    {
        $model = new \App\Models\InovasiSKPD();
        $id = $this->request->getPost('id');
        $query = $model->delete($id);

        if ($query) {
            echo json_encode(['code' => 1, 'msg' => 'Data berhasil dihapus!']);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data gagal dihapus!']);
        }
    }

    public function datatableInovasiSKPD()
    {
        $db = db_connect();
        $session = session();

        $builder = $db->table('tb_inovasi_skpd')->select('id_inovasi_skpd, judul_inovasi, jenis_inovasi, tahun_inovasi, latar_belakang, tujuan, manfaat, status, progress, tb_inovasi_skpd.id_skpd, nama_skpd')->join('tb_skpd', 'tb_skpd.id_skpd = tb_inovasi_skpd.id_skpd');


        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id_inovasi_skpd . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id_inovasi_skpd . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->addNumbering('no')
            ->toJson();
    }
}
