<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Anggota</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status Anggota</th>
                                    <th>No Telfon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($anggota as $item) { ?>
                                    <tr>
                                        <td><?= $item['nama_anggota'] ?></td>
                                        <td><?= $item['email'] ?></td>
                                        <td><?= $item['status_anggota'] ?></td>
                                        <td><?= $item['no_telp_anggota'] ?></td>
                                        <td>
                                            <!-- TODO : Lanjut ini -->
                                            <a href="" class="badge badge-info"><i class="fa fa-eye"></i> Detail</a>
                                            <a href="" class="badge badge-warning"><i class="fa fa-unlock-alt"></i> Ubah Password</a>
                                            <?php
                                            if ($item['status_anggota'] == "Dinonaktifkan") {
                                            ?>
                                                <a href="" class="badge badge-success"><i class="fa fa-minus"></i> Aktifkan Akun</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="" class="badge badge-danger"><i class="fa fa-minus"></i> Nonaktifkan Akun</a>
                                            <?php }
                                            ?>
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