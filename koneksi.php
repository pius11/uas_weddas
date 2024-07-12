<?php
$koneksi = mysqli_connect("localhost","piuss","","pos");

if (mysqli_connect_errno()) {
    echo "koneksi error : ". mysqli_connect_error() ;
}


?>