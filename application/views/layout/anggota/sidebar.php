<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <h4 class="navbar-brand"><a class="none" href="<?= base_url() ?>" target="_blank">SIKOSIPI</a></h4>
            <h4 class="navbar-brand hidden">S</h4>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?= base_url() ?>anggota"> <i class="menu-icon fa fa-dashboard"></i>Dashboard Anggota</a>
                </li>
                <h3 class="menu-title">Menu Anggota</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Simpanan</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-bank"></i><a href="<?= base_url() ?>anggota/simpananSaya">Lihat Simpanan Saya</a></li>
                        <li><i class="menu-icon fa fa-address-book"></i><a href="<?= base_url() ?>anggota/riwayatPenarikan">Riwayat Penarikan Simpanan </a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Pinjaman</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-address-book"></i><a href="<?= base_url() ?>pinjaman/pinjamanSaya">Lihat Pinjaman Saya</a></li>
                        <li><i class="menu-icon fa fa-bank"></i><a href="<?= base_url() ?>pinjaman/ajukanPinjaman">Ajukan Pinjaman</a></li>
                        <li><i class="menu-icon fa fa-address-book"></i><a href="<?= base_url() ?>pinjaman/riwayatPengajuan">Riwayat Pengajuan Pinjaman</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url() ?>home/pengumuman" target="_blank"> <i class="menu-icon ti-email"></i>Lihat Pengumuman </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->