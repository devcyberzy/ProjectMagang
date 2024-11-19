<?= $this->extend('menu'); ?>

<?= $this->section('isi') ?>
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
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
                        timer: 1250

                    });
                </script>
            <?php endif; ?>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="50px">NO</th>
                        <th>NAMA PEGAWAI</th>
                        <th>JABATAN</th>
                        <th>DATE TIME</th>
                        <th width="100px">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($daftarhadir as $value) : ?>
                        <tr>
                            <th class="text-center" scope="row"><?= $no++; ?></th>
                            <td class="text-center"><?= $value['nama_peg'] ?></td>
                            <td class="text-center"><?= $value['nama_jab'] ?></td>
                            <td class="text-center"><?= $value['tgl'] ?><br><span><?= $value['jam_mulai'] ?> - <?= $value['jam_selesai'] ?></span></td>
                            <td class="text-center">
                                <!-- Tombol untuk mengedit data -->
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-data<?= $value['id_daftar'] ?>">
                                    <i class="fas fa-edit" style="color:wheat"></i>
                                </button>
                                <!-- Tombol untuk menghapus data -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-data<?= $value['id_daftar'] ?>">
                                    <i class="fas fa-trash-alt" style="color:wheat"></i>
                                </button>
                                <!-- Tombol untuk menambah tanggal -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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
            <?= form_open('DaftarHadir/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">NAMA</label>
                    <select name="id_peg" class="form-control" required>
                        <option value="">--Pilih Nama--</option>
                        <?php foreach ($datapegawai as $value) : ?>
                            <option value="<?= $value['id_peg'] ?>"><?= $value['nama_peg'] ?></option>
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
                    <label for="">TANGGAL</label>
                    <input type="date" name="tgl" class="form-control" value="<?= old('tgl') ?>" placeholder="TANGGAL" required>
                </div>
                <div class="form-group">
                    <label for="">JAM MULAI</label>
                    <input type="time" name="jam_mulai" class="form-control" value="<?= old('jam_mulai') ?>" placeholder="JAM MULAI" required>
                </div>
                <div class="form-group">
                    <label for="">JAM SELESAI</label>
                    <input type="time" name="jam_selesai" class="form-control" value="<?= old('jam_selesai') ?>" placeholder="JAM SELESAI" required>
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
<?php foreach ($daftarhadir as $value) : ?>
    <div class="modal fade" id="edit-data<?= $value['id_daftar'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul ?> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('DaftarHadir/UpdateData/' . $value['id_daftar']) ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">NAMA</label>
                            <select name="id_peg" class="form-control">
                                <option value="">--Pilih Nama--</option>
                                <?php foreach ($datapegawai as $dp) : ?>
                                    <option value="<?= $dp['id_peg'] ?>" <?= $value['id_peg'] == $dp['id_peg'] ? 'selected' : '' ?>><?= $dp['nama_peg'] ?></option>
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
                            <label for="">TANGGAL</label>
                            <input type="date" name="tgl" value="<?= date('Y-m-d', strtotime($value['tgl'])) ?>" class="form-control" placeholder="TANGGAL" required>
                        </div>
                        <div class="form-group">
                            <label for="">JAM MULAI</label>
                            <input type="time" name="jam_mulai" value="<?= $value['jam_mulai'] ?>" class="form-control" value="<?= old('jam_mulai') ?>" placeholder="JAM MULAI" required>
                        </div>
                        <div class="form-group">
                            <label for="">JAM SELESAI</label>
                            <input type="time" name="jam_selesai" value="<?= $value['jam_selesai'] ?>" class="form-control" value="<?= old('jam_selesai') ?>" placeholder="JAM SELESAI" required>
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
<?php foreach ($daftarhadir as $value) : ?>
    <div class="modal fade" id="delete-data<?= $value['id_daftar'] ?>">
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
                    <a href="<?= base_url('DaftarHadir/DeleteData/' . $value['id_daftar']) ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
<?= $this->endSection() ?>