<html>

<head>
    <title>Nota Transaksi</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <center>
        <span style="line-height: 1.6; font-weight: bold;">
            KOPERASI SIMPAN PINJAM MITRA ARTHA
            <br> Jl. Gajah Mada No.114, Sukorejo Lor, Sukorejo
            <br>BOJONEGORO
        </span>
    </center>
    <hr>
    <p align="center">
        NOTA SETORAN SIMPANAN
    </p>
    <table>
        <tr>
            <th>Nama Penyetor</th>
            <th>Nama Teller</th>
            <th>Jumlah Setor Tunai</th>
            <th>Tanggal Setor Tunai</th>
        </tr>
        <tr>
            <?php
            foreach ($simpanan_detail as $item) {
            ?>
                <td><?= $item['nama_anggota'] ?></td>
                <td><?= $item['nama_pegawai'] ?></td>
                <td>Rp. <?= number_format($item['jumlah_setor_tunai'], 0, ',', '.') ?></td>
                <td><?= $item['tanggal_setor_tunai'] ?></td>
            <?php } ?>
        </tr>
    </table>
</body>

</html>