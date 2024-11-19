<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .title {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 30px;
            width: 100%;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <div class="title"><?= $judul ?></div>

    <table>
        <thead>
            <tr>
                <th width="5%">NO</th>
                <th width="25%">NAMA</th>
                <th width="20%">JABATAN/ GOL</th>
                <th width="10%">SATUAN</th>
                <th width="10%">VOL</th>
                <th width="10%">JUMLAH</th>
                <th width="10%">PPH21</th>
                <th width="10%">JUMLAH SETELAH PAJAK</th>
                <th width="250">TANDA TANGAN</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php $no1 = 1; ?>
            <?php foreach ($tandaterima as $value) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['nama_peg'] ?></td>
                    <td><?= $value['nama_jab'] ?>/<?= $value['nama_gol'] ?></td>
                    <td><?= number_format($value['satuan'], 0) ?></td>
                    <td><?= $value['vol'] ?></td>
                    <td><?= number_format($value['jml'], 0) ?></td>
                    <td><?= number_format($value['pph'], 0) ?></td>
                    <td><?= number_format($value['jml_setelah_pajak'], 0) ?></td>
                    <td class="text-left"><?= $no1++ ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 text-right">
                <p>Batang, Januari 2024</p>
                <p><b>BENDAHARA PENGELUARAN,</b></p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4 text-left">
                <p>PPTK,</p>
                <p><a href="#" class="text-decoration-none">Siti Purwanti, S.E., M.Acc.</a></p>
                <p>NIP. 19810518 200501 2 015</p>
            </div>

            <div class="col-md-4 text-center">
                <p>INSPEKTUR DAERAH</p>
                <p>KABUPATEN BATANG,</p>
            </div>

            <div class="col-md-4 text-right">
                <p><a href="#" class="text-decoration-none">Isyana Noviana Fasa, A.Md.</a></p>
                <p>NIP. 19851128 202012 2 002</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <p><b>Dr. Bambang Supriyanto, SH.M.Hum, CGCAE</b></p>
                <p>Pembina Utama Muda</p>
                <p>NIP. 19641214 198603 1 009</p>
            </div>
        </div>
    </div>

</body>

</html>