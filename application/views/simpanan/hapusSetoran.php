<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Hapus Setoran</strong>
                    </div>
                    <?php
                    foreach ($setoran as $item) {
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
                            <form action="<?= base_url() ?>simpanan/prosesHapusSetoran" method="POST">
                                <input type="hidden" name="id_simpanan_detail" value="<?= $item['id_simpanan_detail'] ?>">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Pesan Aksi</label></div>
                                    <div class="col-12 col-md-9"><textarea name="pesan_aksi" id="textarea-input" rows="5" placeholder="Anda wajib menuliskan alasan kenapa menghapus transaksi ini" required class="form-control"></textarea></div>
                                </div>
                                <a href="<?= base_url() ?>simpanan/dataSimpanan" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin Menghapus Transaksi ini?')"><i class="fa fa-check-circle-o"></i> Hapus Transaksi Setoran <?= $item['nama_anggota'] ?></button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>