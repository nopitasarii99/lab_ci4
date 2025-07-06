<?php 
 
namespace App\Controllers; 
 
use App\Models\ArtikelModel; 
use App\Models\KategoriModel; 
 
class Artikel extends BaseController 
{ 
    public function index() 
    { 
        $title = 'Daftar Artikel'; 
        $model = new ArtikelModel(); 
        $artikel = $model->getArtikelDenganKategori(); 
 
        return view('artikel/index', compact('artikel', 'title')); 
    } 
 
    public function admin_index() 
    { 
        $title = 'Daftar Artikel (Admin)'; 
        $model = new ArtikelModel(); 

        $q = $this->request->getVar('q') ?? ''; 
        $kategori_id = $this->request->getVar('kategori_id') ?? ''; 
        $page = $this->request->getVar('page') ?? 1; 

        $builder = $model->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori');

        if ($q !== '') { 
            $builder->like('artikel.judul', $q); 
        } 

        if ($kategori_id !== '') { 
            $builder->where('artikel.id_kategori', $kategori_id); 
        }

        $artikel = $builder->paginate(10, 'default', $page); 
        $pager = $model->pager; 

        $data = [ 
            'title'       => $title, 
            'q'           => $q, 
            'kategori_id' => $kategori_id, 
            'artikel'     => $artikel, 
            'pager'       => $pager 
        ]; 

        if ($this->request->isAJAX()) { 
            return $this->response->setJSON($data); 
        } else { 
            $kategoriModel = new KategoriModel(); 
            $data['kategori'] = $kategoriModel->findAll(); 
            return view('artikel/admin_index', $data); 
        } 
    }
 
    public function add()
    {
        $validationRules = [
            'judul'       => 'required',
            'id_kategori' => 'required|integer',
            'gambar'      => [
                'label' => 'Gambar',
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,2048]', // max 2MB
                'errors' => [
                    'is_image' => 'File yang diunggah harus gambar.',
                    'mime_in'  => 'Gambar harus berformat jpg, jpeg, atau png.',
                    'max_size' => 'Ukuran gambar maksimal 2MB.'
                ]
            ]
        ];

        if ($this->request->getMethod() == 'POST' && $this->validate($validationRules)) {
            $model = new ArtikelModel();

            // Tangani file gambar
            $gambar = $this->request->getFile('gambar');
            $namaGambar = null;

            if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
                $namaGambar = $gambar->getRandomName(); // nama acak agar aman
                $gambar->move('uploads/artikel', $namaGambar); // Pastikan folder ini ada
            }

            // Simpan ke database
            $model->insert([
                'judul'       => $this->request->getPost('judul'),
                'isi'         => $this->request->getPost('isi'),
                'slug'        => url_title($this->request->getPost('judul'), '-', true),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'gambar'      => $namaGambar // pastikan field ini ada di DB
            ]);

            return redirect()->to('/admin/artikel')->with('success', 'Artikel berhasil ditambahkan.');
        } else {
            // Ambil data kategori untuk ditampilkan di form
            $kategoriModel = new KategoriModel();
            $data = [
                'title'    => 'Tambah Artikel',
                'kategori' => $kategoriModel->findAll(),
                'validation' => $this->validator // untuk menampilkan pesan error di view jika ada
            ];

            return view('artikel/form_add', $data);
        }
    }


    public function edit($id) 
    { 
        $model = new ArtikelModel(); 
        if ($this->request->getMethod() === 'post' && $this->validate([ 
            'judul'        => 'required', 
            'id_kategori'  => 'required|integer' 
        ])) { 
            $model->update($id, [ 
                'judul'       => $this->request->getPost('judul'), 
                'isi'         => $this->request->getPost('isi'), 
                'id_kategori' => $this->request->getPost('id_kategori') 
            ]); 
            return redirect()->to('/admin/artikel'); 
        } else { 
            $data['artikel'] = $model->find($id); 
            $kategoriModel = new KategoriModel(); 
            $data['kategori'] = $kategoriModel->findAll(); 
            $data['title'] = "Edit Artikel"; 
            return view('artikel/form_edit', $data); 
        } 
    } 
 
    public function delete($id) 
    { 
        $model = new ArtikelModel(); 
        $model->delete($id); 

        //reset auto increment berdasarkan id terakhir
        $db = \Config\Database::connect();
        $query = $db->query("SELECT MAX(id) AS max_id FROM artikel")->getRow();
        $nextId = ($query->max_id ?? 0) + 1;
        $db->query("ALTER TABLE artikel AUTO_INCREMENT = $nextId");
        return redirect()->to('/admin/artikel'); 
    } 
 
    public function view($slug) 
    { 
        $model = new ArtikelModel(); 
        $data['artikel'] = $model->where('slug', $slug)->first(); 
        if (empty($data['artikel'])) { 
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the article.'); 
        } 
        $data['title'] = $data['artikel']['judul']; 
        return view('artikel/detail', $data); 
    } 
}
