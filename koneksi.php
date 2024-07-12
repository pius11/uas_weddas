<?php
$koneksi = mysqli_connect("localhost","root","","pos");

if (mysqli_connect_errno()) {
    echo "koneksi error : ". mysqli_connect_error() ;
}


?>