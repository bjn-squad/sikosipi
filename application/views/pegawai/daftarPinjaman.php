<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Pinjaman</strong>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        } ?>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>Nama Anggota</th>
                                    <th>Status pinjaman</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pelunasan</th>
                                    <th>Total Pinjaman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pinjaman as $item) { ?>
                                    <tr>
                                        <td><?= $item['nama_anggota'] ?></td>
                                        <td><?= $item['status_pinjaman'] ?></td>
                                        <td><?= date("d-m-Y", strtotime($item['tanggal_meminjam'])) ?></td>
                                        <td>
                                            <?php
                                            if ($item['tanggal_pelunasan'] == "") {
                                                echo $item['tanggal_pelunasan'];
                                            } else {
                                                echo date("d-m-Y", strtotime($item['tanggal_pelunasan']));
                                            } ?>
                                        </td>
                                        <td><?= $item['total_pinjaman'] ?></td>
                                        <td>
                                            <?php
                                            if ($item['status_pinjaman'] == "Belum Lunas") {
                                            ?>
                                                <a href="<?= base_url() ?>pegawai/ubahPinjaman/<?= $item['id_pinjaman'] ?>" class="badge badge-warning"><i class="fa fa-book"></i> Ubah Status Pinjaman</a>
                                                <a href="<?= base_url() ?>pegawai/tambahAngsuran/<?= $item['id_pinjaman'] ?>" class="badge badge-success"><i class="fa fa-plus"></i> Tambah Angsuran</a>
                                            <?php
                                            }
                                            ?>
                                            <a href="<?= base_url() ?>pegawai/riwayatAngsuran/<?= $item['id_pinjaman'] ?>" class="badge badge-info"><i class="fa fa-eye"></i> Riwayat Angsuran</a>
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