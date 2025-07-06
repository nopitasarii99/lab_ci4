<?= $this->include('template/admin_header'); ?> 

<h2><?= $title; ?></h2> 

<div class="row mb-3"> 
    <div class="col-md-6"> 
        <form method="get" class="form-inline"> 
            <input type="text" name="q" value="<?= $q; ?>" placeholder="Cari judul artikel" class="form-control mr-2"> 
            
            <select name="kategori_id" class="form-control mr-2"> 
                <option value="">Semua Kategori</option> 
                <?php foreach ($kategori as $k): ?> 
                    <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                        <?= $k['nama_kategori']; ?>
                    </option> 
                <?php endforeach; ?> 
            </select> 
            
            <input type="submit" value="Cari" class="btn btn-primary"> 
        </form> 
    </div> 
</div> 

<table class="table"> 
    <thead> 
        <tr> 
            <th>ID</th> 
            <th>Judul</th> 
            <th>Kategori</th> 
            <th>Status</th> 
            <th>Aksi</th> 
        </tr> 
    </thead> 
    <tbody> 
        <?php if (count($artikel) > 0): ?> 
            <?php foreach ($artikel as $row): ?> 
                <tr> 
                    <td><?= $row['id']; ?></td> 
                    <td> 
                        <b><?= $row['judul']; ?></b> 
                        <p><small><?= substr($row['isi'], 0, 50); ?>...</small></p> 
                    </td> 
                    <td><?= $row['nama_kategori']; ?></td> 
                    <td><?= $row['status']; ?></td> 
                    <td> 
                        <a class="btn btn-sm btn-info" href="<?= base_url('/admin/artikel/edit/' . $row['id']); ?>">Ubah</a> 
                        <a class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('/admin/artikel/delete/' . $row['id']); ?>">Hapus</a> 
                    </td> 
                </tr>

            <?php endforeach; ?> 
        <?php else: ?> 
            <tr> 
                <td colspan="5">Tidak ada data.</td> 
            </tr> 
        <?php endif; ?> 
    </tbody> 
</table> 

<?= $pager->only(['q', 'kategori_id'])->links(); ?> 

<?= $this->include('template/admin_footer'); ?> 
