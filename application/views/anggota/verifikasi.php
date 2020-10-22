<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Verifikasi Data</strong>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($this->session->flashdata('error'))) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <b><i class="fa fa-warning"></i> Warning <label class="font-weight-bold"><?= $this->session->flashdata('error') ?></label></b>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="alert alert-info" role="alert">
                            <b><i class="fa fa-info-circle"></i> Aturan Gambar/Foto :</b><br>
                            1. Data Identitas Yang Dapat Diterima : KTP<br>
                            2. Data Identitas Wajib Jelas (Tidak Blur, Terpotong Dsb)<br>
                            3. Ukuran Maksimal 3 Mb<br>
                            4. Format JPG / PNG<br>
                            <i>Mohon perhatikan aturan diatas agar verifikasi dapat berjalan dengan lancar.</i>
                        </div>
                        Contoh Pengumpulan Data Identitas Yang Benar : <br><br>
                        <center>
                            <img src="<?= base_url() ?>assets/datakoperasi/contoh.jpg" style="width: 350px"><br>
                            <img src="<?= base_url() ?>assets/datakoperasi/example-kyc.jpg" style="width: 600px">
                        </center>
                        <br><br>
                        <form method="POST" enctype="multipart/form-data" action="<?= base_url() ?>anggota/verifikasi">
                            <input type="hidden" name="id_anggota" value="<?= $this->session->userdata('id_anggota') ?>" required><br>
                            Upload Foto KTP : <br><br>
                            <input type="file" name="gambarKTP" style="margin-bottom: 20px" required><br>
                            Upload Foto Diri bersama KTP : <br><br>
                            <input type="file" name="gambarKYC" style="margin-bottom: 20px" required><br>
                            <button type="submit" class="btn btn-info" name="submit"><i class="fa fa-upload"></i> Upload Gambar</button>
                            <a href="<?= base_url() ?>anggota" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->