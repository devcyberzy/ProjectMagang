<?= $this->extend('menu'); ?>

<?= $this->section('isi') ?>
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
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
            <div class="form-group">
                <label for="nama_pegawai">Nama Pegawai</label>
                <input type="text" class="form-control" id="nama_pegawai" placeholder="Masukkan Nama Pegawai">
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Nama Pegawai</th>
                        <th>02 - 12 - 2024</th>
                        <th>03 - 12 - 2024</th>
                        <th>04 - 12 - 2024</th>
                        <th>05 - 12 - 2024</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data akan ditampilkan di sini -->
                    <tr>
                        <td><!-- Nama Pegawai --></td>
                        <td><!-- Data untuk 02 - 12 - 2024 --></td>
                        <td><!-- Data untuk 03 - 12 - 2024 --></td>
                        <td><!-- Data untuk 04 - 12 - 2024 --></td>
                        <td><!-- Data untuk 05 - 12 - 2024 --></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>