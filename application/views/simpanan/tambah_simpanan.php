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
                                    <strong>Transaksi Tambah Simpanan</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label">Nama</label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="id_anggota" id="select" class="form-control">
                                                    <?php foreach ($anggota as $item) {
                                                    ?>
                                                        <option value="<?= $item['id_anggota'] ?>"><?= $item['nama_anggota'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Simpanan Pokok </label></div>
                                            <div class="col-12 col-md-9"><input type="number" id="text-input" name="jumlah_simpanan_pokok" placeholder="Number" class="form-control"><small class="form-text text-muted" required></small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Simpanan Wajib</label></div>
                                            <div class="col-12 col-md-9"><input type="number" id="text-input" name="jumlah_simpan_wajib" placeholder="Number" class="form-control"><small class="form-text text-muted" required></small></div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button>
                                        </div>
                                </div>