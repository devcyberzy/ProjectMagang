<?= $this->extend('menu'); ?>

<?= $this->section('isi') ?>
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <form action="<?= base_url('TandaTerima/FilterLaporan') ?>" method="post">
                        <div class="row mb-3">
                            <div class="col-md-5">
                                <label for="tanggal_awal">Tanggal Awal:</label>
                                <input type="date" name="tanggal_awal" class="form-control" required>
                            </div>
                            <div class="col-md-5">
                                <label for="tanggal_akhir">Tanggal Akhir:</label>
                                <input type="date" name="tanggal_akhir" class="form-control" required>
                            </div>
                            <div class="col-md-2 align-self-end">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php if (session()->getFlashdata('error')) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= session()->getFlashdata('error') ?>',
        });
    <?php endif; ?>
</script>
<?= $this->endSection(); ?>