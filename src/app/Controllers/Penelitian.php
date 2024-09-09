<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class Penelitian extends BaseController
{
    public function index()
    {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    // Bidang Penelitian
    public function bidang()
    {
        return view('Dashboard/Penelitian/bidang');
    }

    public function addBidang()
    {
        $model = new \App\Models\BidangPenelitian();
        $validation = \Config\Services::validation();

        $this->validate([
            'nama_bidang_penelitian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bidang Penelitian tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'nama_bidang_penelitian' => $this->request->getPost('nama_bidang_penelitian'),
            ];
            $query = $model->insert($data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil menambah data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal menambah data!']);
            }
        }
    }

    public function getBidang()
    {
        $model = new \App\Models\BidangPenelitian();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null]);
        }
    }

    public function updateBidang()
    {
        $model = new \App\Models\BidangPenelitian();
        $validation = \Config\Services::validation();
        $id = $this->request->getPost('id_edit');

        $this->validate([
            'nama_bidang_penelitian_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bidang Penelitian tidak boleh kosong!',
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'nama_bidang_penelitian' => $this->request->getPost('nama_bidang_penelitian_edit'),
            ];
            $query = $model->update($id, $data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil mengupdate data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal mengupdate data!']);
            }
        }
    }

    public function deleteBidang()
    {
        $model = new \App\Models\BidangPenelitian();
        $id = $this->request->getPost('id');
        $query = $model->delete($id);

        if ($query) {
            echo json_encode(['code' => 1, 'msg' => 'Data berhasil dihapus!']);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data gagal dihapus!']);
        }
    }

    public function datatableBidang()
    {
        $db = db_connect();
        $builder = $db->table('tb_bidang_penelitian')->select('id_bidang_penelitian, nama_bidang_penelitian');

        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id_bidang_penelitian . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id_bidang_penelitian . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->addNumbering('no')
            ->toJson();
    }

    // Bidang Penelitian
    public function lembaga()
    {
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

    // Peneliti
    public function peneliti()
    {
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

        if ($validation->run() == FALSE) {
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

        if ($validation->run() == FALSE) {
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

    public function penelitian()
    {
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
        $builder = $db->table('tb_penelitian')->select('id_penelitian, jenis_penelitian, judul_penelitian, tahun_penelitian, abstrak_penelitian, peneliti, nama_lembaga')->join('tb_lembaga_penelitian', 'tb_lembaga_penelitian.id_lembaga_penelitian = tb_penelitian.id_lembaga_penelitian');

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
