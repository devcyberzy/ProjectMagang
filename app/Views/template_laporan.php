<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Lembur | <?= $judul ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url('adminlte') ?>/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('adminlte') ?>/dist/css/adminlte.min.css?v=3.2.0">
</head>
<style>
    .p1 {
        font-family: "Times New Roman", Times, serif;
    }

    .tanda-tangan {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 20px;
        text-align: center;
    }

    .signature-grid {
        display: grid !important;
    }
</style>

<body>
    <div class="wrapper">

        <section class="invoice">

            <!-- <div class="row">
                <div class="col-12 text-center">
                    <h3 class="page-header">
                        <p><b> INSPEKTORAT DAERAH KABUPATEN BATANG
                            </b></p>
                    </h3>
                </div>
            </div> -->

            <div class="row">
                <?php if ($page) {
                    echo view($page);
                } ?>
            </div>
        </section>
    </div>

    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>