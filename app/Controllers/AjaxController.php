<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class AjaxController extends Controller
{
    public function index()
    {
        $kategoriModel = new KategoriModel();
        $kategori = $kategoriModel->findAll();

        $data = [
            'title'       => 'Data Artikel',
            'kategori'    => $kategori,
            'q'           => $this->request->getGet('q'),
            'kategori_id' => $this->request->getGet('kategori_id'),
        ];

        return view('ajax/admin_index', $data);
    }

    public function getData()
    {
        $model = new ArtikelModel();

        $q = $this->request->getGet('q');
        $kategori_id = $this->request->getGet('kategori_id');

        $builder = $model->builder();
        $builder->select('artikel.*, kategori.nama_kategori');
        $builder->join('kategori', 'kategori.id_kategori = artikel.id_kategori');

        if ($q) {
            $builder->like('artikel.judul', $q);
        }
        if ($kategori_id) {
            $builder->where('artikel.id_kategori', $kategori_id);
        }

        $data = $builder->get()->getResultArray();

        return $this->response->setJSON($data);
    }

    public function delete($id = null)
    {
        $model = new ArtikelModel();

        if ($id === null || !$model->find($id)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ])->setStatusCode(404);
        }

        $model->delete($id);

        return $this->response->setJSON([
            'status' => 'OK'
        ]);
    }
}
