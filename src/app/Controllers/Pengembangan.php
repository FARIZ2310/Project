<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class Pengembangan extends BaseController
{
    public function index()
    {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    public function haki()
    {
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

    public function inovasiOPD()
    {
        return view('Dashboard/Pengembangan/inovasiOPD');
    }

    public function addInovasiOPD()
    {
        $model = new \App\Models\InovasiOPD();
        $validation = \Config\Services::validation();

        $this->validate([
            'judul_inovasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Inovasi OPD tidak boleh kosong!'
                ]
            ],
            'tahun_inovasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Inovasi OPD tidak boleh kosong!'
                ]
            ],
            'latar_belakang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Latar Belakang Inovasi OPD tidak boleh kosong!'
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Inovasi OPD tidak boleh kosong!'
                ]
            ],
            'manfaat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Manfaat Inovasi OPD tidak boleh kosong!'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Inovasi OPD tidak boleh kosong!'
                ]
            ],
            'progress' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Progress Inovasi OPD tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'judul_inovasi' => $this->request->getPost('judul_inovasi'),
                'tahun_inovasi' => $this->request->getPost('tahun_inovasi'),
                'latar_belakang' => $this->request->getPost('latar_belakang'),
                'tujuan' => $this->request->getPost('tujuan'),
                'manfaat' => $this->request->getPost('manfaat'),
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

    public function getInovasiOPD()
    {
        $model = new \App\Models\InovasiOPD();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null]);
        }
    }

    public function updateInovasiOPD()
    {
        $model = new \App\Models\InovasiOPD();
        $validation = \Config\Services::validation();
        $id = $this->request->getPost('id_edit');

        $this->validate([
            'judul_inovasi_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Inovasi OPD tidak boleh kosong!'
                ]
            ],
            'tahun_inovasi_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Inovasi OPD tidak boleh kosong!'
                ]
            ],
            'latar_belakang_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Latar Belakang Inovasi OPD tidak boleh kosong!'
                ]
            ],
            'tujuan_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Inovasi OPD tidak boleh kosong!'
                ]
            ],
            'manfaat_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Manfaat Inovasi OPD tidak boleh kosong!'
                ]
            ],
            'status_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Inovasi OPD tidak boleh kosong!'
                ]
            ],
            'progress_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Progress Inovasi OPD tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'judul_inovasi' => $this->request->getPost('judul_inovasi_edit'),
                'tahun_inovasi' => $this->request->getPost('tahun_inovasi_edit'),
                'latar_belakang' => $this->request->getPost('latar_belakang_edit'),
                'tujuan' => $this->request->getPost('tujuan_edit'),
                'manfaat' => $this->request->getPost('manfaat_edit'),
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

    public function deleteInovasiOPD()
    {
        $model = new \App\Models\InovasiOPD();
        $id = $this->request->getPost('id');
        $query = $model->delete($id);

        if ($query) {
            echo json_encode(['code' => 1, 'msg' => 'Data berhasil dihapus!']);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data gagal dihapus!']);
        }
    }

    public function datatableInovasiOPD()
    {
        $db = db_connect();
        $builder = $db->table('tb_inovasi_opd')->select('id_inovasi_opd, judul_inovasi, tahun_inovasi, latar_belakang, tujuan, manfaat, status, progress');

        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id_inovasi_opd . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id_inovasi_opd . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->addNumbering('no')
            ->toJson();
    }

    public function kreativitasMasyarakat()
    {
        return view('Dashboard/Pengembangan/kreativitasMasyarakat');
    }

    public function addKreativitasMasyarakat()
    {
        $model = new \App\Models\KreativitasMasyarakat();
        $validation = \Config\Services::validation();

        $this->validate([
            'nama_kreativitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kreativitas Masyarakat tidak boleh kosong!'
                ]
            ],
            'kreator' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kreator Kreativitas Masyarakat tidak boleh kosong!'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Kreativitas Masyarakat tidak boleh kosong!'
                ]
            ],
            'progress' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Progress Kreativitas Masyarakat tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'nama_kreativitas' => $this->request->getPost('nama_kreativitas'),
                'kreator' => $this->request->getPost('kreator'),
                'deskripsi' => $this->request->getPost('deskripsi'),
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

    public function getKreativitasMasyarakat()
    {
        $model = new \App\Models\KreativitasMasyarakat();
        $id = $this->request->getPost('id');
        $data = $model->find($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null]);
        }
    }

    public function updateKreativitasMasyarakat()
    {
        $model = new \App\Models\KreativitasMasyarakat();
        $validation = \Config\Services::validation();
        $id = $this->request->getPost('id_edit');

        $this->validate([
            'nama_kreativitas_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kreativitas Masyarakat tidak boleh kosong!'
                ]
            ],
            'kreator_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kreator Kreativitas Masyarakat tidak boleh kosong!'
                ]
            ],
            'deskripsi_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Kreativitas Masyarakat tidak boleh kosong!'
                ]
            ],
            'progress_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Progress Kreativitas Masyarakat tidak boleh kosong!'
                ]
            ],
        ]);

        if ($validation->run() == FALSE) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {
            $data = [
                'nama_kreativitas' => $this->request->getPost('nama_kreativitas_edit'),
                'kreator' => $this->request->getPost('kreator_edit'),
                'deskripsi' => $this->request->getPost('deskripsi_edit'),
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

    public function deleteKreativitasMasyarakat()
    {
        $model = new \App\Models\KreativitasMasyarakat();
        $id = $this->request->getPost('id');
        $query = $model->delete($id);

        if ($query) {
            echo json_encode(['code' => 1, 'msg' => 'Data berhasil dihapus!']);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data gagal dihapus!']);
        }
    }

    public function datatableKreativitasMasyarakat()
    {
        $db = db_connect();
        $builder = $db->table('tb_kreativitas')->select('id_kreativitas, nama_kreativitas, kreator, deskripsi, progress');

        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '
            <button type="button" class="btn btn-icon btn-warning" id="btn_edit" data-toggle="tooltip" data-kode="' . $row->id_kreativitas . '" data-backdrop="static" title="Edit">
                <span class="tf-icons bx bx-edit-alt"></span>
            </button>    
            <button type="button" class="btn btn-icon btn-danger" id="btn_hapus" data-toggle="tooltip" data-kode="' . $row->id_kreativitas . '" data-backdrop="static" title="Hapus">
                <span class="tf-icons bx bx-trash"></span>
            </button>    
            ';
            })
            ->addNumbering('no')
            ->toJson();
    }

    public function kebutuhanRiset()
    {
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
            'manfaat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Manfaat Kebutuhan Riset tidak boleh kosong!'
                ]
            ],
            'info' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Info Kebutuhan Riset tidak boleh kosong!'
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
                'manfaat' => $this->request->getPost('manfaat'),
                'info' => $this->request->getPost('info'),
            ];
            $query = $model->insert($data);
            if ($query) {
                echo json_encode(['code' => 1, 'msg' => 'Berhasil menambah data!']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Gagal menambah data!']);
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
            'manfaat_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Manfaat Kebutuhan Riset tidak boleh kosong!'
                ]
            ],
            'info_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Info Kebutuhan Riset tidak boleh kosong!'
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
                'manfaat' => $this->request->getPost('manfaat_edit'),
                'info' => $this->request->getPost('info_edit'),
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
        $builder = $db->table('tb_kebutuhan_riset')->select('id_kebutuhan, judul, tujuan, manfaat, info');

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
