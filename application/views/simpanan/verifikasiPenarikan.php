<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Verifikasi Penarikan oleh Pegawai</strong>
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
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Verifikasi Admin</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['verifikasi_admin'] ?></label></div>
                            </div>

                        <?php } ?>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Verifikasi Penarikan Simpanan</label></div>
                            <div class="col-12 col-md-9">
                                <form method="POST" action="<?= base_url() ?>simpanan/prosesVerifikasiPenarikanByPegawai">
                                    <?php
                                    foreach ($simpanan as $i) {
                                    ?>

                                        <input type="hidden" name="id_penarikan" value="<?= $i['id_penarikan'] ?>">
                                        <select class="form-control" name="verifikasi_pegawai" required>
                                            <option value="<?= $i['verifikasi_pegawai'] ?>" disabled selected><?= $i['verifikasi_pegawai'] ?></option>
                                        <?php }
                                        ?>
                                        <option value="Verifikasi Diterima">Terima Verifikasi Penarikan</option>
                                        <option value="Verifikasi Ditolak"><b style="color:red">Tolak Verifikasi Penarikan</b> </option>
                                        </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Total Akhir Simpanan</label></div>
                            <div class="col-12 col-md-9"><input class="form-control" type="number" value="<?= $item['total_akhir_simpanan'] ?>" name="total_akhir_simpanan" id="total_akhir_simpanan" required></div>
                        </div>
                        <small class="form-text text-muted">*Bunga didapatkan setiap tahun sebesar 2%, JIKA masa keanggotaan KURANG dari SATU TAHUN maka TIDAK MENDAPAT BUNGA SIMPANAN !</small><br>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Pesan</label></div>
                            <div class="col-12 col-md-9"><textarea name="pesan" id="textarea-input" rows="6" placeholder="Pesan (jika ada kesalahan)" class="form-control"></textarea></div>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin ingin Verifikasi Penarikan ?')"><i class="fa fa-check-circle-o"></i> Verifikasi Penarikan</button>
                        </form>
                        <br><br>
                        <a href="<?= base_url() ?>simpanan/dataAksiPenarikan" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>