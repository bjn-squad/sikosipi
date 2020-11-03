<script>
    function passwordShowUnshow() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Ubah Password Pegawai</strong>
                    </div>
                    <?php
                    foreach ($pegawai as $item) {
                    ?>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama : </label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_pegawai'] ?></label></div>
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
                                <form method="POST" action="<?= base_url() ?>pegawai/prosesGantiPasswordPegawai">
                                    <?php
                                    foreach ($pegawai as $i) { ?>
                                        <input type="hidden" name="id_pegawai" value="<?= $i['id_pegawai'] ?>">
                                        <input type="password" placeholder="Masukan Password Baru" id="password" name="password" class="form-control">
                                        <span onclick="passwordShowUnshow()" style="cursor: pointer;">
                                            <i class="fa fa-eye"></i> Tampilkan/Sembunyikan Password
                                        </span>
                                        <br><br>
                                        <a href="<?= base_url() ?>pegawai/daftarPegawai" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                        <button class="btn btn-warning btn-sm" onclick="return confirm('Apakah anda yakin ingin mengganti Password Pegawai?')"><i class="fa fa-unlock-alt"></i> Ganti Password </button>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>