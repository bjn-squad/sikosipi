<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-form">
                <form action="<?= base_url() ?>auth/cekJawaban" method="POST">
                    <div class="form-group">
                        <center><label style="font-weight: bold;">Jawab Pertanyaan</label></center>
                        <?= $this->session->flashdata('message'); ?><br>
                        <?php foreach ($loadPertanyaan as $load) {
                        ?>
                            <label class="font-weight-bold"><?= $load['pertanyaankeamanan1'] ?></label>
                            <input type="text" name="jawabankeamanan1" class="form-control" placeholder="Jawaban 1" autofocus required>
                            <label class="font-weight-bold"><?= $load['pertanyaankeamanan2'] ?></label>
                            <input type="text" name="jawabankeamanan2" class="form-control" placeholder="Email or Username" required>
                        <?php
                        } ?>
                    </div>
                    <button type="submit" class="btn btn-success">Ubah Password<i class="fa fa-sign-in"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>