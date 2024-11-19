<?= $this->extend('menu'); ?>

<?= $this->section('isi') ?>
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Produk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <a href="<?= base_url('Produk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>
                        <p>Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-th-list"></i>
                    </div>
                    <a href="<?= base_url('Kategori') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>
                        <p>Satuan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-list"></i>
                    </div>
                    <a href="<?= base_url('Satuan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>
                        <p>User</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?= base_url('User') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-lightblue">
                        <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Income Hari</span>
                            <span class="info-box-number">IDR 5,200</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-teal">
                        <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Income Bulan Ini</span>
                            <span class="info-box-number">IDR 5,200</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-olive">
                        <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Income Tahun Ini</span>
                            <span class="info-box-number">IDR 5,200</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <canvas id="myChart" width="100%" height="35px"></canvas>
            </div>

        </div>
    </div>
</section>
</div><?= $this->endSection() ?>