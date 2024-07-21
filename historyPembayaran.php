<?php
include "koneksi.php";

$queryBeliDetail = "SELECT beli_detail.*, produk.*,membeli.*,pembeli.* FROM beli_detail JOIN membeli ON beli_detail.id_transaksi = membeli.id_transaksi JOIN produk ON beli_detail.kode_produk = produk.kode_produk JOIN pembeli ON membeli.id_member = pembeli.id_member;";
$resultBeliDetail = $koneksi->query($queryBeliDetail);
$beli_detail_list = [];
while ($row = $resultBeliDetail->fetch_assoc()) {
    $beli_detail_list[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pembayaran</title>
</head>
<body>
<h2>LIST MEMBER</h2>
    <a href="http://localhost/uas_weddas/pembayaran.php">instert transaksi</a>
    <br>
    <br>
    <table border="1">
    <tr>
        <th>id_transaksi</th>
        <th>kode_produk</th>
        <th>nama_member</th>
        <th>nama_produk</th>
        <th>harga_jual</th>
        <th>total_harga</th>
        <th>kembalian</th>
    </tr>
    <?php foreach ($beli_detail_list as $detail) : ?>
        <tr>
            <td><?= $detail['id_detail']; ?></td>
            <td><?= $detail['kode_produk']; ?></td>
            <td><?= $detail['nama_member']; ?></td>
            <td><?= $detail['nama_produk']; ?></td>
            <td><?= $detail['harga_jual']; ?></td>
            <td><?= $detail['total_harga']; ?></td>
            <td><?= $detail['kembalian']; ?></td>
        </tr>
    <?php endforeach; ?>
</body>
</html>