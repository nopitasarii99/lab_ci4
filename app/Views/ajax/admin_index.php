<?= $this->include('template/admin_header'); ?>

<h2><?= esc($title) ?></h2>

<div class="row mb-3">
    <div class="col-md-6">
        <form id="filterForm" class="form-inline">
            <input type="text" name="q" id="q" value="<?= esc($q) ?>" placeholder="Cari judul artikel" class="form-control mr-2">

            <select name="kategori_id" id="kategori_id" class="form-control mr-2">
                <option value="">Semua Kategori</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id_kategori'] ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : '' ?>>
                        <?= esc($k['nama_kategori']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
</div>

<table class="table table-bordered" id="artikelTable">
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
        <!-- Data AJAX akan masuk di sini -->
    </tbody>
</table>

<script src="<?= base_url('assets/js/jquery-3.7.1.js') ?>"></script>
<script>
$(document).ready(function() {
    function showLoadingMessage() {
        $('#artikelTable tbody').html('<tr><td colspan="5">Loading data...</td></tr>');
    }

    function loadData() {
        showLoadingMessage();

        // Ambil parameter filter dari form
        var q = $('#q').val();
        var kategori_id = $('#kategori_id').val();

        $.ajax({
            url: "<?= base_url('ajax/getData') ?>",
            method: "GET",
            data: { q: q, kategori_id: kategori_id },
            dataType: "json",
            success: function(data) {
                var tableBody = '';

                if (data.length === 0) {
                    tableBody = '<tr><td colspan="5">Tidak ada data.</td></tr>';
                } else {
                    for (var i = 0; i < data.length; i++) {
                        var row = data[i];
                        var statusLabel = (row.status == "1") ? 'Published' : 'Draft';

                        tableBody += '<tr>';
                        tableBody += '<td>' + row.id + '</td>';
                        tableBody += '<td><b>' + row.judul + '</b><br><small>' + row.isi.substring(0, 50) + '...</small></td>';
                        tableBody += '<td>' + row.nama_kategori + '</td>';
                        tableBody += '<td>' + statusLabel + '</td>';
                        tableBody += '<td>';
                        tableBody += '<a href="<?= base_url('admin/artikel/edit/') ?>' + row.id + '" class="btn btn-sm btn-info">Ubah</a> ';
                        tableBody += '<a href="#" class="btn btn-sm btn-danger btn-delete" data-id="' + row.id + '">Hapus</a>';
                        tableBody += '</td>';
                        tableBody += '</tr>';
                    }
                }

                $('#artikelTable tbody').html(tableBody);
            },
            error: function() {
                $('#artikelTable tbody').html('<tr><td colspan="5">Gagal memuat data.</td></tr>');
            }
        });
    }

    // Load data saat halaman siap
    loadData();

    // Filter submit reload data tanpa reload page
    $('#filterForm').submit(function(e) {
        e.preventDefault();
        loadData();
    });

    // Hapus data dengan AJAX
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
            $.ajax({
                url: "<?= base_url('ajax/delete/') ?>" + id,
                method: "DELETE",
                success: function(data) {
                    loadData(); // reload data setelah hapus
                },
                error: function() {
                    alert('Gagal menghapus data.');
                }
            });
        }
    });
});
</script>

<?= $this->include('template/admin_footer'); ?>
