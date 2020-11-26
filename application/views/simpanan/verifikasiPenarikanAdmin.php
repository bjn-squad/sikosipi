<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Verifikasi penarikan Simpanan oleh Admin</strong>
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
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Tanggal Keanggotaan</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['tanggal_keanggotaan'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Total Dana Yang Ingin Ditarik</label></div>
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
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Total Akhir Penarikan (Ditambah Bunga)</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['total_akhir_simpanan'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Verifikasi Pegawai</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['verifikasi_pegawai'] ?></label></div>
                            </div>

                        <?php } ?>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Verifikasi penarikan Simpanan</label></div>
                            <div class="col-12 col-md-9">
                                <form method="POST" action="<?= base_url() ?>simpanan/prosesVerifikasiPenarikanByAdmin">
                                    <?php
                                    foreach ($simpanan as $i) { ?>
                                        <input type="hidden" name="id_penarikan" value="<?= $i['id_penarikan'] ?>">
                                        <input type="hidden" name="id_anggota" value="<?= $i['id_anggota'] ?>">
                                        <select class="form-control" name="verifikasi_admin" required>
                                            <option value="<?= $i['verifikasi_admin'] ?>" disabled selected><?= $i['verifikasi_admin'] ?></option>
                                        <?php }
                                        ?>
                                        <option value="Verifikasi Diterima">Terima Verifikasi penarikan</option>
                                        <option value="Verifikasi Ditolak"><b style="color:red">Tolak Verifikasi penarikan</b> </option>
                                        </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Pesan</label></div>
                            <div class="col-12 col-md-9"><textarea name="pesan" id="textarea-input" rows="6" placeholder="Pesan (jika ada kesalahan)" class="form-control"></textarea></div>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin ingin Verifikasi penarikan ?')"><i class="fa fa-check-circle-o"></i> Verifikasi penarikan Simpanan</button>
                        </form>
                        <br><br>
                        <a href="<?= base_url() ?>pegawai/daftarAksiPenarikan" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>