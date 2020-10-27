<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Anggota</strong>
                    </div>
                    <?php
                    foreach ($anggota as $item) {
                    ?>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama Anggota : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_anggota'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Alamat Anggota : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['alamat_anggota'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">No Telpon : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['no_telp_anggota'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Username : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['username'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Email : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['email'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Tanggal Keanggotaan : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['tanggal_keanggotaan'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Foto KTP : </label></div>
                                <div class="col-12 col-md-9">
                                    <?php if ($item['foto_ktp_anggota'] == "Belum Diupload") {
                                        echo "Belum Upload Foto KTP";
                                    } else {
                                    ?>
                                        <label><a href="<?= base_url() ?>assets/datakoperasi/imganggota/ktp/<?= $item['foto_ktp_anggota'] ?>" target="_blank"><i class="fa fa-external-link"></i> Tampilkan Gambar KTP</a></label>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Foto KYC : </label></div>
                                <div class="col-12 col-md-9">
                                    <?php if ($item['foto_ktp_anggota'] == "Belum Diupload") {
                                        echo "Belum Upload Foto KYC";
                                    } else {
                                    ?>
                                        <label><a href="<?= base_url() ?>assets/datakoperasi/imganggota/kyc/<?= $item['foto_selfie_ktp_anggota'] ?>" target="_blank"><i class="fa fa-external-link"></i> Tampilkan Gambar KYC</a></label>
                                    <?php } ?>
                                </div>
                            </div>
                            <a href="<?= base_url() ?>pegawai/daftarAnggota" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>