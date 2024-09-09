<?php

namespace App\Controllers\Dashboard\Pengembangan;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class KreativitasMasyarakat extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('role')) {
            return redirect()->to('login');
        }
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
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Kreativitas Masyarakat tidak boleh kosong!'
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
                'status' => $this->request->getPost('status'),
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
            'status_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Kreativitas Masyarakat tidak boleh kosong!'
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
                'status' => $this->request->getPost('status_edit'),
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
        $builder = $db->table('tb_kreativitas')->select('id_kreativitas, nama_kreativitas, kreator, deskripsi, status');

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
}
