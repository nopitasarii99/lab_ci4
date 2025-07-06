<?= $this->include('template/admin_header'); ?> 

<h2><?= $title; ?></h2> 

<form action="" method="post"> 
    <p> 
        <label for="judul">Judul</label><br> 
        <input type="text" name="judul" id="judul" value="<?= esc($artikel['judul']); ?>" class="form-control" required> 
    </p> 

    <p> 
        <label for="isi">Isi</label><br> 
        <textarea name="isi" id="isi" cols="50" rows="10" class="form-control"><?= esc($artikel['isi']); ?></textarea> 
    </p> 

    <p> 
        <label for="id_kategori">Kategori</label><br> 
        <select name="id_kategori" id="id_kategori" class="form-control" required> 
            <?php foreach ($kategori as $k): ?> 
                <option value="<?= $k['id_kategori']; ?>" <?= ($artikel['id_kategori'] == $k['id_kategori']) ? 'selected' : ''; ?>>
                    <?= esc($k['nama_kategori']); ?>
                </option> 
            <?php endforeach; ?> 
        </select> 
    </p> 

    <p> 
        <input type="submit" value="Kirim" class="btn btn-primary"> 
    </p> 
</form> 

<?= $this->include('template/admin_footer'); ?> 
