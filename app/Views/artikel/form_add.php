<?= $this->include('template/admin_header'); ?>

<!-- Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>
    body {
        background-color: #F8F9FA;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #212529;
    }
    .custom-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    }
    .custom-header {
        background-color: #10375c;
        color: white;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }
    .btn-success {
        background-color:#38b000;
        border: none;
    }
    .btn-success:hover {
        background-color: #2D8600;
    }
</style>

<div class="container mt-5 mb-5">
    <div class="card custom-card">
        <div class="card-header custom-header">
            <h4 class="mb-0"><?= $title; ?></h4>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Artikel</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul artikel" required>
                </div>

                <label for="id_kategori">Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= esc($k['id_kategori']); ?>" <?= old('id_kategori') == $k['id_kategori'] ? 'selected' : ''; ?>>
                                <?= esc($k['nama_kategori']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Artikel</label>
                    <textarea class="form-control" id="isi" name="isi" rows="8" placeholder="Tulis isi artikel di sini..." required></textarea>
                </div>

                <!-- Tambahan input gambar -->
                <div class="mb-3">
                    <label for="gambar" class="form-label">Upload Gambar</label>
                    <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">Kirim Artikel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->include('template/admin_footer'); ?>
