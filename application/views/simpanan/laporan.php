<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Laporan Simpanan</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-md-4 text-right">
                                    <h4>Tanggal</h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control float-right" id="periode" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <button type="button" class="btn btn-success" id="cetak"><i class="fa fa-file-pdf-o"></i> Cetak Laporan</button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <div class="card-body card-block">
                            <table class="table table-bordered" id="table-order" style="margin-bottom: 10px">
                                <thead>
                                    <tr>
                                        <th width="10">No</th>
                                        <th width="150">Nama</th>
                                        <th width="150">Pegawai</th>
                                        <th width="150">Tanggal Transaksi</th>
                                        <th width="200">Total Pinjaman</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>