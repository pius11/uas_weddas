<?php
include '../../koneksi.php';
$id = $_POST['id_pengguna'];
$username = $_POST['user_name'];
$pass = $_POST['password'];
$namapeng = $_POST['nama_pengguna'];
$jabatan = $_POST['jabatan'];
$nohp = $_POST['nohp_pengguna'];

mysqli_query($koneksi,"update pengguna set id_pengguna='$id',user_name='$username',password='$pass',nama_pengguna='$namapeng', jabatan= '$jabatan', nohp_pengguna='$nohp' where id_pengguna='$id'");

header("location:list.php");
?>