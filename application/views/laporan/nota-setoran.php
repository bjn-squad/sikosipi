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
    <?php
    foreach ($simpanan_detail as $item) {
    ?>
        <tr>
            <td><?= $item['nama_anggota'] ?></td>
            <td><?= $item['nama_pegawai'] ?></td>
            <td>Rp. <?= number_format($item['jumlah_setor_tunai'], 0, ',', '.') ?></td>
            <td><?= date("d-m-Y", strtotime($item['tanggal_setor_tunai'])) ?></td>
        </tr>
    <?php } ?>
</table>