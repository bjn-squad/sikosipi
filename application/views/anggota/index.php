<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Diri Anggota</strong>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <?php foreach ($data as $data) {
                            if ($data['status_anggota'] == 'Tidak Aktif') { ?>
                                <div class="alert alert-danger" role="alert">
                                    Status keanggotaan anda masih tidak aktif, silahkan lakukan verifikasi! <a href="<?= base_url() ?>anggota/verifikasi" class="font-weight-bold">Klik Disini Untuk Verifikasi!</a>
                                </div>
                            <?php } else if ($data['status_anggota'] == 'Aktif') {
                            ?>
                                <div class="alert alert-primary" role="alert">
                                    Selamat Datang Anggota Koperasi!
                                </div>

                            <?php
                            } else if ($data['status_anggota'] == 'Sedang Diverifikasi') {
                            ?>
                                <div class="alert alert-info" role="alert">
                                    Status keanggotaan anda sedang dalam proses verifikasi, silahkan menunggu 1-2 hari kerja.
                                </div>
                            <?php
                            } else if ($data['status_anggota'] == "Verifikasi Ulang") {
                            ?>
                                <div class="alert alert-info" role="alert">
                                    <b></b><br>
                                    <b><i>Mohon perhatikan aturan dibawah agar verifikasi dapat berjalan dengan lancar.</i></b>
                                    <b><i class="fa fa-info-circle"></i> Aturan Gambar/Foto :</b><br>
                                    1. Data Identitas Yang Dapat Diterima : KTP<br>
                                    2. Data Identitas Wajib Jelas (<b>Tidak Blur, Terpotong Dsb</b>)<br>
                                    3. Ukuran Maksimal 3 Mb<br>
                                    4. Format JPG / PNG<br>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="alert alert-warning" role="alert">
                                    Status Keanggotaan Anda <?= $data['status_anggota'] ?>. Jika merasa ada kesalahan terhadap status keanggotaan anda silahkan datang ke koperasi untuk mengurus.
                                </div>
                            <?php
                            } ?>
                            <label class="font-weight-bold">Nama :</label> <?= $data['nama_anggota'] ?><br>
                            <label class="font-weight-bold">Alamat :</label> <?= $data['alamat_anggota'] ?><br>
                            <label class="font-weight-bold">No Telfon :</label> <?= $data['no_telp_anggota'] ?><br>
                            <label class="font-weight-bold">Username :</label> <?= $data['username'] ?><br>
                            <label class="font-weight-bold">Email :</label> <?= $data['email'] ?><br>
                            <label class="font-weight-bold">Tanggal Keanggotaan :</label> <?= $data['tanggal_keanggotaan'] ?><br>
                            <label class="font-weight-bold">Status Keanggotaan :</label> <?= $data['status_anggota'] ?><br>
                            <label class="font-weight-bold">Foto KTP :</label><br>
                            <?php
                            if ($data['foto_ktp_anggota'] == 'Belum Diupload') {
                                echo $data['foto_ktp_anggota'];
                            } else {
                            ?>
                                <img src="<?= base_url('assets/datakoperasi/imganggota/ktp/') ?><?= $data['foto_ktp_anggota'] ?>" class="img-fluid" alt="Responsive image" width="500px">
                            <?php
                            }
                            ?>
                            <br>
                            <label class="font-weight-bold">Foto KYC :</label><br>
                            <?php
                            if ($data['foto_selfie_ktp_anggota'] == 'Belum Diupload') {
                                echo $data['foto_ktp_anggota'];
                            } else {
                            ?>
                                <img src="<?= base_url('assets/datakoperasi/imganggota/kyc/') ?><?= $data['foto_selfie_ktp_anggota'] ?>" class="img-fluid" alt="Responsive image" width="500px">
                            <?php
                            }
                            ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->