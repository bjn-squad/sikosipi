<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Dashboard Pegawai</strong>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <h5>Profil Anda</h5><br>
                        <?php foreach ($pegawai as $data) {
                        ?>
                            <label class="font-weight-bold">Nama :</label> <?= $data['nama_pegawai'] ?><br>
                            <label class="font-weight-bold">Alamat :</label> <?= $data['alamat_pegawai'] ?><br>
                            <label class="font-weight-bold">No Telfon :</label> <?= $data['no_telp_pegawai'] ?><br>
                            <label class="font-weight-bold">Username :</label> <?= $data['username'] ?><br>
                            <label class="font-weight-bold">Email :</label> <?= $data['email'] ?><br>
                            <label class="font-weight-bold">Jabatan Anda :</label>
                            <?php
                            if ($data['kategori'] == 1) {
                                echo 'Admin';
                            } else {
                                echo 'Pegawai';
                            }
                            ?>
                            <br>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->