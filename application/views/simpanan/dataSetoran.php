<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Setoran</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Simpanan</th>
                                    <th>Tanggal Setor Tunai</th>
                                    <th>Jumlah Setoran Tunai</th>
                                    <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php foreach ($data_setoran as $item) { ?>
                                    <tr>
                                        <td><?= $item['id_simpanan_detai'] ?></td>
                                        <td><?= $item['tanggal_setor_tunai'] ?></td>
                                        <td><?= $item['jumlah_setor_tunai'] ?></td>
                                        <td>
                                            <!-- TODO : Lanjut ini -->
                                            <a href="" class="badge badge-info"><i class="fa fa-eye"></i> Detail</a>
                                            <a href="" class="badge badge-warning"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="" class="badge badge-danger"><i class="fa fa-trash-o"></i>Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->