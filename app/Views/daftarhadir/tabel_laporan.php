<!-- app/Views/daftarhadir/tabel_laporan.php -->
<pre>
<?php print_r($daftarhadir); ?>
</pre>

<?php if (!empty($daftarhadir)) : ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Tanggal</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($daftarhadir as $hadir) : ?>
                <tr>
                    <td><?= $hadir['nama']; ?></td>
                    <td><?= $hadir['nama_jabatan']; ?></td>
                    <td><?= date('d-m-Y', strtotime($hadir['tgl'])); ?></td>
                    <td><?= $hadir['jam_mulai']; ?></td>
                    <td><?= $hadir['jam_selesai']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Tidak ada data ditemukan pada rentang tanggal tersebut.</p>
<?php endif; ?>