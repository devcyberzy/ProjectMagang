<?= $this->extend('menu'); ?>

<?= $this->section('isi') ?>
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="start_date">Pilih Bulan & Tahun</label>
                        <input type="month" name="start_date" id="start_date" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <label>&nbsp;</label>
                    <button onclick="ViewLaporan()" class="btn btn-primary btn-block">View Data</button>
                </div>
            </div>
            <div class="col-sm-12">
                <hr>
                <div class="Tabel"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function ViewLaporan() {
        let start_date = $('#start_date').val();
        
        if (start_date === "") {
            Swal.fire({
                title: "Tanggal belum lengkap!",
                icon: "warning",
                showConfirmButton: true
            });
            return;
        }

        $.ajax({
            type: "POST",
            url: "<?= base_url('DaftarHadir/ViewLaporanDaftarHadir') ?>",
            data: {
                start_date: start_date,
                end_date: end_date
            },
            dataType: "JSON",
            success: function(response) {
                console.log(response); // Debugging: cek respons server

                if (response.status === 'success') {
                    $('.Tabel').html(response.data);
                } else {
                    Swal.fire({
                        title: response.message,
                        icon: "info",
                        showConfirmButton: true
                    });
                }
            }
        });
    }


    function PrintLaporan() {
        let start_date = $('#start_date').val();
        

        if (start_date === "") {
            Swal.fire({
                title: "Tanggal belum lengkap!",
                icon: "warning",
                showConfirmButton: true
            });
            return;
        }

        window.open('<?= base_url('DaftarHadir/PrintLaporanDaftarHadir') ?>/' + start_date + '/' + end_date, '_blank');
    }
</script>
<?= $this->endSection() ?>