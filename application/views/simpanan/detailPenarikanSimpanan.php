<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Penarikan Simpanan</strong>
                    </div>
                    <?php
                    foreach ($simpanan as $item) {
                    ?>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama Anggota</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_anggota'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Total Dana Yang Ditarik</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nominal_total_penarikan'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Tanggal Penarikan Diajukan</label></div>
                                <div class="col-12 col-md-9"><label><?= date("d-m-Y", strtotime($item['tanggal_permintaan_penarikan'])) ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Status Penarikan</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['status_penarikan'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Verfikasi_pegawai</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['verifikasi_pegawai'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Verifikasi Admin</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['verifikasi_admin'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Pesan</label></div>
                                <div class="col-12 col-md-9"><span style="white-space: pre-line"><?= $item['pesan']; ?></span></div>
                            </div>
                            <a href="<?= base_url() ?>simpanan/dataAksiPenarikan" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>