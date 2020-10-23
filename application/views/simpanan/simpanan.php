<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Simpanan</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah Simpanan Pokok</th>
                                    <th>Jumlah Simpanan Wajib</th>
                                    <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php foreach ($simpanan as $item) { ?>
                                    <tr>
                                        <td><?= $item['id_simpanan'] ?></td>
                                        <td><?= $item['jumlah_simpanan_pokok'] ?></td>
                                        <td><?= $item['jumlah_simpanan_wajib'] ?></td>
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