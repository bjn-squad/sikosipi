<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Pengumuman</strong>
                    </div>
                    <div class="card-body card-block">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="input-group">
                                <?php echo anchor('pengumuman/add', 'Tambah', array('class' => 'btn btn-info btn-sm')) ?>
                            </div>
                        </form>
                    </div>
                    <div class=" card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Tanggal Post</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pengumuman as $pengumuman) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>

                                        <td><?php echo $pengumuman['judul'] ?></td>
                                        <td><?php echo $pengumuman['nama_pegawai'] ?></td>
                                        <td><?php echo $pengumuman['tanggal_post'] ?></td>
                                        <td>
                                            <a href="<?php base_url() ?>pengumuman/detail/<?= $pengumuman['id_pengumuman'] ?>" class="badge badge-info btn-small"><i class="fa fa-eye"></i> Detail</a>
                                            <a href="<?php base_url() ?>pengumuman/edit/<?= $pengumuman['id_pengumuman'] ?>" class="badge badge-primary btn-small"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="<?php base_url() ?>pengumuman/delete/<?= $pengumuman['id_pengumuman'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus pengumuman ini?')" class="badge badge-danger btn-small"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->