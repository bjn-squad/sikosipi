<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <h4 class="navbar-brand">SIKOSIPI</h4>
            <h4 class="navbar-brand hidden">S</h4>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?= base_url() ?>pegawai"> <i class="menu-icon fa fa-dashboard"></i>Dashboard <?php if ($this->session->userdata('kategori') == 1) {
                                                                                                                echo 'Admin';
                                                                                                            } else {
                                                                                                                echo 'Pegawai';
                                                                                                            } ?> </a>
                </li>
                <h3 class="menu-title">Menu SIKOSIPI</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Simpanan</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-list"></i><a href="<?= base_url() ?>simpanan/dataSimpanan">Data Simpanan</a></li>
                        <li><i class="menu-icon fa fa-file-text-o"></i><a href="font-themify.html">Laporan</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Pinjaman</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-map-o"></i><a href="<?= base_url() ?>pegawai/daftarPinjaman">Daftar Pinjaman</a></li>
                        <li><i class="menu-icon fa fa-list"></i><a href="<?= base_url() ?>pegawai/daftarPengajuanPinjaman">Daftar Pengajuan Pinjaman</a></li>
                        <li><i class="menu-icon fa fa-file-text-o"></i><a href="font-themify.html">Laporan</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Keanggotaan</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-list"></i><a href="<?= base_url() ?>pegawai/daftarAnggota">Daftar Anggota</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url() ?>pegawai/daftarAksi"> <i class="menu-icon ti-announcement"></i> Aksi</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->