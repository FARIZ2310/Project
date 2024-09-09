<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('Landing/home');
    }

    public function InfoKKN()
    {
        return view('Landing/infokkn');
    }

    public function BlogSaran()
    {
        return view('Landing/blogsaran');
    }

    public function Dokumen()
    {
        return view('Landing/dokumen');
    }

    public function SOP()
    {
        return view('Landing/sop');
    }

    public function HAKI()
    {
        return view('Landing/haki');
    }

    public function InovasiSKPD()
    {
        return view('Landing/inovasiSKPD');
    }

    public function InovasiSKPDDetail($id = null)
    {
        $db = db_connect();
        $builder = $db->table('tb_inovasi_skpd')->select('id_inovasi_skpd, judul_inovasi, jenis_inovasi, tahun_inovasi, latar_belakang, tujuan, manfaat, status, progress, tb_inovasi_skpd.id_skpd, nama_skpd')->join('tb_skpd', 'tb_skpd.id_skpd = tb_inovasi_skpd.id_skpd')->where("tb_inovasi_skpd.id_inovasi_skpd", $id)->get()->getResult();

        if ($builder[0]) {
            $data = [
                'id_inovasi_skpd' => $builder[0]->id_inovasi_skpd,
                'judul_inovasi' => $builder[0]->judul_inovasi,
                'jenis_inovasi' => $builder[0]->jenis_inovasi,
                'tahun_inovasi' => $builder[0]->tahun_inovasi,
                'latar_belakang' => $builder[0]->latar_belakang,
                'tujuan' => $builder[0]->tujuan,
                'manfaat' => $builder[0]->manfaat,
                'status' => $builder[0]->status,
                'progress' => $builder[0]->progress,
                'id_skpd' => $builder[0]->id_skpd,
                'nama_skpd' => $builder[0]->nama_skpd,
            ];
            return view('Landing/inovasiSKPDDetail', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function InovasiMasyarakat()
    {
        return view('Landing/inovasiMasyarakat');
    }

    public function InovasiMasyarakatDetail($id = null)
    {
        $model = new \App\Models\KreativitasMasyarakat();
        $data = $model->find($id);
        if ($data) {
            return view('Landing/inovasiMasyarakatDetail', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }


    public function KebutuhanRiset()
    {
        return view('Landing/kebutuhanRiset');
    }

    public function KebutuhanRisetDetail($id = null)
    {
        $model = new \App\Models\KebutuhanRiset();
        $data = $model->find($id);
        if ($data) {
            return view('Landing/kebutuhanRisetDetail', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function LembagaPenelitian()
    {
        return view('Landing/lembagaPenelitian');
    }

    public function LembagaPenelitianDetail($id = null)
    {
        $model = new \App\Models\LembagaPenelitian();
        $data = $model->find($id);
        if ($data) {
            return view('Landing/lembagaPenelitianDetail', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function SKPD()
    {
        return view('Landing/skpd');
    }

    public function SKPDDetail($id = null)
    {
        $model = new \App\Models\SKPD();
        $data = $model->find($id);
        if ($data) {
            return view('Landing/skpdDetail', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function Peneliti()
    {
        return view('Landing/peneliti');
    }


    public function PenelitiDetail($id = null)
    {
        $db = db_connect();
        $builder = $db->table('tb_peneliti')->select('id_peneliti, nama_peneliti, gelar_peneliti, pendidikan_peneliti, alamat_peneliti, email_peneliti, tb_peneliti.id_lembaga_penelitian, nama_lembaga')->join('tb_lembaga_penelitian', 'tb_lembaga_penelitian.id_lembaga_penelitian = tb_peneliti.id_lembaga_penelitian')->where('id_peneliti', $id)->get()->getResult();

        $data = [
            'id_peneliti' => $builder[0]->id_peneliti,
            'nama_peneliti' => $builder[0]->nama_peneliti,
            'gelar_peneliti' => $builder[0]->gelar_peneliti,
            'pendidikan_peneliti' => $builder[0]->pendidikan_peneliti,
            'alamat_peneliti' => $builder[0]->alamat_peneliti,
            'email_peneliti' => $builder[0]->email_peneliti,
            'id_lembaga_penelitian' => $builder[0]->id_lembaga_penelitian,
            'nama_lembaga' => $builder[0]->nama_lembaga,
        ];
        if ($data) {
            return view('Landing/penelitiDetail', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function Penelitian()
    {
        return view('Landing/penelitian');
    }

    public function PenelitianDetail($id = null)
    {
        $db = db_connect();
        $builder = $db->table('tb_penelitian')->select('id_penelitian, jenis_penelitian, judul_penelitian, tahun_penelitian, abstrak_penelitian, peneliti, nama_lembaga, status, waktu_pelaksanaan, progress')->join('tb_lembaga_penelitian', 'tb_lembaga_penelitian.id_lembaga_penelitian = tb_penelitian.id_lembaga_penelitian')->where('id_penelitian', $id)->get()->getResult();

        $data = [
            'id_penelitian' => $builder[0]->id_penelitian,
            'jenis_penelitian' => $builder[0]->jenis_penelitian,
            'judul_penelitian' => $builder[0]->judul_penelitian,
            'tahun_penelitian' => $builder[0]->tahun_penelitian,
            'abstrak_penelitian' => $builder[0]->abstrak_penelitian,
            'peneliti' => $builder[0]->peneliti,
            'nama_lembaga' => $builder[0]->nama_lembaga,
            'status' => $builder[0]->status,
            'waktu_pelaksanaan' => $builder[0]->waktu_pelaksanaan,
            'progress' => $builder[0]->progress,
        ];
        if ($data) {
            return view('Landing/penelitianDetail', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function Profil()
    {
        return view('Landing/profil');
    }
}
