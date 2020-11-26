<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Ubah Status Pinjaman</strong>
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
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Tanggal Meminjam</label></div>
                                <div class="col-12 col-md-9"><label><?= date("d-m-Y", strtotime($item['tanggal_meminjam'])) ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Tanggal Pelunasan</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['tanggal_pelunasan'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Total Pinjaman</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['total_pinjaman'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Angsuran Bulanan</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['angsuran_bulanan'] ?></label></div>
                            </div>
                        <?php } ?>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Verifikasi Pengajuan Pinjaman</label></div>
                            <div class="col-12 col-md-9">
                                <form method="POST" action="<?= base_url() ?>pegawai/prosesUbahPinjaman">
                                    <?php
                                    foreach ($pinjaman as $i) { ?>
                                        <input type="hidden" name="id_pinjaman" value="<?= $i['id_pinjaman'] ?>">
                                        <select class="form-control" name="status_pinjaman" required>
                                            <option value="<?= $i['status_pinjaman'] ?>" disabled selected><?= $i['status_pinjaman'] ?></option>
                                        <?php }
                                        ?>
                                        <option value="Sudah Lunas">Sudah Lunas</option>
                                        </select>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin ingin Mengubah Status Pinjaman ?')"><i class="fa fa-check-circle-o"></i> Ubah Status Pinjaman</button>
                        </form>
                        <br><br>
                        <a href="<?= base_url() ?>pegawai/daftarPinjaman" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>