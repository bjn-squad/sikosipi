<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Verifikasi Anggota</strong>
                    </div>
                    <?php
                    foreach ($anggota as $item) {
                    ?>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_anggota'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Alamat</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['alamat_anggota'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Nomor Handphone</label></div>
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
                        <?php } ?>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Verifikasi Status</label></div>
                            <div class="col-12 col-md-9">
                                <form method="POST" action="<?= base_url() ?>pegawai/prosesVerifikasiAnggota">
                                    <?php
                                    foreach ($anggota as $i) { ?>
                                        <input type="hidden" name="id_anggota" value="<?= $i['id_anggota'] ?>">
                                        <select class="form-control" name="status_anggota" required>
                                            <option value="<?= $i['status_anggota'] ?>" disabled selected><?= $i['status_anggota'] ?></option>
                                        <?php }
                                        ?>
                                        <option value="Sedang Diverifikasi (Menunggu Pembayaran Simpanan Pokok)">Verifikasi Data Diterima (Data Valid)</option>
                                        <option value="Verifikasi Ulang">Request Verifikasi Ulang</option>
                                        <option value="Aktif">Aktifkan Member</option>
                                        </select>
                                        <br>
                                        <button class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin ingin Verifikasi Anggota?')"><i class="fa fa-check-circle-o"></i> Verifikasi Anggota</button>
                                </form>
                                <br>
                                <a href="<?= base_url() ?>pegawai/daftarAnggota" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>