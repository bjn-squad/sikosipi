<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Pengajuan Penarikan</strong>
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
                                    <th>Total Dana Yang Ditarik</th>
                                    <th>Status Penarikan</th>
                                    <th>Oleh Pegawai</th>
                                    <th>Oleh Admin</th>
                                    <th>Pesan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($simpanan as $item) { ?>
                                    <tr>
                                        <td><?= $item['nama_anggota'] ?></td>
                                        <td><?= date("d-m-Y", strtotime($item['tanggal_permintaan_penarikan'])) ?></td>
                                        <td><?= $item['nominal_total_penarikan'] ?></td>
                                        <td><?= $item['status_penarikan'] ?></td>
                                        <td><?= $item['verifikasi_pegawai'] ?></td>
                                        <td><?= $item['verifikasi_admin'] ?></td>
                                        <td><?= $item['pesan'] ?></td>
                                        <td>
                                            <?php
                                            if ($item['verifikasi_pegawai'] == "Belum Diverifikasi") {
                                            ?>
                                                <a href="<?= base_url() ?>simpanan/verifikasiPenarikanByPegawai/<?= $item['id_penarikan'] ?>" class="badge badge-success"><i class="fa fa-check"></i> Verifikasi Penarikan Simpanan</a>
                                            <?php
                                            }

                                            if ($item['verifikasi_admin'] == "Belum Diverifikasi" && $item['status_penarikan'] == "Belum Diverifikasi" && $this->session->userdata('kategori') == "1" && $item['verifikasi_pegawai'] == "Verifikasi Diterima") {
                                            ?>
                                                <a href="<?= base_url() ?>simpanan/verifikasiPenarikanByAdmin/<?= $item['id_penarikan'] ?>" class="badge badge-success"><i class="fa fa-check"></i> Verifikasi Penarikan</a>
                                            <?php
                                            }
                                            ?>
                                            <a href="<?= base_url() ?>simpanan/detailPenarikanSimpanan/<?= $item['id_penarikan'] ?>" class="badge badge-info"><i class="fa fa-eye"></i> Detail</a>
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