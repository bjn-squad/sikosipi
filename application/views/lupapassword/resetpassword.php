<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-form">
                <form action="<?= base_url() ?>lupapassword/reset" method="POST">
                    <div class="form-group">
                        <center><label style="font-weight: bold;">Reset Password Anggota</label></center>
                        <?= $this->session->flashdata('message'); ?>
                        <label>Email / Username Anggota</label>
                        <input type="text" name="emailorusername" class="form-control" placeholder="Email or Username" autofocus required>
                    </div>
                    <button type="submit" class="btn btn-success">Selanjutnya<i class="fa fa-sign-in"></i></button>
                    <a href="<?= base_url() ?>auth/loginAnggota" class="btn btn-warning">Kembali <i class="fa fa-undo"></i></a>
                    <div class="register-link m-t-15 text-center">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>