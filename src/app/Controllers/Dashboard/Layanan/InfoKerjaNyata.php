<?php

namespace App\Controllers\Dashboard\Layanan;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class InfoKerjaNyata extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('role')) {
            return redirect()->to('login');
        }
        return view('Dashboard/Layanan/infoKerjaNyata');
    }

    public function addInfoKerjaNyata()
    {
        $model = new \App\Models\InfoKerjaNyata();
        $validation = \Config\Services::validation();

        $this->validate([
            'intansi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Intansi tidak boleh kosong!'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi Pelaksanaan tidak boleh kosong!'
                ]
            ],
            'link_gmap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link Google Maps Pelaksanaan tidak boleh kosong!'
                ]
            ],
            'pelaksanaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Pelaksanaan tidak boleh kosong!'
                ]
            ],
            'hasil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hasil Magang tidak boleh kosong!'
                ]
            ],
            'peserta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Peserta Magang tidak boleh kosong!'
                ]
            ],
            'masa_magang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masa Magang tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'intansi' => $this->request->getPost('intansi'),
                'lokasi' => $this->request->getPost('lokasi'),
                'link_gmap' => $this->request->getPost('link_gmap'),
                'pelaksanaan' => $this->request->getPost('pelaksanaan'),
                'hasil' => $this->request->getPost('hasil'),
                'peserta' => $this->request->getPost('peserta'),
                'masa_magang' => $this->request->getPost('masa_magang'),
            ];
            $query = $model->insert($data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil menambah data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal menambah data!']);
            }
        }
    }

    public function getInfoKerjaNyata()
    {
        $model = new \App\Models\InfoKerjaNyata();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null]);
        }
    }

    public function updateInfoKerjaNyata()
    {
        $model = new \App\Models\InfoKerjaNyata();
        $validation = \Config\Services::validation();
        $id = $this->request->getPost('id_edit');

        $this->validate([
            'intansi_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Intansi tidak boleh kosong!'
                ]
            ],
            'lokasi_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi Pelaksanaan tidak boleh kosong!'
                ]
            ],
            'link_gmap_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link Google Maps Pelaksanaan tidak boleh kosong!'
                ]
            ],
            'pelaksanaan_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Pelaksanaan tidak boleh kosong!'
                ]
            ],
            'hasil_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hasil Magang tidak boleh kosong!'
                ]
            ],
            'peserta_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Peserta Magang tidak boleh kosong!'
                ]
            ],
            'masa_magang_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masa Magang tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'intansi' => $this->request->getPost('intansi_edit'),
                'lokasi' => $this->request->getPost('lokasi_edit'),
                'link_gmap' => $this->request->getPost('link_gmap_edit'),
                'pelaksanaan' => $this->request->getPost('pelaksanaan_edit'),
                'hasil' => $this->request->getPost('hasil_edit'),
                'peserta' => $this->request->getPost('peserta_edit'),
                'masa_magang' => $this->request->getPost('masa_magang_edit'),
            ];
            $query = $model->update($id, $data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil mengupdate data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal mengupdate data!']);
            }
        }
    }

    public function deleteInfoKerjaNyata()
    {
        $model = new \App\Models\InfoKerjaNyata();
        $id = $this->request->getPost('id');
        $query = $model->delete($id);

        if ($query) {
            echo json_encode(['code' => 1, 'msg' => 'Data berhasil dihapus!']);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data gagal dihapus!']);
        }
    }

    public function datatableInfoKerjaNyata()
    {
        $db = db_connect();
        $builder = $db->table('tb_info_kerja_nyata')->select('id_info_kerja_nyata, intansi, lokasi, link_gmap, pelaksanaan, hasil, peserta, masa_magang');

        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id_info_kerja_nyata . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id_info_kerja_nyata . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->add('lokasi', function ($row) {
                return '<a href="' . $row->link_gmap . '" style="text-decoration: none;" target="_blank" rel="noopener noreferrer">' . $row->lokasi . '</a>';
            })
            ->addNumbering('no')
            ->toJson();
    }
}
