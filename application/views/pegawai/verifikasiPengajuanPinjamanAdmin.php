<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Verifikasi Pengajuan Pinjaman By Admin</strong>
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
                        <?php } ?>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Verifikasi Pengajuan Pinjaman</label></div>
                            <div class="col-12 col-md-9">
                                <form method="POST" action="<?= base_url() ?>pegawai/prosesVerifikasiPengajuanPinjamanByAdmin">
                                    <?php
                                    foreach ($pinjaman as $i) { ?>
                                        <input type="hidden" name="id_pengajuan" value="<?= $i['id_pengajuan'] ?>">
                                        <input type="hidden" name="id_anggota" value="<?= $i['id_anggota'] ?>">
                                        <select class="form-control" name="verifikasi_admin" required>
                                            <option value="<?= $i['verifikasi_admin'] ?>" disabled selected><?= $i['verifikasi_admin'] ?></option>
                                        <?php }
                                        ?>
                                        <option value="Verifikasi Diterima">Terima Verifikasi Pengajuan</option>
                                        <option value="Verifikasi Ditolak"><b style="color:red">Tolak Verifikasi Pengajuan</b> </option>
                                        </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Status Pengajuan</label></div>
                            <div class="col-12 col-md-9"><textarea name="pesan" id="textarea-input" rows="6" placeholder="Pesan (jika ada kesalahan)" class="form-control"></textarea></div>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin ingin Verifikasi Pengajuan ?')"><i class="fa fa-check-circle-o"></i> Verifikasi Pengajuan Pinjaman</button>
                        </form>
                        <br><br>
                        <a href="<?= base_url() ?>pegawai/daftarPengajuanPinjaman" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>