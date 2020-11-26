<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Review Penghapusan Setoran</strong>
                    </div>
                    <?php
                    foreach ($aksi as $item) {
                    ?>
                        <div class="card-body card-block">
                            <div class="alert alert-info" role="alert">
                                <i class="fa fa-info-circle"></i><b> Jika anda ingin menghapus transaksi setoran ini maka: </b><br>
                                1. Saldo pada simpanan wajib anggota akan berkurang sesuai dengan transaksi yang dihapus. <br>
                                2. Penghapusan transaksi ini akan diverifikasi admin terlebih dahulu. <br>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_anggota'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Jumlah Simpanan Wajib : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['jumlah_simpanan_wajib'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Jumlah Nominal pada setoran ini : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['jumlah_setor_tunai'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Tanggal Transaksi : </label></div>
                                <div class="col-12 col-md-9"><label><?= date("d-m-Y", strtotime($item['tanggal_setor_tunai'])) ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Pegawai Request Penghapusan : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_pegawai'] ?></label></div>
                            </div>

                            <a href="<?= base_url() ?>simpanan/terimaAksiPenghapusanSetoran/<?= $item['id_aksi'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin ingin Menghapus Setoran Ini?')"><i class="fa fa-check-circle-o"></i> Terima Aksi Penghapusan Setoran <?= $item['nama_anggota'] ?></a>
                            <a href="<?= base_url() ?>simpanan/tolakAksiPenghapusanSetoran/<?= $item['id_aksi'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menolak request penghapusan setoran ini?')"><i class="fa fa-times"></i> Tolak Aksi Penghapusan Setoran <?= $item['nama_anggota'] ?></a><br><br>
                            <a href="<?= base_url() ?>simpanan/daftarAksiPenghapusanSetoran" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>