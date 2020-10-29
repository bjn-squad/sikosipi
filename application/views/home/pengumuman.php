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
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php foreach ($pengumuman as $i) {
                    ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <?php
                                if ($i['header_gambar'] == 'Tidak Ada Gambar') {
                                ?>
                                    <img style="object-fit: cover;" class="card-img rounded-0" src="<?= base_url() ?>assets/datakoperasi/pengumuman/tidakadagambar.jpg" alt="Gambar">
                                <?php
                                } else {
                                ?>
                                    <img style="object-fit: cover;" class="card-img rounded-0" src="<?= base_url() ?>assets/datakoperasi/pengumuman/<?= $i['header_gambar'] ?>" alt="">
                                <?php
                                }
                                ?>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.html">
                                    <h2><?= $i['judul'] ?></h2>
                                </a>
                                <p><?= substr($i['isi'], 0, 120) ?> <a href="">... Read More</a></p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> <?= $i['nama_pegawai'] ?></a></li>
                                    <li><a href="#"><i class="fa fa-calendar"></i><?= $i['tanggal_post'] ?></a></li>
                                </ul>
                            </div>
                        </article>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>