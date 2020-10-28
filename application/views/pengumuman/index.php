<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Pengumuman</strong>
                    </div>
                    <div class="card-body card-block">
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
                                    <th>Gambar</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal Post</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            foreach ($pengumuman as $pengumuman) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <img src="<?php echo base_url('assets/datakoperasi/pengumuman/' . $pengumuman->header_gambar) ?>" width="64" />
                                        </td>
                                        <td><?php echo substr($pengumuman->isi, 0, 120) ?>...</td>
                                        <td><?php echo $pengumuman->tanggal_post ?></td>
                                        <td>
                                            <!-- TODO : Lanjut ini -->
                                            <a href="<?php echo site_url('pengumuman/edit/' . $pengumuman->id_pengumuman) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                            <a onclick="deleteConfirm('<?php echo site_url('pengumuman/delete/' . $pengumuman->id_pengumuman) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->