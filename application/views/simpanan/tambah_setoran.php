<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <!--/.col-->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Tambah Setoran Simpanan Wajib</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="<?= base_url() ?>simpanan/proses_tambah_setoran" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <?php foreach ($data_setoran as $item) {
                                        ?>
                                            <input type="hidden" name="id_simpanan" value="<?= $item['id_simpanan'] ?>">
                                        <?php
                                        } ?>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jumlah Setor Tunai</label></div>
                                            <div class="col-12 col-md-9"><input type="number" id="text-input" name="jumlah_setor_tunai" placeholder="Number" class="form-control" required><small class="form-text text-muted"></small></div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                            </button>
                                            <a href="<?= base_url() ?>simpanan/dataSimpanan" class="btn btn-secondary btn-sm">
                                                <i class="fa fa-arrow-left"></i> Back
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>