<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Anggota</strong>
                    </div>
                    <?php
                    foreach ($pengumuman as $i) {
                    ?>
                        <div class="card-body card-block">
                            <a href="<?= base_url() ?>pengumuman" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                            <center>
                                <h3><?= $i['judul'] ?></h3>
                                <h6>
                                    <?= $i['nama_pegawai'] ?>, <?= $i['tanggal_post'] ?>
                                </h6>
                                <?php
                                if ($i['header_gambar'] != 'Tidak Ada Gambar') {
                                ?>
                                    <br>
                                    <img src="<?php echo base_url('assets/datakoperasi/pengumuman/' . $i['header_gambar']) ?>" width="40%" />

                                <?php
                                } ?>
                            </center>
                            <p style="white-space: pre-line;color:black">
                                <?= $i['isi'] ?>
                            </p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>