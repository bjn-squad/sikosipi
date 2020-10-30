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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tambah Pegawai Baru</strong>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>pegawai/tambahPegawaiBaru" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <?php if (validation_errors()) {
                                ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= validation_errors() ?>
                                    </div>
                                <?php
                                } ?>
                                <label class=" form-control-label">Nama Pegawai</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_pegawai" required autofocus>
                                </div>
                                <label class=" form-control-label">Alamat Pegawai</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="alamat_pegawai" required>
                                </div>
                                <label class=" form-control-label">No Telpon Pegawai</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="no_telp_pegawai" required>
                                </div>
                                <small>Contoh : 081xxxxx</small><br>
                                <label class=" form-control-label">Username</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="username" required>
                                </div>
                                <label class=" form-control-label">Email</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="email" required>
                                </div>
                                <label class=" form-control-label">Password</label>
                                <div class="input-group">
                                    <input class="form-control" type="password" id="password" name="password" required>
                                </div>
                                <small>Minimal 5 Karakter (ex : siti1)</small><br>
                                <span onclick="passwordShowUnshow()" style="cursor: pointer;">
                                    <i class="fa fa-eye"></i> Tampilkan/Sembunyikan Password
                                </span>
                                <br><br>
                                <a href="<?= base_url() ?>pegawai/daftarPegawai" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                <button type="submit" onclick="return confirm('Apakah data sudah benar?')" class="btn btn-primary btn-sm">Tambah Pegawai Baru</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>