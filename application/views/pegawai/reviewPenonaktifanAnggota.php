<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Review Penonaktifkan Akun</strong>
                    </div>
                    <?php
                    foreach ($aksi as $item) {
                    ?>
                        <div class="card-body card-block">
                            <div class="alert alert-info" role="alert">
                                <i class="fa fa-info-circle"></i><b> Jika anda menonaktifkan akun ini maka: </b><br>
                                1. Anggota tidak dapat melakukan transaksi apa-apa. Hanya bisa login dan melihat pengumuman.<br>
                                2. Penonaktifan akun akan diverifikasi admin terlebih dahulu.<br>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Kategori : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['kategori_aksi'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama Anggota : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_anggota'] ?> <a href="<?= base_url() ?>pegawai/detailAnggota/<?= $item['id_data_kategori'] ?>" target="_blank"> <i class="fa fa-external-link"></i> Detail Informasi</a></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Alasan Penonaktifan : </label></div>
                                <div class="col-12 col-md-9">
                                    <label style="white-space: pre-line;"><?= $item['pesan_aksi'] ?></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Pegawai Request Penonaktifan : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_pegawai'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Status Anggota Saat Ini</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['status_anggota'] ?></label></div>
                            </div>
                            <a href="<?= base_url() ?>pegawai/terimaAksiPenonaktifan/<?= $item['id_aksi'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin ingin Menonaktifkan Akun Ini?')"><i class="fa fa-check-circle-o"></i> Terima Aksi Penonaktifkan Akun <?= $item['nama_anggota'] ?></a>
                            <a href="<?= base_url() ?>pegawai/tolakAksiPenonaktifan/<?= $item['id_aksi'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menolak request penonaktifan akun ini?')"><i class="fa fa-times"></i> Tolak Aksi Penonaktifan Akun <?= $item['nama_anggota'] ?></a><br><br>
                            <a href="<?= base_url() ?>pegawai/daftarAksi" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>