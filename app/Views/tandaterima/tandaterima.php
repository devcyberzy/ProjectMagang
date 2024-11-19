<?= $this->extend('menu'); ?>

<?= $this->section('isi') ?>
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data">
                    <i class="fas fa-plus"> Add Data</i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Filter Periode Tanggal -->


            <?php if (session()->getFlashdata('pesan')) : ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '<?= session()->getFlashdata('pesan'); ?>',
                        timer: 1250
                    });
                </script>
            <?php endif; ?>
            <?php $errors = session()->getFlashdata('errors');
            if (!empty($errors)) : ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: '<ul><?php foreach ($errors as $error) : ?><li><?= esc($error) ?></li><?php endforeach; ?></ul>',
                        timer: 1250
                    });
                </script>
            <?php endif; ?>

            <!-- Tabel Data -->
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
                        <th>TANGGAL</th>
                        <th width="100px">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($tandaterima as $value) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $value['nama_peg'] ?></td>
                            <td class="text-center"><?= $value['nama_jab'] ?>/<?= $value['nama_gol'] ?></td>
                            <td class="text-center"><?= number_format($value['satuan'], 0) ?></td>
                            <td class="text-center"><?= $value['vol'] ?></td>
                            <td class="text-center"><?= number_format($value['jml'], 0) ?></td>
                            <td class="text-center"><?= number_format($value['pph'], 0) ?></td>
                            <td class="text-center"><?= number_format($value['jml_setelah_pajak'], 0) ?></td>
                            <td class="text-center"><?= $value['tgl'] ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-data<?= $value['id_tandaterima'] ?>">
                                    <i class="fas fa-edit" style="color:wheat"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-data<?= $value['id_tandaterima'] ?>">
                                    <i class="fas fa-trash-alt" style="color:wheat"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Add Data -->
<div class="modal fade" id="add-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('TandaTerima/InsertData') ?>
            <div class="modal-body">
                <!-- Form Input Data -->
                <div class="form-group">
                    <label>NAMA</label>
                    <select name="id_peg" class="form-control" required>
                        <option value="">--Pilih Nama--</option>
                        <?php foreach ($datapegawai as $value) : ?>
                            <option value="<?= $value['id_peg'] ?>"><?= $value['nama_peg'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>JABATAN</label>
                    <select name="id_jab" class="form-control" required>
                        <option value="">--Pilih Jabatan--</option>
                        <?php foreach ($jabatan as $value) : ?>
                            <option value="<?= $value['id_jab'] ?>"><?= $value['nama_jab'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>PANGKAT/GOL</label>
                    <select name="id_gol" class="form-control" required>
                        <option value="">--Pilih Golongan--</option>
                        <?php foreach ($golongan as $value) : ?>
                            <option value="<?= $value['id_gol'] ?>"><?= $value['nama_gol'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>SATUAN</label>
                    <input name="satuan" id="satuan" value="<?= old('satuan') ?>" class="form-control" placeholder="SATUAN" oninput="calculate()">
                </div>
                <div class="form-group">
                    <label>VOL</label>
                    <input type="number" name="vol" id="vol" class="form-control" value="<?= old('vol') ?>" placeholder="VOL" oninput="calculate()">
                </div>
                <div class="form-group">
                    <label>JUMLAH</label>
                    <input name="jml" id="jml" value="<?= old('jml') ?>" class="form-control" placeholder="JUMLAH" readonly>
                </div>
                <div class="form-group">
                    <label>PPH21</label>
                    <input name="pph" id="pph" value="<?= old('pph') ?>" class="form-control" placeholder="PPH21" readonly>
                </div>
                <div class="form-group">
                    <label>JUMLAH SETELAH PAJAK</label>
                    <input name="jml_setelah_pajak" id="jml_setelah_pajak" value="<?= old('jml_setelah_pajak') ?>" class="form-control" placeholder="JUMLAH SETELAH PAJAK" readonly>
                </div>
                <div class="form-group">
                    <label for="">TANGGAL</label>
                    <input type="date" name="tgl" class="form-control" value="<?= old('tgl') ?>" placeholder="TANGGAL" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<?php foreach ($tandaterima as $value) : ?>
    <div class="modal fade" id="edit-data<?= $value['id_tandaterima'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('TandaTerima/UpdateData/' . $value['id_tandaterima']) ?>
                <div class="modal-body">
                    <!-- Form Input Data yang sama seperti form Add Data -->
                    <div class="form-group">
                        <label>NAMA</label>
                        <select name="id_peg" class="form-control" required>
                            <option value="">--Pilih Nama--</option>
                            <?php foreach ($datapegawai as $peg) : ?>
                                <option value="<?= $peg['id_peg'] ?>" <?= $peg['id_peg'] == $value['id_peg'] ? 'selected' : '' ?>><?= $peg['nama_peg'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>JABATAN</label>
                        <select name="id_jab" class="form-control" required>
                            <option value="">--Pilih Jabatan--</option>
                            <?php foreach ($jabatan as $jab) : ?>
                                <option value="<?= $jab['id_jab'] ?>" <?= $jab['id_jab'] == $value['id_jab'] ? 'selected' : '' ?>><?= $jab['nama_jab'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>PANGKAT/GOL</label>
                        <select name="id_gol" class="form-control" required>
                            <option value="">--Pilih Golongan--</option>
                            <?php foreach ($golongan as $gol) : ?>
                                <option value="<?= $gol['id_gol'] ?>" <?= $gol['id_gol'] == $value['id_gol'] ? 'selected' : '' ?>><?= $gol['nama_gol'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SATUAN</label>
                        <input name="satuan" id="satuan_edit<?= $value['id_tandaterima'] ?>" value="<?= $value['satuan'] ?>" class="form-control autonumeric" placeholder="SATUAN" oninput="calculateEdit('<?= $value['id_tandaterima'] ?>')">
                    </div>
                    <div class="form-group">
                        <label>VOL</label>
                        <input type="number" name="vol" id="vol_edit<?= $value['id_tandaterima'] ?>" value="<?= $value['vol'] ?>" class="form-control" placeholder="VOL" oninput="calculateEdit('<?= $value['id_tandaterima'] ?>')">
                    </div>
                    <div class="form-group">
                        <label>JUMLAH</label>
                        <input name="jml" id="jml_edit<?= $value['id_tandaterima'] ?>" value="<?= $value['jml'] ?>" class="form-control autonumeric" placeholder="JUMLAH" readonly>
                    </div>
                    <div class="form-group">
                        <label>PPH21</label>
                        <input name="pph" id="pph_edit<?= $value['id_tandaterima'] ?>" value="<?= $value['pph'] ?>" class="form-control autonumeric" placeholder="PPH21" readonly>
                    </div>
                    <div class="form-group">
                        <label>JUMLAH SETELAH PAJAK</label>
                        <input name="jml_setelah_pajak" id="jml_setelah_pajak_edit<?= $value['id_tandaterima'] ?>" value="<?= $value['jml_setelah_pajak'] ?>" class="form-control autonumeric" placeholder="JUMLAH SETELAH PAJAK" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_edit<?= $value['id_tandaterima'] ?>">TANGGAL</label>
                        <input type="date" name="tgl" id="tgl_edit<?= $value['id_tandaterima'] ?>" value="<?= $value['tgl'] ?>" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>




<!-- Modal Delete Data -->
<?php foreach ($tandaterima as $value) : ?>
    <div class="modal fade" id="delete-data<?= $value['id_tandaterima'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete data for <strong><?= $value['nama_peg'] ?></strong>?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('TandaTerima/DeleteData/' . $value['id_tandaterima']) ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "paging": true,
            "info": true,
            "ordering": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    function calculate() {
        let satuan = parseFloat(document.getElementById("satuan").value.replace(/,/g, '')) || 0;
        let vol = parseFloat(document.getElementById("vol").value) || 0;
        let jml = satuan * vol;
        let pph = jml * 0.15;
        let jml_setelah_pajak = jml - pph;

        document.getElementById("jml").value = jml.toLocaleString();
        document.getElementById("pph").value = pph.toLocaleString();
        document.getElementById("jml_setelah_pajak").value = jml_setelah_pajak.toLocaleString();
    }
</script>

<script>
    new AutoNumeric('#satuan', {
        digitGroupSeparator: ',',
        decimalPlaces: 0
        // decimalCharacter: '.',
        // decimalCharacterAlternative: '.',
    });

    <?php foreach ($tandaterima as $value) : ?>
        new AutoNumeric('#satuan<?= $value['id_tandaterima'] ?>', {
            digitGroupSeparator: ',',
            decimalPlaces: 0
            // decimalCharacter: '.',
            // decimalCharacterAlternative: '.',
        });
    <?php endforeach ?>
</script>

<script>
    // Inisialisasi AutoNumeric pada elemen input numerik untuk form edit
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi AutoNumeric untuk setiap elemen yang memerlukan format angka
        const autonumericElements = document.querySelectorAll('.autonumeric');
        autonumericElements.forEach(element => {
            new AutoNumeric(element, {
                digitGroupSeparator: ',',
                decimalPlaces: 0
            });
        });
    });

    // Fungsi untuk menghitung jumlah, pph, dan jumlah setelah pajak pada form edit
    function calculateEdit(id) {
        let satuan = AutoNumeric.getAutoNumericElement(document.getElementById("satuan_edit" + id)).getNumber() || 0;
        let vol = parseFloat(document.getElementById("vol_edit" + id).value) || 0;
        let jml = satuan * vol;
        let pph = jml * 0.15;
        let jml_setelah_pajak = jml - pph;

        // Menyimpan hasil perhitungan kembali ke elemen input
        AutoNumeric.getAutoNumericElement(document.getElementById("jml_edit" + id)).set(jml);
        AutoNumeric.getAutoNumericElement(document.getElementById("pph_edit" + id)).set(pph);
        AutoNumeric.getAutoNumericElement(document.getElementById("jml_setelah_pajak_edit" + id)).set(jml_setelah_pajak);
    }
</script>



<?= $this->endSection() ?>