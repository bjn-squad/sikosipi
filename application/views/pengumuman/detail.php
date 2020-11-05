<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Pengumuman</strong>
                    </div>
                    <?php
                    foreach ($pengumuman as $i) {
                    ?>
                        <div class="card-body card-block">
                            <a href="<?= base_url() ?>pengumuman" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                            <center>
                                <h1><?= $i['judul'] ?></h1>
                                <br>
                                <?php
                                if ($i['header_gambar'] != 'Tidak Ada Gambar') {
                                ?>
                                    <img src="<?php echo base_url('assets/datakoperasi/pengumuman/' . $i['header_gambar']) ?>" width="40%" />
                                <?php
                                } else {
                                ?>
                                    <img src="<?php echo base_url('assets/datakoperasi/pengumuman/imgnotav.png') ?>" width="20%" />
                                <?php
                                } ?>
                            </center>
                            <p style="white-space: pre-line;color:black; text-align: justify;">
                                <?= $i['isi'] ?>
                            </p>
                            <hr>
                            <i class="fa fa-calendar"></i> <?= $i['tanggal_post'] ?></a> |
                            <i class="fa fa-user"></i> <?= $i['nama_pegawai'] ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>