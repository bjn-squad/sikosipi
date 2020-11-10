<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Ubah Status Simpanan</strong>
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
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Jumlah Simpanan Pokok</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['jumlah_simpanan_pokok'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Jumlah Simpanan Wajib</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['jumlah_simpanan_wajib'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Status Simpanan Saat Ini</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['status_simpanan'] ?></label></div>
                            </div>
                        <?php } ?>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Ubah Status Simpanan</label></div>
                            <div class="col-12 col-md-9">
                                <form method="POST" action="<?= base_url() ?>simpanan/prosesUbahStatusSimpanan">
                                    <?php
                                    foreach ($simpanan as $i) { ?>
                                        <input type="hidden" name="id_anggota" value="<?= $i['id_anggota'] ?>">
                                        <input type="hidden" name="id_simpanan" value="<?= $i['id_simpanan'] ?>">
                                        <select class="form-control" name="status_simpanan" required>
                                            <option value="<?= $i['status_simpanan'] ?>" disabled selected><?= $i['status_simpanan'] ?></option>
                                        <?php }
                                        ?>
                                        <option value="Belum Ditarik">Belum Ditarik</option>
                                        <option value="Menunggu Penarikan">Menunggu Penarikan</option>
                                        <option value="Sudah Ditarik">Sudah Ditarik</option>
                                        </select>
                            </div>
                        </div>
                        <a href="<?= base_url() ?>simpanan/dataSimpanan" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                        <button class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin ingin Mengubah Status Simpanan ?')"><i class="fa fa-check-circle-o"></i> Ubah Status Simpanan</button>
                        </form>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>