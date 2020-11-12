<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Ubah Password Anggota</strong>
                    </div>
                    <?php
                    foreach ($anggota as $item) {
                    ?>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_anggota'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Username : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['username'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Email : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['email'] ?></label></div>
                            </div>
                        <?php } ?>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Ubah Password</label></div>
                            <div class="col-12 col-md-9">
                                <form method="POST" action="<?= base_url() ?>pegawai/prosesGantiPasswordAnggota">
                                    <?php
                                    foreach ($anggota as $i) { ?>
                                        <input type="hidden" name="id_anggota" value="<?= $i['id_anggota'] ?>">
                                        <input type="text" placeholder="Masukan Password Baru" name="password" class="form-control">
                                        <br>
                                        <button class="btn btn-warning btn-sm" onclick="return confirm('Apakah anda yakin ingin mengganti Password Anggota?')"><i class="fa fa-unlock-alt"></i> Ganti Password </button>
                                    <?php } ?>
                                </form>
                                <br>
                                <a href="<?= base_url() ?>pegawai/daftarAnggota" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>