<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Hapus Angsuran</strong>
                    </div>
                    <?php
                    foreach ($pinjaman as $item) {
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
                                <div class="col-12 col-md-9"><label><?= $item['total_pinjaman'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nominal Angsuran : Rp.</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['angsuran_pembayaran'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Tanggal Transaksi : </label></div>
                                <div class="col-12 col-md-9"><label><?= date("d-m-Y", strtotime($item['tanggal_angsuran'])) ?></label></div>
                            </div>
                            <form action="<?= base_url() ?>pinjaman/prosesHapusAngsuran" method="POST">
                                <input type="hidden" name="id_angsuran_detail" value="<?= $item['id_angsuran_detail'] ?>">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Pesan Aksi</label></div>
                                    <div class="col-12 col-md-9"><textarea name="pesan_aksi" id="textarea-input" rows="5" placeholder="Anda wajib menuliskan alasan kenapa menghapus transaksi ini" required class="form-control"></textarea></div>
                                </div>
                                <a href="<?= base_url() ?>pegawai/daftarPinjaman" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin Menghapus Transaksi ini?')"><i class="fa fa-check-circle-o"></i> Hapus Angsuran <?= $item['nama_anggota'] ?></button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>