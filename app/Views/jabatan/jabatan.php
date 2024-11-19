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
                        <th>JABATAN</th>
                        <th width="100px">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($jabatan as $value) : ?>
                        <tr>
                            <th class="text-center" scope="row"><?= $no++; ?></th>
                            <td><?= $value['nama_jab'] ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-data<?= $value['id_jab'] ?>">
                                    <i class="fas fa-edit" style="color:wheat"></i></a>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-data<?= $value['id_jab'] ?>">
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
            <?= form_open('Jabatan/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Jabatan</label>
                    <input name="nama_jab" class="form-control" placeholder="Jabatan" required>
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
<?php foreach ($jabatan as $value) : ?>
    <div class="modal fade" id="edit-data<?= $value['id_jab'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul ?> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('Jabatan/UpdateData/' . $value['id_jab']) ?>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <input name="nama_jab" class="form-control" value="<?= $value['nama_jab'] ?>" placeholder="Jabatan" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save</button>
                </div>
                <?= form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>

<!-- Modal Delete Data -->
<?php foreach ($jabatan as $value) : ?>
    <div class="modal fade" id="delete-data<?= $value['id_jab'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data <?= $subjudul ?> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete data <b><?= $value['nama_jab'] ?></b>...?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Jabatan/DeleteData/' . $value['id_jab']) ?>" class="btn btn-danger">Delete</a>
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