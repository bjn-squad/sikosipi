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
                                    Status keanggotaan anda masih tidak aktif, silahkan lakukan verifikasi! <a href="" class="font-weight-bold">Klik Disini Untuk Verifikasi!</a>
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
                            } else {
                            ?>
                                <div class="alert alert-warning" role="alert">
                                    <?= $data['status_anggota'] ?>
                                </div>
                            <?php
                            } ?>
                            <label class="font-weight-bold">Nama :</label> <?= $data['nama_anggota'] ?><br>
                            <label class="font-weight-bold">Alamat :</label> <?= $data['alamat_anggota'] ?><br>
                            <label class="font-weight-bold">No Telfon :</label> <?= $data['no_telp_anggota'] ?><br>
                            <label class="font-weight-bold">Username :</label> <?= $data['username'] ?><br>
                            <label class="font-weight-bold">Email :</label> <?= $data['email'] ?><br>
                            <label class="font-weight-bold">Tanggal Keanggotaan :</label> <?= $data['tanggal_keanggotaan'] ?><br>
                            <label class="font-weight-bold">Foto KTP :</label><br>
                            <?php
                            if ($data['foto_ktp_anggota'] == 'Belum Diupload') {
                                echo $data['foto_ktp_anggota'];
                            } else {
                            ?>
                                <img src="<?= base_url() ?><?= $data['foto_ktp_anggota'] ?>" class="img-fluid" alt="Responsive image">
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
                                <img src="<?= base_url() ?><?= $data['foto_selfie_ktp_anggota'] ?>" class="img-fluid" alt="Responsive image">
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