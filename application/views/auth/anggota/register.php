<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-form">
                <form action="<?= base_url() ?>auth/prosesRegisterAnggota" method="POST">
                    <div class="form-group">
                        <center><label style="font-weight: bold;">Register Anggota</label></center>
                        <div class="login-logo">
                            <a href="<?= base_url() ?>auth">
                                <img class="align-content" src="<?= base_url() ?>assets/datakoperasi/logo_koperasi.png" width="20%" alt="">
                            </a>
                        </div>
                        <?php if (validation_errors()) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors() ?>
                            </div>
                        <?php
                        } ?>
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="<?= set_value('nama_lengkap'); ?>" class="form-control" placeholder="nama" autofocus required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <input type="text" name="alamat" value="<?= set_value('alamat'); ?>" class="form-control" placeholder="Jl. ...." required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" value="<?= set_value('username'); ?>" class="form-control" placeholder="username" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?= set_value('email'); ?>" class="form-control" placeholder="email@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input type="text" name="no_telpon" value="<?= set_value('no_telpon'); ?>" class="form-control" placeholder="085xxxxxxx" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" onclick="passwordShowUnshow()"> <i class="fa fa-eye"></i> Show/Unshow Password
                        </label>
                        <label class="pull-right">
                            <a href="<?= base_url() ?>lupapassword/reset">Lupa Password?</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Register <i class="fa fa-sign-in"></i></button>
                    <div class="register-link m-t-15 text-center">
                        <p>Login Sebagai Anggota?<a href="<?= base_url() ?>auth/loginAnggota"> Klik Disini!</a><br>
                            Login Sebagai Pegawai?<a href="<?= base_url() ?>auth/loginPegawai"> Klik Disini!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>