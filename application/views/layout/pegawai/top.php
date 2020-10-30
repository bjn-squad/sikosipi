<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-desktop"></i></a>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h6><i class="fa fa-user"></i> <?= $this->session->userdata('email') ?> <i class="fa fa-sort-down"></i></h6>
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link">Welcome Pegawai <?= $this->session->userdata('username') ?></a>
                        <a class="nav-link" href="<?= base_url() ?>pegawai/ubahPassword"><i class="fa fa-cog"></i> Ubah Password</a>
                        <a class="nav-link" href="<?= base_url() ?>auth/logout"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>

            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1><?= $title ?></h1>
                </div>
            </div>
        </div>
    </div>