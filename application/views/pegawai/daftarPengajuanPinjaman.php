<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Pengajuan Pinjaman</strong>
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
                                    <th>Tanggal Pengajuan</th>
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
                                        <td><?= date("d-m-Y", strtotime($item['tanggal_pengajuan'])) ?></td>
                                        <td><?= $item['total_pengajuan_pinjaman'] ?></td>
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
                                            if ($item['status_pengajuan'] == "Diterima" && $item['pesan'] != "Pinjaman anda telah terdaftar") {
                                            ?>
                                                <a href="<?= base_url() ?>pegawai/tambahPinjaman/<?= $item['id_pengajuan'] ?>" class="badge badge-success"><i class="fa fa-plus"></i> Tambahkan ke daftar pinjaman</a>
                                            <?php
                                            }
                                            if ($item['verifikasi_admin'] == "Sedang Diverifikasi" && $item['status_pengajuan'] == "Sedang Diverifikasi" && $this->session->userdata('kategori') == "1" && $item['verifikasi_pegawai'] == "Verifikasi Diterima") {
                                            ?>
                                                <a href="<?= base_url() ?>pegawai/verifikasiPengajuanPinjamanByAdmin/<?= $item['id_pengajuan'] ?>" class="badge badge-success"><i class="fa fa-check"></i> Verifikasi Pengajuan</a>
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