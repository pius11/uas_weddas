<?php
include "koneksi.php";

$queryBeliDetail = "SELECT beli_detail.*, produk.*, membeli.*, COALESCE(pembeli.nama_member, 'Tidak Ada') AS nama_member 
                    FROM beli_detail 
                    JOIN membeli ON beli_detail.id_transaksi = membeli.id_transaksi 
                    JOIN produk ON beli_detail.kode_produk = produk.kode_produk 
                    LEFT JOIN pembeli ON membeli.id_member = pembeli.id_member;";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>History Pembayaran</title>

    <style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    body {
        font-family: 'Poppins';
        background-color: #f4c2c2; /* Light pink background */
        margin: 0;
        padding: 20px;
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        animation: fadeIn 1s ease-out;
    }
    h2 {
        font-family: 'Poppins';
        font-size: 50px;
        font-weight: bold;
        color: #d147a3; /* Pink color for headings */
        margin-bottom: 20px;
        animation: fadeIn 2s ease-out;
    }
    table {
        width: 90%;
        max-width: 800px;
        margin-top: 20px;
        border-collapse: collapse;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        animation: fadeIn 3s ease-out;
    }
    table, th, td {
        border: 1px solid #ffb6c1; /* Light pink border */
    }
    th, td {
        text-align: left;
        padding: 12px;
    }
    th {
        background-color: #ff69b4; /* Hot pink background for table headers */
        color: white;
    }
    tr:nth-child(even) {
        background-color: #ffe4e1; /* Misty rose background for even rows */
    }
    input[type="text"], input[type="submit"], .btn {
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ffb6c1; /* Light pink border */
        border-radius: 5px;
    }
    input[type="submit"], .btn {
        background-color: #ff1493; /* Deep pink */
        color: white;
        cursor: pointer;
    }
    input[type="submit"]:hover, .btn:hover {
        background-color: #ff69b4; /* Hot pink on hover */
    }
    @media (max-width: 600px) {
        table, th, td {
            font-size: 14px;
        }
        body {
            padding: 20px;
        }
        h2 {
            font-size: 34px;
        }
        table {
            width: 100%;
        }
    }
</style>

</head>
<body>
    <h2>LIST TRANSAKSI</h2>
    <br>
    <a href="http://localhost/pos/uas_weddas/pembayaran.php" class="btn">Insert Transaksi</a>
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
    <div>
    <br>
    <a href="http://localhost/pos/uas_weddas/menuKasir.php" class="btn btn-secondary">kembali</a>
</div>
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