<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Pegawai</strong>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        } ?>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Telfon</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pegawai as $item) { ?>
                                    <tr>
                                        <td><?= $item['nama_pegawai'] ?></td>
                                        <td><?= $item['email'] ?></td>
                                        <td><?= $item['no_telp_pegawai'] ?></td>
                                        <td>
                                            <?php if ($item['kategori'] == 1) {
                                                echo 'Admin';
                                            } else {
                                                echo 'Pegawai';
                                            } ?>

                                        </td>
                                        <td>
                                            <a href="<?= base_url() ?>pegawai/detailPegawai/<?= $item['id_pegawai'] ?>" class="badge badge-info"><i class="fa fa-eye"></i> Detail</a>
                                            <?php
                                            if ($item['kategori'] != 1) {
                                            ?>
                                                <a href="<?= base_url() ?>pegawai/ubahPasswordPegawai/<?= $item['id_pegawai'] ?>" class="badge badge-warning"><i class="fa fa-unlock-alt"></i> Ubah Password</a>
                                            <?php
                                            }
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