<?php

namespace App\Controllers\Dashboard\Layanan;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class BlogSaran extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('role')) {
            return redirect()->to('login');
        }
        return view('Dashboard/Layanan/blogSaran');
    }

    public function addBlogSaran()
    {
        $model = new \App\Models\BlogSaran();
        $validation = \Config\Services::validation();

        $this->validate([
            'saran' => [
                'rules' => 'required|is_unique[tb_blog_saran.saran]',
                'errors' => [
                    'required' => 'Saran tidak boleh kosong!',
                    'is_unique[tb_blog_saran.saran]' => 'Saran serupa sudah ada, dilarang melakukan SPAM!'
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
            echo json_encode([
                'status' => 'error', 'msg' => 'Data tidak ditemukan!', 'data' => null
            ]);
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
