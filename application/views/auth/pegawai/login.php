<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="<?= base_url() ?>assets/datakoperasi/logo_koperasi.png" width="20%" alt="">
                </a>
            </div>
            <div class="login-form">
                <form action="" method="POST">
                    <div class="form-group">
                        <center><label>Login Pegawai Koperasi</label></center>
                        <?= $this->session->flashdata('message'); ?><br>
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="email@email.com">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" onclick="passwordShowUnshow()"> <i class="fa fa-eye"></i> Show/Unshow Password
                        </label>
                        <label class="pull-right">
                            <a href="#">Lupa Password?</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Login <i class="fa fa-arrow-right"></i></button>
                    <div class="register-link m-t-15 text-center">
                        <p>Login Sebagai Anggota?<a href="#"> Klik Disini!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>