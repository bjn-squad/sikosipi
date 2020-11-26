<p align="center">
    NOTA ANGSURAN PINJAMAN
</p>
<table>
    <tr>
        <th>Nama Pengangsur</th>
        <th>Nama Teller</th>
        <th>Jumlah Angsuran</th>
        <th>Tanggal Angsur</th>
    </tr>
    <?php
    foreach ($angsuran_detail as $item) {
    ?>
        <tr>

            <td><?= $item['nama_anggota'] ?></td>
            <td><?= $item['nama_pegawai'] ?></td>
            <td>Rp. <?= number_format($item['angsuran_pembayaran'], 0, ',', '.') ?></td>
            <td><?= date("d-m-Y", strtotime($item['tanggal_angsuran'])) ?></td>

        </tr>
    <?php } ?>
</table>