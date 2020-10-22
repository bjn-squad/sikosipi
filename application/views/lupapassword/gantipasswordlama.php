<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-form">
                <form action="<?= base_url() ?>lupapassword/prosesUbahPassword" method="POST">
                    <div class="form-group">
                        <center><label style="font-weight: bold;">Ganti Password Anda</label></center>
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <div class="form-group">
                        <?php foreach ($id as $id) {
                        ?>
                            <label>Password Baru (Email : <?= $id['email'] ?>)</label>
                            <input type="hidden" name="id_anggota" value="<?= $id['id_anggota'] ?>" required>
                        <?php }
                        ?>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" onclick="passwordShowUnshow()"> <i class="fa fa-eye"></i> Show/Unshow Password
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Ubah Password <i class="fa fa-unlock-alt"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>