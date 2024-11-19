<div class="col-12 text-center">
    <hr>
    <h4><b>"PENENPATAN PERSONIL DI IRBAN SESUAI PERBUB SOTK NO 18 TAHUN 2023"</b></h4>
    <hr>
</div>
<div class="col-12">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr class="text-center">
                <th width="50px">No</th>
                <th>NAMA PEMANGKU</th>
                <th>NIP/NIPPPPK/NUPTK/NIK</th>
                <th>PANGKAT/GOL</th>
                <th>JABATAN</th>
                <th>UNIT KERJA</th>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     
</div>