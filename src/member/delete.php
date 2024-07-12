<?php
include '../../koneksi.php';

$id = $_GET['id_member'];
mysqli_query($koneksi,"delete from pembeli where id_member ='$id'");

header("location:list.php");

?>