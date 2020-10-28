<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Nonaktifkan Akun</strong>
                    </div>
                    <?php
                    foreach ($anggota as $item) {
                    ?>
                        <div class="card-body card-block">
                            <div class="alert alert-info" role="alert">
                                <i class="fa fa-info-circle"></i><b> Jika anda menonaktifkan akun ini maka: </b><br>
                                1. Anggota tidak dapat melakukan transaksi apa-apa. Hanya bisa login dan melihat pengumuman.<br>
                                2. Penonaktifan akun akan diverifikasi admin terlebih dahulu.<br>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_anggota'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Alamat : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['alamat_anggota'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Email : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['email'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Username : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['username'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Nomor Handphone : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['no_telp_anggota'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Foto KTP</label></div>
                                <div class="col-12 col-md-9"><label><a href="<?= base_url() ?>assets/datakoperasi/imganggota/ktp/<?= $item['foto_ktp_anggota'] ?>" target="_blank"><i class="fa fa-external-link"></i> Tampilkan Gambar KTP</a></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Foto KYC</label></div>
                                <div class="col-12 col-md-9"><label><a href="<?= base_url() ?>assets/datakoperasi/imganggota/kyc/<?= $item['foto_selfie_ktp_anggota'] ?>" target="_blank"><i class="fa fa-external-link"></i> Tampilkan Gambar KYC</a></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Status Anggota Saat Ini</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['status_anggota'] ?></label></div>
                            </div>
                            <form action="<?= base_url() ?>pegawai/prosesNonaktifkanAnggota" method="POST">
                                <input type="hidden" name="id_anggota" value="<?= $item['id_anggota'] ?>">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Pesan Aksi</label></div>
                                    <div class="col-12 col-md-9"><textarea name="pesan_aksi" id="textarea-input" rows="5" placeholder="Anda wajib menuliskan alasan kenapa menonaktifkan akun ini" required class="form-control"></textarea></div>
                                </div>
                                <a href="<?= base_url() ?>pegawai/daftarAnggota" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin Menonaktifkan Akun Ini?')"><i class="fa fa-check-circle-o"></i> Nonaktifkan Akun <?= $item['nama_anggota'] ?></button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>