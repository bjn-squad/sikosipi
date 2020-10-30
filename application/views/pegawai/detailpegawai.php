<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Pegawai</strong>
                    </div>
                    <?php
                    foreach ($pegawai as $item) {
                    ?>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama Pegawai : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_pegawai'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Alamat Pegawai : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['alamat_pegawai'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">No Telpon : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['no_telp_pegawai'] ?></label></div>
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
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Kategori : </label></div>
                                <div class="col-12 col-md-9"><label>
                                        <?php
                                        if ($item['kategori'] == "1") {
                                            echo 'Admin';
                                        } else {
                                            echo 'Pegawai';
                                        }
                                        ?>
                                    </label></div>
                            </div>
                            <a href="<?= base_url() ?>pegawai/daftarPegawai" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>