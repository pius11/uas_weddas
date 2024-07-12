<?php
include '../../koneksi.php';

$id = $_GET['id_pengguna'];
mysqli_query($koneksi,"delete from pengguna where id_pengguna = '$id'");

header("location:list.php");

?>