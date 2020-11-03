<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tambah Angsuran Pinjaman</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <?php if (validation_errors()) {
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors() ?>
                                </div>
                            <?php
                            } ?>
                            <?php
                            foreach ($pinjaman as $item) {
                            ?>
                                <form action="<?= base_url() ?>pegawai/prosesTambahAngsuran" method="POST">
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama Anggota</label></div>
                                            <div class="col-12 col-md-9"><label><?= $item['nama_anggota'] ?></label></div>
                                        </div>
                                        <input type="hidden" value="<?= $item['id_pinjaman'] ?>" name="id_pinjaman">
                                        <div class="form-group">
                                            <label class=" form-control-label">Angsuran Pembayaran</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">Rp.</div>
                                                <input class="form-control" type="number" value="<?= $item['angsuran_bulanan'] ?>" readonly name="angsuran_pembayaran" required>
                                            </div>
                                        </div>
                                        <a href="<?= base_url() ?>pegawai/daftarPinjaman" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                        <button type="submit" name="submit" onclick="return confirm('Apakah anda yakin ingin Menambahkan Angsuran Pinjaman Ini?')" class="btn btn-primary btn-sm">Submit</button>
                                </form>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>