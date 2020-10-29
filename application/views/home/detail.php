<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_4">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Pengumuman & Informasi</h3>
                    <h5 style="color: white;">Segala Pengumuman & Informasi Mengenai KSP Mitra Artha</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- about_area_end  -->
<div class="works_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-90">
                    <span class="wow lightSpeedIn" data-wow-duration="1s" data-wow-delay=".1s"></span>
                    <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">Detail Pengumuman</h3>
                    <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Koperasi Simpan Pinjam Mitra Artha</p>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <?php
                    foreach ($pengumuman as $i) {
                    ?>
                        <div class="card-body card-block">
                            <a href="<?= base_url() ?>home/pengumuman" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                            <center>
                                <h1><?= $i['judul'] ?></h1>
                                <?php
                                if ($i['header_gambar'] != 'Tidak Ada Gambar') {
                                ?>
                                    <br>
                                    <img src="<?php echo base_url('assets/datakoperasi/pengumuman/' . $i['header_gambar']) ?>" width="40%" />

                                <?php
                                } ?>
                            </center>
                            <p style="white-space: pre-line; color:black; text-align: justify;">
                                <?= $i['isi'] ?>
                            </p>
                            <hr>
                            <ul class="blog-info-link">
                                <li><i class="fa fa-calendar"></i><?= $i['tanggal_post'] ?></a>
                                <li><i class="fa fa-user"></i><?= $i['nama_pegawai'] ?></a>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>