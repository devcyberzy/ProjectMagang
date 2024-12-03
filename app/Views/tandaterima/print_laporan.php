<div class="col-12 text-center">
    <hr>
    <?php
    // Pastikan tanggal_awal dan tanggal_akhir sudah diteruskan ke view
    $bulan_awal = date('F', strtotime($tanggal_awal));
    $bulan_akhir = date('F', strtotime($tanggal_akhir));
    $tahun_awal = date('Y', strtotime($tanggal_awal));
    $tahun_akhir = date('Y', strtotime($tanggal_akhir));

    // Ubah bulan dan tahun menjadi kapital
    $bulan_awal = strtoupper($bulan_awal);
    $bulan_akhir = strtoupper($bulan_akhir);
    $tahun_awal = strtoupper($tahun_awal);
    $tahun_akhir = strtoupper($tahun_akhir);

    // Logika untuk menentukan format bulan dan tahun
    if ($tahun_awal == $tahun_akhir) {
        if ($bulan_awal == $bulan_akhir) {
            $bulan_tahun = "$bulan_awal $tahun_awal";
        } else {
            $bulan_tahun = "$bulan_awal - $bulan_akhir $tahun_awal";
        }
    } else {
        $bulan_tahun = "$bulan_awal $tahun_awal - $bulan_akhir $tahun_akhir";
    }
    ?>

    <div class="text-center">
        <h4>DAFTAR PENERIMAAN LEMBUR BULAN <?= $bulan_tahun ?></h4>
    </div>
    <hr>
</div>
<div class="col-12">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr class="text-center">
                <th width="30px">NO</th>
                <th>NAMA</th>
                <th>JABATAN/GOL</th>
                <th>SATUAN</th>
                <th>VOL</th>
                <th>JUMLAH</th>
                <th>PPH21</th>
                <th>JUMLAH SETELAH PAJAK</th>
                <th width="100">TANDA TANGAN</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($tandaterima as $value) : ?>
                <tr>
                    <td class="text-center"><?= $no; ?></td>
                    <td><?= $value['nama_peg'] ?></td>
                    <td><?= $value['nama_jab'] ?>/<?= $value['nama_gol'] ?></td>
                    <td class="text-right"><?= number_format($value['satuan'], 0) ?></td>
                    <td class="text-center"><?= $value['vol'] ?></td>
                    <td class="text-right"><?= number_format($value['jml'], 0) ?></td>
                    <td class="text-right"><?= number_format($value['pph'], 0) ?></td>
                    <td class="text-right"><?= number_format($value['jml_setelah_pajak'], 0) ?></td>
                    <td class="text"><?= $no; ?></td>
                    <td></td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>

    <!-- Tanda Tangan -->
    <div class="signature-grid">
        <div class="signature-col"><br>
            <p>PPTK,</p>
            <br><br>
            <p><u>Siti Purwanti, S.E., M.Acc.</u></p>
            <span class="nip">NIP. 19810518 200501 2 015</span>
        </div>
        <div class="signature-col"><br><br><br>
            <p class="inspektur">INSPEKTUR DAERAH</p>
            <p>KABUPATEN BATANG</p>
            <br><br>
            <p><u>Dr. Bambang Supriyanto, SH.M.Hum.CGCAE</u></p>
            <span class="nip">NIP. 19641214 198603 1 009</span>
        </div>
        <div class="signature-col">
            <p style="margin-bottom: 0.5em;">BATANG, &nbsp; <?= $bulan_tahun ?></p>
            <p>BENDAHARA</p>
            <br><br>
            <p><u>Isyana Noviana Fasa, A.Md.</u></p>
            <span class="nip">NIP. 19851128 202012 2 002</span>
        </div>
    </div>

    <style>
        /* Atur grid untuk tanda tangan */
        .signature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            text-align: center;
        }

        /* Rapatkan Nama dan NIP */
        .signature-col p,
        .signature-col span {
            margin: 0;
            line-height: 1.2;
        }

        .signature-col span.nip {
            font-size: 12px;
            /* Ukuran font NIP lebih kecil */
        }

        @media print {
            @page {
                size: landscape;
                margin: 10mm;
            }

            body {
                margin: 0;
            }

            th,
            td {
                padding: 5px;
                word-wrap: break-word;
            }
        }
    </style>