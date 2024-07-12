<?php
include '../../koneksi.php';
$id = $_POST['kode_produk'];
$namaProduk = $_POST['nama_produk'];
$satuan = $_POST['satuan'];
$harga_jual = $_POST['harga_jual'];

mysqli_query($koneksi,"update produk set kode_produk='$id',nama_produk='$namaProduk',satuan='$satuan',harga_jual='$harga_jual' where kode_produk='$id'");

header("location:list.php");
?>