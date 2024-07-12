<?php
session_start();
if (!isset($_SESSION['user_name']) || $_SESSION['jabatan'] != 'admin') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <table>
    <tr>
        <th><a href="src/pengguna/list.php">pegawai</a></th>
        <th><a href="src/produk/list.php">produk</a></th>
        <th><a href="src/member/list.php">member</a></th>
        <th><a href="logout.php">Logout</a></th>
    </tr>
    </table>
</body>
</html>