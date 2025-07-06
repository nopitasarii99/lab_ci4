<h3>Artikel Terkini</h3>
<ul>
    <?php if (!empty($artikel)): ?>
        <?php foreach ($artikel as $row): ?>
            <li>
                <a href="<?= base_url('/artikel/' . esc($row['slug'])) ?>">
                    <?= esc($row['judul']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>Tidak ada artikel terkini.</li>
    <?php endif; ?>
</ul>
