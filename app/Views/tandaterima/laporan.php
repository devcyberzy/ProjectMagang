<?= $this->extend('menu'); ?>
<?= $this->section('isi') ?>

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
            <div class="card-tools">
                <button type="button" onclick="NewWin=window.open('<?= base_url('TandaTerima/PrintTandaTerima/' . $tanggal_awal . '/' . $tanggal_akhir) ?>','NewWin','toolbar = yes')" class="btn btn-tool"><i class="fas fa-print"> Print</i> <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"></i> Add Data</button>
            </div>
            <!-- /.card-tools -->
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="50px">NO</th>
                        <th>NAMA</th>
                        <th>JABATAN/GOL</th>
                        <th>SATUAN</th>
                        <th>VOL</th>
                        <th>JUMLAH</th>
                        <th>PPH21</th>
                        <th>JUMLAH SETELAH PAJAK</th>
                        <th width="250">TANDA TANGAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($tandaterima as $value) : ?>
                        <tr>
                            <td class="text-center"><?= $no; ?></td>
                            <td class="text-center"><?= $value['nama_peg'] ?></td>
                            <td class="text-center"><?= $value['nama_jab'] ?>/<?= $value['nama_gol'] ?></td>
                            <td class="text-right"><?= number_format($value['satuan'], 0) ?></td>
                            <td class="text-center"><?= $value['vol'] ?></td>
                            <td class="text-right"><?= number_format($value['jml'], 0) ?></td>
                            <td class="text-right"><?= number_format($value['pph'], 0) ?></td>
                            <td class="text-right"><?= number_format($value['jml_setelah_pajak'], 0) ?></td>
                            <td class="text-left"><?= $no++; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- Bagian tanda tangan di bawah tabel -->
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-4">
                        <p>PPTK,</p>
                        <br>
                        <br>
                        <br>
                        <p><u>Siti Purwanti, S.E., M.Acc.</u></p>
                        <p>NIP. 19810518 200501 2 015</p>
                    </div>
                    <div class="col-md-4">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>INSPEKTUR DAERAH</p>
                        <p>KABUPATEN BATANG</p>
                        <br>
                        <br>
                        <br>
                        <p><u>Dr. Bambang Supriyanto, SH.M.Hum.CGCAE</u></p>
                        <p>Pembina Utama Muda</p>
                        <p>NIP. 19641214 198603 1 009</p>
                    </div>
                    <div class="col-md-4">
                        <p>BENDAHARA PENGELUARAN,</p>
                        <br>
                        <br>
                        <br>
                        <p><u>Isyana Noviana Fasa, A.Md.</u></p>
                        <p>NIP. 19851128 202012 2 002</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>