<?php
session_start();
include 'koneksi.php'; // Ganti dengan koneksi database Anda

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $sql = "select * from pengguna WHERE user_name='$user_name' AND password='$password'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['jabatan'] = $row['jabatan'];

        if ($row['jabatan'] == 'admin') {
            header('Location: menuAdmin.php');
        } else {
            header('Location: menuKasir.php');
        }
    } else {
        echo "User name atau password salah";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="POST" action="">
        <label>User Name:</label>
        <input type="text" name="user_name" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
