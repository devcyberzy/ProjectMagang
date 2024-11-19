<?= $this->extend('menu'); ?>

<?= $this->section('isi') ?>
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <button type="button" onclick="NewWin=window.open('<?= base_url('Datapeg/PrintDatapeg') ?>','NewWin','toolbar = yes')" class="btn btn-tool"><i class="fas fa-print"> Print</i>
                </button>
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"> Add Data</i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <!-- flashdata dengan alert -->
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
                    });
                </script>
            <?php endif; ?>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>NAMA PEMANGKU</th>
                        <th>NIP/NIPPPPK/NUPTK/NIK</th>
                        <th>PANGKAT/GOL</th>
                        <th>JABATAN</th>
                        <th>UNIT KERJA</th>
                        <th width="100px">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($datapegawai as $value) : ?>
                        <tr>
                            <th class="text-center" scope="row"><?= $no++; ?></th>
                            <td><?= $value['nama_peg'] ?></td>
                            <td><?= $value['nip'] ?></td>
                            <td><?= $value['nama_gol'] ?></td>
                            <td><?= $value['nama_jab'] ?></td>
                            <td><?= $value['unit_kerja'] ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-data<?= $value['id_peg'] ?>">
                                    <i class="fas fa-edit" style="color:wheat"></i></a>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-data<?= $value['id_peg'] ?>">
                                    <i class="fas fa-trash-alt" style="color:wheat"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Modal Add Data -->
<div class="modal fade" id="add-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add <?= $subjudul ?> Data </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('Datapeg/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">NAMA PEMANGKU</label>
                    <input name="nama_peg" class="form-control" placeholder="NAMA PEMANGKU" required>
                </div>
                <div class="form-group">
                    <label for="">NIP/NIPPPPK/NUPTK/NIK</label>
                    <input name="nip" class="form-control" placeholder="NIP/NIPPPPK/NUPTK/NIK" required>
                </div>
                <div class="form-group">
                    <label for="">PANGKAT/GOL</label>
                    <select name="id_gol" class="form-control" required>
                        <option value="">--Pilih Golongan--</option>
                        <?php foreach ($golongan as $value) : ?>
                            <option value="<?= $value['id_gol'] ?>"><?= $value['nama_gol'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">JABATAN</label>
                    <select name="id_jab" class="form-control" required>
                        <option value="">--Pilih Jabatan--</option>
                        <?php foreach ($jabatan as $value) : ?>
                            <option value="<?= $value['id_jab'] ?>"><?= $value['nama_jab'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">UNIT KERJA</label>
                    <input name="unit_kerja" class="form-control" value="<?= old('unit_kerja') ?>" placeholder="UNIT KERJA" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Edit Data -->
<?php foreach ($datapegawai as $value) : ?>
    <div class="modal fade" id="edit-data<?= $value['id_peg'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul ?> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Datapeg/UpdateData/' . $value['id_peg']) ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">NAMA PEMANGKU</label>
                            <input name="nama_peg" value="<?= $value['nama_peg'] ?>" class="form-control" placeholder="NAMA PEMANGKU" required>
                        </div>
                        <div class="form-group">
                            <label for="">NIP/NIPPPPK/NUPTK/NIK</label>
                            <input name="nip" value="<?= $value['nip'] ?>" class="form-control" placeholder="NIP/NIPPPPK/NUPTK/NIK" required>
                        </div>
                        <div class="form-group">
                            <label for="">PANGKAT/GOL</label>
                            <select name="id_gol" class="form-control">
                                <option value="">--Pilih Golongan--</option>
                                <?php foreach ($golongan as $gol) : ?>
                                    <option value="<?= $gol['id_gol'] ?>" <?= $value['id_gol'] == $gol['id_gol'] ? 'selected' : '' ?>><?= $gol['nama_gol'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">JABATAN</label>
                            <select name="id_jab" class="form-control">
                                <option value="">--Pilih Jabatan--</option>
                                <?php foreach ($jabatan as $jab) : ?>
                                    <option value="<?= $jab['id_jab'] ?>" <?= $value['id_jab'] == $jab['id_jab'] ? 'selected' : '' ?>><?= $jab['nama_jab'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">UNIT KERJA</label>
                            <input name="unit_kerja" value="<?= $value['unit_kerja'] ?>" class="form-control" value="<?= old('unit_kerja') ?>" placeholder="UNIT KERJA" required>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Save</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
<?php endforeach; ?>

<!-- Modal Delete Data -->
<?php foreach ($datapegawai as $value) : ?>
    <div class="modal fade" id="delete-data<?= $value['id_peg'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data <?= $subjudul ?> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete data <b><?= $value['nama_peg'] ?></b>...?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Datapeg/DeleteData/' . $value['id_peg']) ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>

<script>
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "paging": true,
        "info": true,
        "ordering": false,
    });
</script>
<?= $this->endSection() ?>