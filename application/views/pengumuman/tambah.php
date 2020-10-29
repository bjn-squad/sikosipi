<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Tambah Pengumuman</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="<?php base_url("pengumuman/add") ?>" method="post" enctype="multipart/form-data">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Judul</label></div>
                                <div class="col-12 col-md-9"><input type="text" required class="form-control <?php echo form_error('judul') ? 'is-invalid' : '' ?>" name="judul" placeholder="Judul Pengumuman"></div>
                                <div class="invalid-feedback">
                                    <?php echo form_error('judul') ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Deskripsi</label></div>
                                <div class="col-12 col-md-9"><textarea rows="9" class="form-control <?php echo form_error('isi') ? 'is-invalid' : '' ?>" required name="isi" placeholder="Deskripsi Pengumuman"></textarea></div>
                                <div class="invalid-feedback">
                                    <?php echo form_error('isi') ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col  col-md-3"><label for="file-input" class=" form-control-label">Gambar</label></div>
                                <div class="col-12 col-md-9"><input class="form-control-file <?php echo form_error('header_gambar') ? 'is-invalid' : '' ?>" type="file" name="header_gambar" /></div>
                                <div class="invalid-feedback">
                                    <?php echo form_error('header_gambar') ?>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="<?= base_url() ?>pengumuman" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                <button type="submit" name="submit" class="btn btn-success btn-sm">Submit Pengumuman</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>