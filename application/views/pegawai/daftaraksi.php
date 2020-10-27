<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Aksi</strong>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        } ?>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>Nomer Transaksi</th>
                                    <th>ID Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Nama Pegawai</th>
                                    <th>Nama Admin Verifikasi</th>
                                    <th>Status Verifikasi Admin</th>
                                    <th>Status Aksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($aksi as $item) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $item['id_data_kategori'] ?></td>
                                        <td><?= $item['kategori'] ?></td>
                                        <td><?= $item['nama_pegawai'] ?></td>
                                        <td><?= $item['nama_admin'] ?></td>
                                        <td><?= $item['status_verifikasi'] ?></td>
                                        <td><?= $item['status_aksi'] ?></td>
                                        <td>
                                            <?php
                                            if ($this->session->userdata('kategori') == "1") {
                                            ?>
                                                <a href="" class="badge badge-success"><i class="fa fa-check"></i> Verifikasi Status</a>
                                            <?php
                                            } else {
                                                echo "There's nothing you can do. Just wait.";
                                            }
                                            ?>
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