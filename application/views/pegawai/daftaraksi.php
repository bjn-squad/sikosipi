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
                                    <th>ID Data Kategori</th>
                                    <th>Kategori Aksi</th>
                                    <th>Pegawai Yang Request</th>
                                    <th>Alasan Penonaktifan</th>
                                    <th>Nama Admin Verifikasi</th>
                                    <th>Status Aksi</th>
                                    <th>Status Verifikasi</th>
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
                                        <td><?= $item['kategori_aksi'] ?></td>
                                        <td><?= $item['nama_pegawai'] ?></td>
                                        <td>
                                            <span style="white-space: pre-line;">
                                                <?= $item['pesan_aksi'] ?>
                                            </span>
                                        </td>
                                        <td><?= $item['nama_admin'] ?></td>
                                        <td><?= $item['status_aksi'] ?></td>
                                        <td><?= $item['status_verifikasi'] ?></td>
                                        <td>
                                            <?php
                                            if ($item['status_verifikasi'] == "Pending") {

                                                if ($this->session->userdata('kategori') == "1") {
                                            ?>
                                                    <a href="<?= base_url() ?>pegawai/reviewPenonaktifanAnggota/<?= $item['id_aksi'] ?>" class="badge badge-info"><i class="fa fa-eye"></i> Review Aksi</a>
                                            <?php
                                                } else {
                                                    echo "Anda Bukan Admin";
                                                }
                                            } else {
                                                echo 'Aksi Telah Ditanggapi Admin';
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