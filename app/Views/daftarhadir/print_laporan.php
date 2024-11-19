<div class="col-12">
    <b>Print Date :</b> <?= $tgl ?>
    <table class="table table-borderes table-striped">
        <tr class="text-center bg-gray-dark">
            <th width="50px">NO</th>
            <th>NAMA PEGAWAI</th>
            <th>JABATAN</th>
            <th>DATE TIME</th>
        </tr>
        <?php $no = 1;
        foreach ($daftarhadir as $value) :
        ?>
            <tr class="text-center">
                <th class="text-center" scope="row"><?= $no++; ?></th>
                <td class="text-center"><?= $value['nama_peg'] ?></td>
                <td class="text-center"><?= $value['nama_jab'] ?></td>
                <td class="text-center"><?= $value['tgl'] ?><br><span><?= $value['jam_mulai'] ?> - <?= $value['jam_selesai'] ?></span></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>