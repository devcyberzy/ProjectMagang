<?= $this->extend('template'); ?>
<?= $this->section('menu'); ?>
<li class="nav-item menu">
    <a href="<?= base_url('Dashboard') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item <?= $menu == 'masterdata' ? 'menu-open' : '' ?>">
    <a href="" class="nav-link <?= $menu == 'masterdata' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-folder-open"></i>
        <p>
            Data Pegawai
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('Datapeg') ?>" class="nav-link <?= $submenu == 'datapegawai' ? 'active' : '' ?>">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Daftar Pegawai</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('Jabatan') ?>" class="nav-link <?= $submenu == 'jabatan' ? 'active' : '' ?>">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Jabatan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('Golongan') ?>" class="nav-link <?= $submenu == 'golongan' ? 'active' : '' ?>">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Golongan</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item <?= $menu == 'kehadiran' ? 'menu-open' : '' ?>">
    <a href="" class="nav-link <?= $menu == 'kehadiran' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-folder-open"></i>
        <p>
            Kehadiran
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('DaftarHadir') ?>" class="nav-link <?= $submenu == 'daftarhadir' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                    Daftar Hadir
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('DaftarHadir/LaporanDaftarHadir') ?>" class="nav-link <?= $submenu == 'laporan-daftarhadir' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-print"></i>
                <p>
                    Cetak Daftar Hadir
                </p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item <?= $menu == 'tandaterima' ? 'menu-open' : '' ?>">
    <a href="" class="nav-link <?= $menu == 'tandaterima' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-folder-open"></i>
        <p>
            Tanda Terima
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('TandaTerima') ?>" class="nav-link <?= $submenu == 'penerima' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                    Daftar Penerima
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('TandaTerima/LaporanTandaTerima') ?>" class="nav-link <?= $submenu == 'laporan-tandaterima' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-print"></i>
                <p>
                    Cetak Tanda Terima
                </p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item menu">
    <a href="<?= base_url('Surat') ?>" class="nav-link <?= $menu == 'surat' ? 'active' : '' ?>">
        <i class="fas fa-envelope-open-text nav-icon"></i>
        <p>
            Surat Perintah
        </p>
    </a>
</li>
<?= $this->endSection(); ?>