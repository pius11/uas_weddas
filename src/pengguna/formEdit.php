<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>edit data pegawai</h2>
    <a href="list.php">kembali</a><br>
    <?php
    include '../../koneksi.php';
    $id = $_GET['id_pengguna'];
    $data = mysqli_query($koneksi,"select * from pengguna where id_pengguna='$id'");

    while ($d = mysqli_fetch_array($data)) {
        ?>
   <table>
   <form action="edit.php" method="post">
    <tr>
        <td>user name</td>
        <td>
        <input type="hidden" name="id_pengguna" value="<?php echo $d['id_pengguna'];?>">
            <input type="text" name="user_name" value="<?php echo $d['user_name'];?>">
        </td>
    </tr>
    <tr>
        <td>password</td>
        <td><input type="password" name="password" value="<?php echo $d['password'];?>"></td>
    </tr>
   
    <tr>
        <td>nama lengkap</td>
        <td><input type="text" name="nama_pengguna" value="<?php echo $d['nama_pengguna'];?>"></td>
    </tr> 
    <tr>
        <td>jabatan</td>
        <td><input type="radio" name="jabatan" value="admin" value="<?php echo $d['jabatan'];?>">admin <input type="radio" name="jabatan" value="kasir" value="<?php echo $d['jabatan'];?>">kasir</td>
    </tr>
    <tr>
        <td>no handphone</td>
        <td><input type="number" name="nohp_pengguna" value="<?php echo $d['id_pengguna'];?>"></td>
    </tr>
    <tr>
        
        <td><input type="submit" value="kirim"></td>
    </tr>
   </table>
    </form>
   
    <?php
    }
    ?>
</body>
</html>