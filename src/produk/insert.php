<?php
include '../../koneksi.php';

$id = $_POST['kode_produk'];
$namaProduk = $_POST['nama_produk'];
$satuan = $_POST['satuan'];
$harga_jual = $_POST['harga_jual'];


mysqli_query($koneksi,"insert into produk values('$id','$namaProduk','$satuan','$harga_jual')");
header("location:list.php");
?>