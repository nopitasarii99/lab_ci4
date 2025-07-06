💻 Praktikum PHP Framework (CodeIgniter 4)

Repositori ini berisi panduan praktikum untuk memahami dan menerapkan framework **CodeIgniter 4**, mulai dari pengenalan konsep dasar hingga membangun aplikasi sederhana dengan fitur **CRUD**.

---

# Praktikum 1

1. Mengaktifkan Ekstensi di

```bash
  php.ini
```

Berikut adalah ekstensi PHP yang harus diaktifkan:

1. php-json → Diperlukan untuk bekerja dengan JSON.
2. php-mysqlnd → Native driver untuk MySQL.
3. php-xml → Diperlukan untuk bekerja dengan XML.
4. php-intl → Diperlukan untuk mendukung aplikasi multibahasa.
5. libcurl (opsional) → Diperlukan jika ingin menggunakan Curl.

##

Buka xampp file Config

```bash
  php.ini
```

Pastikan ekstensi berikut tidak dikomentari (hilangkan tanda ; di depannya jika ada):

```bash
extension=json
extension=mysqli
extension=xml
extension=intl
extension=curl
```

![Hasil Serve](https://github.com/user-attachments/assets/7b776fc9-39ba-4606-95f4-3ee96a82859c)

## Instalasi

### 1. Instalasi CodeIgniter

Instalasi dengan cara manual:

1. Unduh CodeIgniter → (https://codeigniter.com/download)
2. Extrak file zip Codeigniter ke direktori htdocs/Lab7Web
3. Ubah nama direktory framework-4.x.xx menjadi ci4.
4. Menjalankan CLI XAMPP
   Arahkan direktori sesuai dengan project → (xampp/htdocs/Lab7Web/ci4/)
   Perintah yang dapat dijalankan untuk memanggil CLI Codeigniter adalah: php spark serve Meluncurkan server pengembangan bawaan, Memungkinkan melihat aplikasi di browser (http://localhost:8080).

### 2. Menjalankan CLI XAMPP

- Arahkan direktori sesuai dengan project → (xampp/htdocs/Lab7Web/ci4/)
- Perintah yang dapat dijalankan untuk memanggil CLI Codeigniter adalah: php spark serve Meluncurkan server pengembangan bawaan, Memungkinkan melihat aplikasi di browser (http://localhost:8080).

![Screenshot 2025-06-12 180638](https://github.com/user-attachments/assets/8f655722-403f-4b22-88c1-73a58ae0e353)
![Hasil Serve](https://github.com/user-attachments/assets/7b776fc9-39ba-4606-95f4-3ee96a82859c)

### 3. Mengaktifkan Mode Debugging

Fitur debugging dari CodeIgniter 4 untuk memudahkan developer untuk mengetahui pesan error apabila terjadi kesalahan dalam membuat kode program. Mengaktifkan mode debugging dengan mengubah niai konfigurasi pada file
`env`, cari variable `CI_ENVIRONMENT` ubah menjadi `development`

![Debug Config](https://github.com/user-attachments/assets/d8d3827e-69f4-43eb-bff3-c11caffe17ff)

Kemudian rename nama file `env → .env`

Contoh Error yang terjadi ketika menghapus function pada file app/Controller/Home.php

![Error Sample](https://github.com/user-attachments/assets/def8f63d-ed58-4707-b2d4-d57d29815e5e)

![image](https://github.com/user-attachments/assets/33ba4c9c-e603-4854-a916-273b256e188c)


## 4. Routing dan Controllers

Routing dalam CodeIgniter 4 adalah proses yang menghubungkan permintaan (request) dari pengguna ke Controller yang sesuai untuk diproses. Routing ini memungkinkan kita menentukan bagaimana URL diterjemahkan menjadi aksi dalam aplikasi, sehingga setiap permintaan dapat diarahkan dengan benar.

#### Membuat Route baru (autoRoute(false)):

Secara default fitur autoRoute sudah aktif. Untuk mengubah status autoroute dapat mengubah nilai variabelnya. Untuk menonaktifkan ubah nilai true menjadi false. Nonaktifkan Auto Routing `($routes->setAutoRoute(false);)` ketika menjalankan di production.

tambahkan kode berikut dalam **app/Config/Routes.php**

![image](https://github.com/user-attachments/assets/47448e29-fbfa-4c8f-bfc6-d37e0c0e3c99)


Untuk mengetahui route yang ditambahkan sudah benar, buka CLI dan jalankan perintah `php spark routes:`

![Route Output](https://github.com/user-attachments/assets/82bf7eeb-4988-42d4-ba21-1bf7f22f3ebc)


### Membuat Controllers:

tambahkan code berikut dalam **app/Controllers/Page.php**

#![Screenshot 2025-06-12 185420](https://github.com/user-attachments/assets/ee5eda62-a186-4150-b7e5-ab6ecb0a78d4)


### 5. Membuat View

1. Buat File app/Views/about.php dan ubah method about pada class Controller Page
2. Tambahkan code pada ke 4 file diatas:

![Screenshot 2025-06-12 185742](https://github.com/user-attachments/assets/c47167a6-5df6-40ba-9ae9-72522fc8f486)
![image](https://github.com/user-attachments/assets/00197742-46fb-4851-8b7b-7a98700d4ee8)


### 6. Membuat Layout

1. Buat direktori template pada direktori view kemudian buat file header.php dan footer.php Kemudian ubah file app/view/about.php seperti berikut.
   ![image](https://github.com/user-attachments/assets/adab12c9-e0df-4711-aec0-41ec74d49ab7)

   ![image](https://github.com/user-attachments/assets/95d03bd9-2a01-4c3d-ae7a-693a16696e0d)


2. buat di file `style.css` di dalam direktori public
   ![image](https://github.com/user-attachments/assets/62db5213-2d03-4423-b1a8-3fdaef9be076)


### 7. Hasil Output

![Screenshot 2025-06-14 084055](https://github.com/user-attachments/assets/bf4ec20a-285d-43c9-8540-59cfdc393640)


---


# Praktikum 2

### Membuat Database dan Tabel

![Screenshot 2025-06-14 084948](https://github.com/user-attachments/assets/b3cfa74d-52b6-44da-8365-1934d5b3a668)

### Config Koneksi Database

Lakukan Config untuk menghubungkan dengan database server pada file `.env`

![image](https://github.com/user-attachments/assets/88e40d4f-b893-4f83-b388-f6a1ea2ea2da)

### Membuat Artikel Model

Model ini menentukan hubungan antar data dan bagaimana data dapat diakses serta dimanipulasi. Membuat model untuk mengakses data artikel `app/Models`

![image](https://github.com/user-attachments/assets/2b739094-dcbe-49b4-9bc0-863ef848c402)


### Membuat Controller

Pada direktori `app/Controllers/Artikel.php` buat Controller pada func index

![image](https://github.com/user-attachments/assets/be2ebcc3-a881-42a2-bf8c-7a673938e66b)

### Tambahkan route untuk artikel Pada `Routes.php`

```routes
$routes->get('/artikel', 'Artikel::index');
```

### Membuat View 
Buat direktori baru dengan nama artikel pada direktori app/views, kemudian buat file baru 
dengan nama index.php.  

![Screenshot 2025-06-14 091517](https://github.com/user-attachments/assets/87771180-43e4-4207-8421-5a5b0a25cdd2)

Belum ada data yang diampilkan. Kemudian coba tambahkan beberapa data pada database agar 
dapat ditampilkan datanya. 
```dataArtikel
INSERT INTO artikel (judul, isi, slug) VALUES  
(
    'Artikel pertama',
    'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf.',
    'artikel-pertama'
),  
(
    'Artikel kedua',
    'Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun.',
    'artikel-kedua'
);
```

Refresh kembali browser, sehingga akan ditampilkan hasilnya.
![image](https://github.com/user-attachments/assets/27c5437b-2c18-4493-978c-c48b0e81a132)


### Membuat Tampilan Detail Artikel

1. Tambahkan fungsi baru pada Controller Artikel dengan nama view().

  ```view()
  public function view($slug)
  {
      $model = new ArtikelModel();
      $artikel = $model->where([
          'slug' => $slug
      ])->first();
  
      // Menampilkan error apabila data tidak ada
      if (!$artikel) {
          throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
      }
  
      $title = $artikel['judul'];
      return view('artikel/detail', compact('artikel', 'title'));
  }
  ```

2. Membuat View Detail 
Buat view baru untuk halaman detail dengan nama app/views/artikel/detail.php.
![image](https://github.com/user-attachments/assets/409e9aa3-f1a3-4765-befb-706f0a6ecab4)

3. Membuat Routing untuk artikel detail 
Buka Kembali file app/config/Routes.php, kemudian tambahkan routing untuk artikel detail. 
```routes
   **$routes->get('page/artikel/(:any)', 'Page::artikel/$1');**
```

3. Hasil
   ![image](https://github.com/user-attachments/assets/a1493656-5bc6-4e16-a346-8df0744f924e)


### Membuat Menu Admin

1.  Membuat Method baru pada Controllers `app/Controllers/Artikel.php` dengan nama **admin_index()**
    ```admin_index
        public function admin_index()  
    { 
        $title = 'Daftar Artikel'; 
        $model = new ArtikelModel(); 
        $artikel = $model->findAll(); 
        return view('artikel/admin_index', compact('artikel', 'title')); 
    }
    ```

2.  Menuju direktori `app/Views` lalu buat **admin_index.php**
    ![Screenshot 2025-06-14 101021](https://github.com/user-attachments/assets/32db06ab-e15b-4b67-928d-7335829505c9)

    
3.  Tambah routes di `app/Config/Routes.php` untuk menu admin
    ```routes
    $routes->group('admin', function($routes) {
      $routes->get('artikel', 'Artikel::admin_index');
      $routes->add('artikel/add', 'Artikel::add');
      $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
      $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
    });
    ```

4.  Hasil Output
    ![image](https://github.com/user-attachments/assets/4226ff85-10fd-4706-b3c5-13eed3526c1d)


### Menambah Data Artikel

1. Menambah Func baru pada `app/Controllers/Artikel.php dengan nama **Add()**

   ![image](https://github.com/user-attachments/assets/f60c5a28-b2c5-4d3a-9ab4-6dd31ac20dfc)


2. Buat **form_add.php** di `app/Views/artikel` untuk form tambah artikel
   ![image](https://github.com/user-attachments/assets/8c441bd1-0fe0-4665-9ab7-de32e91547bb)


3. Hasil Output
   ![image](https://github.com/user-attachments/assets/c3d04df1-20f0-4561-87ea-c297c4e9e8f9)
    ![image](https://github.com/user-attachments/assets/6d6546fc-ee62-4fa4-8aca-d94c6d914972)


### Edit Data

1. Menambahkan func baru pada `app/Controllers/Artikel.php` dengan nama **edit($id)**

   ![image](https://github.com/user-attachments/assets/d6c09c46-8995-47b9-87d6-d63cd721f48f)


2. Buat `form_edit.php` di `app/Views/artikel` untuk form edit artikel
   ![image](https://github.com/user-attachments/assets/86ba4a0c-b7a7-4163-a023-d74db9de6878)


3. Hasil Output
   ![image](https://github.com/user-attachments/assets/0e826be9-d110-4da8-90c0-be6cf6bb0243)
   ![image](https://github.com/user-attachments/assets/94164103-c976-4919-afc6-d17e20b3f071)



### Menghapus Data

1. Tambah Func baru pada `app/Controllers/Artikel.php` dengan nama **delete($id)**

   ![image](https://github.com/user-attachments/assets/7b5751bc-a921-4ccb-a995-47b051960da1)

2. Hasil Output "artikel ketiga" terhapus
![image](https://github.com/user-attachments/assets/22ee82c4-2889-4641-aec1-fc09881c37f2)


# Praktikum 3

### Membuat Layout Utama 
Buat folder layout di dalam app/Views/ dan buat file main.php di dalamnya
![image](https://github.com/user-attachments/assets/0a10c63d-a916-4342-a42e-fb8659384c91)

### Ubah app/Views/home.php agar sesuai dengan layout baru
```home
<?= $this->extend('layout/main') ?> 
 
<?= $this->section('content') ?> 
 
<h1><?= $title; ?></h1>  
<hr>  
<p><?= $content; ?></p>  
 
<?= $this->endSection() ?>
```

### Membuat Class View Cell

Membuat Direktori Cells di dalam `app` lalu buat file `Artikel.php` pada `app/Cells`
```cells
<?php

namespace App\Cells;

use CodeIgniter\View\Cell;
use App\Models\ArtikelModel;

class ArtikelTerkini extends Cell
{
    public function render()
    {
        $model = new ArtikelModel();
        $artikel = $model->orderBy('created_at', 'DESC')
                         ->limit(5)
                         ->findAll();

        return view('components/artikel_terkini', [
            'artikel' => $artikel
        ]);
    }
}
```


### Membuat View untuk View Cells

Buat folder components di dalam app/Views/ 
Buat file artikel_terkini.php di dalam app/Views/components/ dengan kode berikut:
![image](https://github.com/user-attachments/assets/dbd7c9f9-b6d0-4a6f-a320-9ad32b6bb93b)

### Jawaban dari Pertanyaan dan Tugas
View Layout adalah elemen tata letak (seperti StackLayout, Grid, AbsoluteLayout) yang digunakan untuk menyusun dan mengatur posisi elemen-elemen UI (View) di layar.

Manfaat utamanya:

Pengaturan UI yang fleksibel: Memungkinkan pengembang menyusun elemen dengan tata letak horizontal, vertikal, atau grid sesuai kebutuhan.
Respon terhadap berbagai ukuran layar: Layout memudahkan desain UI yang adaptif dan responsif.
Pengelompokan elemen: Memungkinkan pengelompokan logis elemen

Perbedaan antara View dan ViewCell
Fungsi utama view Menampilkan elemen UI seperti Label, Image, Button
Fungsi utama ViewCell Membungkus View agar dapat digunakan sebagai item dalam daftar


# Praktikum 4

### Modul Login

1. Buat Table Baru dengan nama 'users'
   ![image](https://github.com/user-attachments/assets/c11177e6-63a8-4340-9279-e1109ffe8628)

2. Membuat Model User
   Buat file baru pada direktori `app/Models` dengan nama `UserModel.php`
   ![image](https://github.com/user-attachments/assets/9712ac2d-7b38-40fa-8ec3-289088b581a5)

3. Membuat Controller User
   Buat Controller baru dengan nama `User.php` pada direkdirektori app/Controllers. Kemudian tambahkan method **index()** untuk
   menampilkan daftar user dan method **login()** untuk proses login
   ![image](https://github.com/user-attachments/assets/85676052-c316-4ea4-9bf5-b236a80dd7e8)

4. Membuat Halaman Login
   Buat direktori baru pada `app/Views` dengan nama `user` kemudian buat file di dalamnya dengan nama `login.php`
   lalu tambahkan code berikut ini
   ![image](https://github.com/user-attachments/assets/7339388e-41bb-4868-8740-9b037707c3d3)

5. Membuat Database Seeder
   Database seeder digunakan untuk membuat data dummy. Untuk keperluan ujicoba modul
   login, kita perlu memasukkan data user dan password kedaalam database. Untuk itu buat
   database seeder untuk tabel user. Buka CLI, kemudian tulis perintah berikut:
   **cd C:\xampp\htdocs\lab7_web\ci4**
   **php spark make:seeder UserSeeder**
   ![image](https://github.com/user-attachments/assets/d1230284-32d7-40c1-919a-89b0ce616c8e)


   Selanjutnya, buka file `UserSeeder.php` yang berada di lokasi direktori
   `/app/Database/Seeds/UserSeeder.php` kemudian isi dengan kode berikut:
   ![image](https://github.com/user-attachments/assets/88a4bb42-355b-4259-b4e2-259c2cd81dd3)


   Selanjutnya buka kembali Terminal atau CLI dengan shortcut **ctrl+Shift+`** lalu ketikan perintah berikut

   ```php spark db:seed UserSeeder```
   
   ![image](https://github.com/user-attachments/assets/cc2a86a3-6297-4d51-b801-78cd42380610)

7. Tambahkan route untuk login
   ```route
   $routes->get('user', 'User::index');
   $routes->group('user', function($routes) {
      $routes->get('login', 'User::login');
      $routes->post('login', 'User::login');
      $routes->get('logout', 'User::logout');
   });
   ```

8. Lakukan uji coba login
   Buka url `http://localhost:8080/user/login`
   ![image](https://github.com/user-attachments/assets/c18d1370-5bd5-4301-b295-6b8276cde352)

9. Menambahkan Auth Filter
   Buat file untuk halaman admin dengan nama `Auth.php` pada `app/Filters` lalu isi kode ini
   ![image](https://github.com/user-attachments/assets/80e7aaa0-d84a-460e-8e90-f02f56ae2ddc)

10. Buka `app/Config/Filters.php` untuk menambahkan kode berikut ini
   ![image](https://github.com/user-attachments/assets/0fa7f1f6-ac84-4b23-97bd-093450d3fa44)

11. Buka `app/Config/Routes.php` kemudian ubah routes menjadi seperti ini
   ![image](https://github.com/user-attachments/assets/e12fb778-a219-4f89-9a4b-7520ad9933bf)

12. Tambahkan Function Logout pada app/Controller/User.php
    ```logout
    public function logout()
      {
          session()->destroy();
          return redirect()->to('/user/login');
      }
      ```

13. Hasil
    ![image](https://github.com/user-attachments/assets/5b9d7117-2c0c-4e36-a7e0-a1f3f535fc94)


# Praktikum 5

## Pagination & Search Bar

1. Buka `app/Controller/Artikel.php` untuk memodifikasi codingan berikut ini
   ![image](https://github.com/user-attachments/assets/4f5db0b2-cc56-4550-bd49-182a87886dfc)

   Kemudian buka file views/artikel/admin_index.php dan tambahkan kode berikut dibawah deklarasi tabel data.
   `<?= $pager->links(); ?>`
   ![image](https://github.com/user-attachments/assets/7e509250-6e71-461d-b6e3-8ebba24c00e9)
   ![image](https://github.com/user-attachments/assets/9b7b76f0-fc50-4292-8ecc-60f29540cbcf)

3. Untuk membuat Search Bar buka kembali `app/Controller/Artikel.php` lalu modifikasi codingan berikut ini
   ![image](https://github.com/user-attachments/assets/9e9618f9-690b-4758-9332-22db4ad4e68c)

4. Buka `app/Views/artikel/admin_index.php` lalu tambahkan codingan berikut
   ![image](https://github.com/user-attachments/assets/ed8d97a7-4c65-405b-a2b0-74cd81cc73c4)

5. Tambahkan link pager pada bagian bawah deklarasi tabel seperti berikut ini
   ![image](https://github.com/user-attachments/assets/62622a31-5acc-4562-8d5f-f9c7e0e9447e)

6. Hasil

   ![image](https://github.com/user-attachments/assets/8b515dac-a0e4-4b27-851b-593b5fe0ed10)


# Praktikum 6

## Upload File Gambar

1. Buka direktori `app/Controller/Artikel.php` lalu edit code menjadi seperti ini

   ![image](https://github.com/user-attachments/assets/70ef8463-d46c-45cd-8b51-6fa26e4945bb)

2. Lalu pada `app/Views/form_add.php` tambahkan kode berikut

   ![image](https://github.com/user-attachments/assets/073ed160-52bc-414c-b4b2-4afca31cca90)

   ![image](https://github.com/user-attachments/assets/47d54d8e-3e25-4b9a-882f-92e8ad99b1ed)

3. Hasil

![image](https://github.com/user-attachments/assets/24d08d71-dba1-4e81-bcc6-06d1c591bf0f)


# Praktikum 7

###  Membuat Tabel Kategori 

```querysql
CREATE TABLE kategori (
    id_kategori INT(11) AUTO_INCREMENT,
    nama_kategori VARCHAR(100) NOT NULL,
    slug_kategori VARCHAR(100),
    PRIMARY KEY (id_kategori)
);
```

### Mengubah Tabel Artikel 
Tambahkan foreign key `id_kategori` pada tabel `artikel` untuk membuat relasi dengan tabel `kategori`.  
![image](https://github.com/user-attachments/assets/59d5bf6c-5930-4a09-950b-182dacf901d9)


### Membuat Model Kategori 
![image](https://github.com/user-attachments/assets/bf5f1458-d857-4d75-9bf8-2c25c8bc1d27)

### Memodifikasi Model Artikel 
![image](https://github.com/user-attachments/assets/1f509be1-ee0e-4175-b4f3-8ebfae602dbd)

### Memodifikasi Controller Artikel 
![image](https://github.com/user-attachments/assets/3fef0014-bc7d-4196-bcc7-d998b5b3f9d7)

### Memodifikasi View index.php, admin_index.php, form_add.php, form_edit.php, 
![image](https://github.com/user-attachments/assets/cb4749bf-a30d-46f7-8368-ff637123b654)

![image](https://github.com/user-attachments/assets/57f2c33b-cc2a-41a5-a018-d195d3e8204d)

### Hasil Run
![image](https://github.com/user-attachments/assets/352769aa-266f-4764-90f5-13bdf1e67c6d)



# Praktikum 8

### Menambahkan Pustaka jQuery

![image](https://github.com/user-attachments/assets/8f648c87-acf8-40bf-9f12-8b24a8ce58b3)

### Membuat Ajax Controller

![image](https://github.com/user-attachments/assets/b187b07a-23be-48c9-a06f-edfa57428d3a)

### Membuat View 

![image](https://github.com/user-attachments/assets/a3a13984-ec28-4b52-9761-2de504613dc1)

### Membuat Routes

![image](https://github.com/user-attachments/assets/25f19cec-6885-41b0-a823-639a2a5dc4c1)

### Hasil

1. routes `$routes->get('admin/ajax', 'AjaxController::index');`
   ![image](https://github.com/user-attachments/assets/ef57958c-b0c4-411a-b5f7-2425d1302ffe)


2. routes `$routes->get('ajax/getData', 'AjaxController::getData');`
   ![image](https://github.com/user-attachments/assets/ef4d6373-a20c-4067-a30a-5391c0e1c104)


# Praktikum 9

### Membuat Ajax Search Bar & Pagination

1. Edit Method _admin_index()_ seperti ini
   ![image](https://github.com/user-attachments/assets/e4b0bf3c-9490-4659-bfdd-f52932cd018b)

2. Edit file `admin_ajax.php` menjadi seperti ini
   ![image](https://github.com/user-attachments/assets/0a6c961a-c016-45d7-ab62-94adb3beae05)


3. Hasil
   ![image](https://github.com/user-attachments/assets/efd32fdd-6472-4023-ab69-eb99a8aeb723)



# Praktikum 10
### API

  1. Unduh aplikasi REST Client, ada banyak aplikasi yang dapat digunakan untuk keperluan tersebut. disini kita akan unduh postman di ``` https://www.postman.com/downloads/ ```
  2. Membuat Model.
     Pada modul sebelumnya sudah dibuat ArtikelModel, pada modul ini kita akan memanfaatkan model tersebut agar dapat diakses melalui API. 
     
  3. Membuat REST Controller
     REST Controller yang berisi fungsi untuk menampilkan, menambah, mengubah dan menghapus data. Caranya buat file ``Post.php`` di ``app/Controller`` dengan code seperti ini
     
     ![Screenshot 2025-06-22 070110](https://github.com/user-attachments/assets/69cf473c-f69c-44e1-a631-280c1bec85f0)

  4. Membuat Routing REST API
     Masuk ke direktori app/Config dan bukalah file Routes.php. Tambahkan kode ``` $routes->resource('post');  ```
  5. Lalu cek route nya jalankan perintah ``` php spark routes ``` di cmd.
     Satu baris kode routes yang di tambahkan akan menghasilkan banyak Endpoint seperti pada gambar dibawah ini.

     ![image](https://github.com/user-attachments/assets/e6331de5-8161-4fee-a09f-380d221afc6c) 
     

## Testing Rest API 

  1. Buka aplikasi postman dan pilih create new → HTTP Request
     ![image](https://github.com/user-attachments/assets/57ead6d7-b4b5-4540-baee-fd7bced09af4)


  2. Menampilkan Semua Data
     
     Pilih method GET dan masukkan URL berikut:
     ``` http://localhost:8080/post ```

     lalu klik send
     ![image](https://github.com/user-attachments/assets/e43abbf6-4042-466f-8f26-89d62e920acc)

     ![image](https://github.com/user-attachments/assets/ab7e1bdb-27ec-463d-aaf0-976788f80144)

  3. Menampilkan Data Spesifik
     Masih menggunakan method GET, hanya perlu menambahkan ID artikel di belakang URL seperti ``` http://localhost:8080/post/2  ```
     Selanjutnya, klik Send.
     ![image](https://github.com/user-attachments/assets/3f8aefef-1897-4348-9b27-aacebafdf91b)

  4. Mengubah data
  
      Untuk mengubah data, silakan ganti method menjadi PUT. Kemudian, masukkan URL artikel
      yang ingin diubah. Misalnya, ingin mengubah data artikel dengan ID nomor 2, maka masukkan
      URL berikut:
     
      ``` http://localhost:8080/post/1 ```
     
      Selanjutnya, pilih tab Body. Kemudian, pilih x-www-form-uriencoded. Masukkan nama
      atribut tabel pada kolom KEY dan nilai data yang baru pada kolom VALUE. Kalau sudah,
      klik Send.

      ![image](https://github.com/user-attachments/assets/26035c0b-9459-440c-b012-a817f1bf1894)


  5. Menambah Data
     
      Anda perlu menggunakan method POST untuk menambahkan data baru ke database.
      Kemudian, masukkan URL berikut:
     
      ``` http://localhost:8080/post ```
     
      Pilih tab Body, lalu pilih x-www-form-uriencoded. Masukkan atribut tabel pada kolom KEY
      dan nilai data baru di kolom VALUE. Jangan lupa, klik Send.
     
      ![image](https://github.com/user-attachments/assets/a2360ec1-a876-41b6-8d0c-b5aa04e31c85)

     ### Berhasil Ditambahkan
     
      ![image](https://github.com/user-attachments/assets/fc891b0a-8246-4b79-92f3-c62b503bbef9)


  7. Menghapus Data
      Pilih method DELETE untuk menghapus data. Lalu, masukkan URL spesifik data mana yang
      ingin di hapus. Misalnya, ingin menghapus data nomor 3, maka URL-nya seperti ini:
     
      http://localhost:8080/post/3
     
      Langsung Send

       ![image](https://github.com/user-attachments/assets/c01184d2-116d-4ef6-b3fe-6268b4e16739)

      ### Berhasil Terhapus
     
      ![image](https://github.com/user-attachments/assets/10d7e78f-65bc-45ce-9295-54f224541413)


# Praktikum 11
### VueJS
VuesJS merupakan sebuah framework JavaScript untuk membangun aplikasi web atau tampilan interface website agar lebih interaktif. VueJS dapat digunakan untuk membangun aplikasi berbasis user interface, seperti halaman web, aplikasi mobile, dan aplikasi desktop. 

### Langkah-langkah Praktikum
Untuk memulai penggunaan framework Vuejs, dapat dialkukan dengan menggunakan npm, atau bisa juga dengan cara manual. Untuk praktikum kali ini kita akan gunakan cara manual. Yang diperlukan adalah library Vuejs, Axios untuk melakukan call API REST. Menggunakan CDN.
Library VueJS 
``` <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>  ```
Library Axios 
``` <script src="https://unpkg.com/axios/dist/axios.min.js"></script> ```

### Struktur Direktory 
Buat Project baru dengan struktur file dan directory seperti berikut: 
 ```struktur
│   index.html 
└───assets 
    ├───css 
    │       style.css 
    └───js 
            app.js 
```

### Menampilkan data 
### File index.html 


### File apps.js 


### Sispkan kode Form Tambah dan Ubah Data Pada file index,html


### Pada File app.js lengkapi kodenya. 


### File style.css





