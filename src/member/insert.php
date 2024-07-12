<?php
include '../../koneksi.php';

$username = $_POST['nama_member'];
$nik = $_POST['nik'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];

mysqli_query($koneksi,"insert into pembeli values('','$username','$nik','$alamat','$nohp')");
header("location:list.php");
?>