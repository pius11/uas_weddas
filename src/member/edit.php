<?php
include '../../koneksi.php';
$id = $_POST['id_member'];
$username = $_POST['nama_member'];
$nik = $_POST['nik'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];

mysqli_query($koneksi,"update pembeli set id_member='$id',nama_member='$username',nik='$nik',alamat='$alamat', nohp= '$nohp' where id_member='$id'");

header("location:list.php");
?>