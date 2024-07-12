<?php
include '../../koneksi.php';

$username = $_POST['user_name'];
$pass = $_POST['password'];
$namapeng = $_POST['nama_pengguna'];
$jabatan = $_POST['jabatan'];
$nohp = $_POST['nohp_pengguna'];

mysqli_query($koneksi,"insert into pengguna values('','$username','$pass','$namapeng','$jabatan','$nohp')");
header("location:list.php");
?>