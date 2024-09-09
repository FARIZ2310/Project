<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class Layanan extends BaseController
{
    public function index()
    {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    public function infoKKN() {
        return view('Dashboard/Layanan/infoKKN');
    }

    public function addInfoKkn()
    {
        $model = new \App\Models\InfoKKN();
        $validation = \Config\Services::validation();

        $this->validate([
            'perguruan_tinggi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Perguruan Tinggi tidak boleh kosong!'
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
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'perguruan_tinggi' => $this->request->getPost('perguruan_tinggi'),
                'lokasi' => $this->request->getPost('lokasi'),
                'link_gmap' => $this->request->getPost('link_gmap'),
                'pelaksanaan' => $this->request->getPost('pelaksanaan'),
            ];
            $query = $model->insert($data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil menambah data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal menambah data!']);
            }
        }
    }

    public function getInfoKkn()
    {
        $model = new \App\Models\InfoKKN();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null]);
        }
    }

    public function updateInfoKkn()
    {
        $model = new \App\Models\InfoKKN();
        $validation = \Config\Services::validation();
        $id = $this->request->getPost('id_edit');

        $this->validate([
            'perguruan_tinggi_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Perguruan Tinggi tidak boleh kosong!'
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
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'perguruan_tinggi' => $this->request->getPost('perguruan_tinggi_edit'),
                'lokasi' => $this->request->getPost('lokasi_edit'),
                'link_gmap' => $this->request->getPost('link_gmap_edit'),
                'pelaksanaan' => $this->request->getPost('pelaksanaan_edit'),
            ];
            $query = $model->update($id, $data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil mengupdate data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal mengupdate data!']);
            }
        }
    }

    public function deleteInfoKkn()
    {
        $model = new \App\Models\InfoKKN();
        $id = $this->request->getPost('id');
        $query = $model->delete($id);

        if ($query) {
            echo json_encode(['code' => 1, 'msg' => 'Data berhasil dihapus!']);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data gagal dihapus!']);
        }
    }

    public function datatableInfoKkn()
    {
        $db = db_connect();
        $builder = $db->table('tb_info_kkn')->select('id_info_kkn, perguruan_tinggi, lokasi, link_gmap, pelaksanaan');

        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id_info_kkn . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id_info_kkn . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->add('lokasi', function ($row) {
                return '<a href="'.$row->link_gmap.'" style="text-decoration: none;" target="_blank" rel="noopener noreferrer">'.$row->lokasi.'</a>';
            })
            ->addNumbering('no')
            ->toJson();

            
    }

    public function blogSaran() {
        return view('Dashboard/Layanan/blogSaran');
    }

    public function addBlogSaran()
    {
        $model = new \App\Models\BlogSaran();
        $validation = \Config\Services::validation();

        $this->validate([
            'saran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Saran tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'saran' => $this->request->getPost('saran'),
            ];
            $query = $model->insert($data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil menambah data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal menambah data!']);
            }
        }
    }

    public function getBlogSaran()
    {
        $model = new \App\Models\BlogSaran();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null]);
        }
    }

    public function updateBlogSaran()
    {
        $model = new \App\Models\BlogSaran();
        $validation = \Config\Services::validation();
        $id = $this->request->getPost('id_edit');

        $this->validate([
            'tanggapan_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggapan tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'tanggapan' => $this->request->getPost('tanggapan_edit'),
            ];
            $query = $model->update($id, $data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil mengupdate data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal mengupdate data!']);
            }
        }
    }

    public function deleteBlogSaran()
    {
        $model = new \App\Models\BlogSaran();
        $id = $this->request->getPost('id');
        $query = $model->delete($id);

        if ($query) {
            echo json_encode(['code' => 1, 'msg' => 'Data berhasil dihapus!']);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data gagal dihapus!']);
        }
    }

    public function datatableBlogSaran()
    {
        $db = db_connect();
        $builder = $db->table('tb_blog_saran')->select('id_saran, saran, tanggapan');

        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id_saran . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id_saran . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->addNumbering('no')
            ->toJson();

            
    }

    public function datatableBlogSaranDitanggapi()
    {
        $db = db_connect();
        $builder = $db->table('tb_blog_saran')->select('id_saran, saran, tanggapan')->where('tanggapan !=', '');

        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id_saran . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id_saran . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->addNumbering('no')
            ->toJson();

            
    }
}
