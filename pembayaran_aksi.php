<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'kasir') {
    header('Location: login.php');
    exit;
}

$cash = $_POST['cash'];
$grandTotal = $_POST['grandTotal'];
$change = $cash - $grandTotal;

if ($change < 0) {
    echo "Uang tidak cukup!";
    exit;
}

$keranjang = $_SESSION['keranjang'];
$customer = $_SESSION['customer'];
$tgl_transaksi = date('Y-m-d');
$id_pengguna = $_SESSION['username'];
$id_member = ($customer != 'umum') ? $customer : null;

// Simpan data transaksi utama ke tabel membeli
$query = "INSERT INTO membeli (tgl_transaksi, id_pengguna, id_member) 
          VALUES ('$tgl_transaksi', '$id_pengguna', '$id_member')";
$koneksi->query($query);

// Ambil id_transaksi yang baru saja dimasukkan
$id_transaksi = $koneksi->insert_id;

foreach ($keranjang as $kode_produk => $qty) {
    if ($qty > 0) {
        $query = "SELECT * FROM produk WHERE kode_produk='$kode_produk'";
        $result = $koneksi->query($query);
        $produk = $result->fetch_assoc();

        $subtotal = $produk['harga_jual'] * $qty;

        // Sesuaikan query INSERT dengan skema tabel beli_detail
        $query = "INSERT INTO beli_detail (id_transaksi, kode_produk, harga_jual, total_harga) 
                  VALUES ('$id_transaksi', '$kode_produk', '{$produk['harga_jual']}', '$subtotal')";
        $koneksi->query($query);
    }
}

// Mengambil nama kasir dari database
$query_kasir = "SELECT nama_pengguna FROM pengguna WHERE user_name='$id_pengguna'";
$result_kasir = $koneksi->query($query_kasir);
$kasir_info = $result_kasir->fetch_assoc();
$nama_kasir = $kasir_info['nama_pengguna'];

echo "<h1>Transaksi Berhasil!</h1>";
echo "<p>Tanggal: $tgl_transaksi</p>";
echo "<p>Kasir: $nama_kasir</p>";
echo "<p>Customer: $customer</p>";
echo "<table border='1'>";
echo "<tr><th>Kode Produk</th><th>Nama Produk</th><th>Harga Satuan</th><th>Qty</th><th>Subtotal</th></tr>";

foreach ($keranjang as $kode_produk => $qty) {
    if ($qty > 0) {
        $query = "SELECT * FROM produk WHERE kode_produk='$kode_produk'";
        $result = $koneksi->query($query);
        $produk = $result->fetch_assoc();

        $subtotal = $produk['harga_jual'] * $qty;

        echo "<tr>";
        echo "<td>" . $kode_produk . "</td>";
        echo "<td>" . $produk['nama_produk'] . "</td>";
        echo "<td>" . $produk['harga_jual'] . "</td>";
        echo "<td>" . $qty . "</td>";
        echo "<td>" . $subtotal . "</td>";
        echo "</tr>";
    }
}

echo "</table>";
echo "<h2>Grand Total: $grandTotal</h2>";
echo "<h2>Cash: $cash</h2>";
echo "<h2>Change: $change</h2>";

echo "<a href='index.php'>Kembali ke Beranda</a>";
?>
