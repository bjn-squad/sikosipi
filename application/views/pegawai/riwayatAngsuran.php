<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Riwayat Angsuran Anggota</strong>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url() ?>pegawai/daftarPinjaman" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a><br><br>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anggota</th>
                                    <th>Nama Pegawai</th>
                                    <th>Tanggal Angsuran</th>
                                    <th>Jumlah Angsuran</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pinjaman as $item) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $item['nama_anggota'] ?></td>
                                        <td><?= $item['nama_pegawai'] ?></td>
                                        <td><?= $item['tanggal_angsuran'] ?></td>
                                        <td><?= $item['angsuran_pembayaran'] ?></td>
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