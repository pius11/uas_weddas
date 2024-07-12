<?php
include '../../koneksi.php';

$id = $_GET['kode_produk'];
mysqli_query($koneksi,"delete from produk where kode_produk = '$id'");

header("location:list.php");

?>