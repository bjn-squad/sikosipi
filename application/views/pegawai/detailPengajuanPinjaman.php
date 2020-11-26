<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Pengajuan Pinjaman</strong>
                    </div>
                    <?php
                    foreach ($pinjaman as $item) {
                    ?>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama Anggota</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_anggota'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Total Dana Yang Diajukan</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['total_pengajuan_pinjaman'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Lampiran Pendukung</label></div>
                                <div class="col-12 col-md-9"><label><a href="<?= base_url() ?>assets/datakoperasi/dokumen/<?= $item['lampiran_pendukung'] ?>" target="_blank"><i class="fa fa-external-link"></i> Tampilkan File Pendukung</a></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Tanggal Pinjaman Diajukan</label></div>
                                <div class="col-12 col-md-9"><label><?= date("d-m-Y", strtotime($item['tanggal_pengajuan'])) ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Status Pengajuan</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['status_pengajuan'] ?></label></div>
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
                            <a href="<?= base_url() ?>pegawai/daftarPengajuanPinjaman" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>