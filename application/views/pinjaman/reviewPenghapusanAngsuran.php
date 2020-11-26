<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Review Penghapusan Angsuran</strong>
                    </div>
                    <?php
                    foreach ($aksi as $item) {
                        $bunga = $item['total_pinjaman'] * 0.05;
                        $hasil = $item['total_pinjaman'] + $bunga;
                    ?>
                        <div class="card-body card-block">
                            <div class="alert alert-info" role="alert">
                                <i class="fa fa-info-circle"></i><b> Jika anda ingin menghapus transaksi Angsuran ini maka: </b><br>
                                1. Angsuran yang diinputkan akan hilang. <br>
                                2. Penghapusan transaksi ini akan diverifikasi admin terlebih dahulu. <br>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_anggota'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Oleh (Pegawai) : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_pegawai'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nominal Pinjaman : </label></div>
                                <div class="col-12 col-md-9"><label><?= $hasil ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nominal Angsuran : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['angsuran_pembayaran'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Tanggal Transaksi : </label></div>
                                <div class="col-12 col-md-9"><label><?= date("d-m-Y", strtotime($item['tanggal_angsuran'])) ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Pegawai Request Penghapusan : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_pegawai'] ?></label></div>
                            </div>

                            <a href="<?= base_url() ?>pinjaman/terimaAksiPenghapusanAngsuran/<?= $item['id_aksi'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin ingin Menghapus Angsuran Ini?')"><i class="fa fa-check-circle-o"></i> Terima Aksi Penghapusan Angsuran <?= $item['nama_anggota'] ?></a>
                            <a href="<?= base_url() ?>pinjaman/tolakAksiPenghapusanAngsuran/<?= $item['id_aksi'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin Menolak Request Penghapusan Angsuran ini?')"><i class="fa fa-times"></i> Tolak Aksi Penghapusan Angsuran <?= $item['nama_anggota'] ?></a><br><br>
                            <a href="<?= base_url() ?>pinjaman/daftarAksiPenghapusanAngsuran" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>