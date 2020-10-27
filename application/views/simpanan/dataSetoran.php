<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Riwayat Setoran</strong>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url() ?>simpanan/dataSimpanan" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a><br><br>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Setor Tunai</th>
                                    <th>Jumlah Setoran Tunai</th>
                                    <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data_setoran as $item) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $item['tanggal_setor_tunai'] ?></td>
                                        <td><?= $item['jumlah_setor_tunai'] ?></td>
                                        <td>
                                            <a href="" class="badge badge-danger"><i class="fa fa-trash-o"></i>Hapus</a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->