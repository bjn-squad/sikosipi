<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-form">
                <form action="<?= base_url() ?>lupapassword/cekJawaban" method="POST">
                    <div class="form-group">
                        <center><label style="font-weight: bold;">Jawab Pertanyaan Untuk Mereset Password</label></center>
                        <?= $this->session->flashdata('message'); ?><br>
                        <?php foreach ($loadPertanyaan as $load) {
                        ?>
                            <label class="font-weight-bold">Pertanyaan</label><br>
                            <input type="hidden" name="id_anggota" value="<?= $load['id_anggota'] ?>">
                            <label class="font-weight-bold">1. <?= $load['pertanyaankeamanan1'] ?></label>
                            <input type="text" name="jawabankeamanan1" class="form-control" placeholder="Masukkan Jawaban" autofocus required>
                            <label class="font-weight-bold">2. <?= $load['pertanyaankeamanan2'] ?></label>
                            <input type="text" name="jawabankeamanan2" class="form-control" placeholder="Masukkan Jawaban" required>
                        <?php
                        } ?>
                    </div>
                    <button type="submit" class="btn btn-success">Cek Jawaban <i class="fa fa-flag"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>