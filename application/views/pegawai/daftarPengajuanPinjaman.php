<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Pengajuan Pinjaman</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>Nama Anggota</th>
                                    <th>Total Dana Yang Diajukan</th>
                                    <th>Status Pengajuan</th>
                                    <th>Oleh Pegawai</th>
                                    <th>Oleh Admin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pinjaman as $item) { ?>
                                    <tr>
                                        <td><?= $item['nama_anggota'] ?></td>
                                        <td><?= $item['tanggal_pengajuan'] ?></td>
                                        <td><?= $item['status_pengajuan'] ?></td>
                                        <td><?= $item['verifikasi_pegawai'] ?></td>
                                        <td><?= $item['verifikasi_admin'] ?></td>
                                        <td>
                                            <?php
                                            if ($item['verifikasi_pegawai'] == "Sedang Diverifikasi") {
                                            ?>
                                                <a href="<?= base_url() ?>pegawai/verifikasiPengajuanPinjaman/<?= $item['id_pengajuan'] ?>" class="badge badge-success"><i class="fa fa-check"></i> Verifikasi Pengajuan Pinjaman</a>
                                            <?php
                                            }
                                            ?>
                                            <a href="<?= base_url() ?>pegawai/detailPengajuanPinjaman/<?= $item['id_pengajuan'] ?>" class="badge badge-info"><i class="fa fa-eye"></i> Detail</a>
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