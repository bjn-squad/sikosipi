<!DOCTYPE html>
<html>

<head>
    <title>Nota Transaksi</title>
</head>

<body>
    <img src="<?= base_url() ?>assets/home/img/kop.jpg" style="position: absolute; width: 60px; height: auto;">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold;">
                    KOPERASI SIMPAN PINJAM MITRA ARTHA
                    <br> Jl. Gajah Mada No.114, Sukorejo Lor, Sukorejo
                    <br>BOJONEGORO
                </span>
            </td>
        </tr>
    </table>
    <hr align=”center” size=“2”>

    <table class="table table-bordered">
    </table>
    <table>
        <div class="row">
            <div class="col-lg-12">
                <p align="center">
                    NOTA SETORAN SIMPANAN
                </p>
                <div class="card">
                    <?php
                    foreach ($simpanan_detail as $item) {
                    ?>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama Penyetor</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_anggota'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Nama Teller</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['nama_pegawai'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Jumlah Setor Tunai</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['jumlah_setor_tunai'] ?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Tanggal Setor</label></div>
                                <div class="col-12 col-md-9"><label><?= $item['tanggal_setor_tunai'] ?></label></div>
                            </div>

                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </table>
</body>

</html>