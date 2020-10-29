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
                    <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">Pengumuman</h3>
                    <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Koperasi Simpan Pinjam Mitra Artha</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($pengumuman as $pg) {
            ?>
                <div class="col-md-6 col-lg-4">

                    <article class="blog_item">
                        <div class="blog_item_img">

                            <?php
                            if ($pg['header_gambar'] != 'Tidak Ada Gambar') { ?>
                                <img style="width: 100%;height:20vw;object-fit: cover;" src="<?php echo base_url('assets/datakoperasi/pengumuman/' . $pg['header_gambar']) ?>" />
                            <?php
                            } else {
                            ?>
                                <img style="width: 100%;height:20vw;object-fit: cover" src="<?php echo base_url('assets/datakoperasi/pengumuman/imgnotav.png') ?>" />
                            <?php
                            }
                            ?>

                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="<?php base_url() ?>detail/<?= $pg['id_pengumuman'] ?>">
                                <h3><?= $pg['judul'] ?></h3>
                            </a>
                            <p style="white-space: pre-line; width: 100%;height:12vw;object-fit: cover; text-align: justify;">
                                <?php echo substr($pg['isi'], 0, 120) ?>... <a href="<?php base_url() ?>detail/<?= $pg['id_pengumuman'] ?>" class="badge btn-small"> Read More</a></td>
                            </p>
                            <ul class="blog-info-link">
                                <li><i class="fa fa-calendar"></i><?= $pg['tanggal_post'] ?></a>
                            </ul>
                        </div>
                    </article>

                </div>
            <?php } ?>
        </div>
    </div>
</div>