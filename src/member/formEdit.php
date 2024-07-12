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
    $id = $_GET['id_member'];
    $data = mysqli_query($koneksi,"select * from pembeli where id_member='$id'");

    while ($d = mysqli_fetch_array($data)) {
        ?>
   <table>
   <form action="edit.php" method="post">
    <tr>
        <td>nama member </td>
        <td>
        <input type="hidden" name="id_member" value="<?php echo $d['id_member'];?>">
            <input type="text" name="nama_member" value="<?php echo $d['nama_member'];?>">
        </td>
    </tr>
    <tr>
        <td>nik</td>
        <td><input type="text" name="nik" value="<?php echo $d['nik'];?>"></td>
    </tr>
    <tr>
    <td>alamat</td>
    <td><input type="text" name="alamat" value="<?php echo $d['alamat'];?>"></td>
    </tr>
   
     
    <tr>
        <td>nomor handphone</td>
        <td><input type="number" name="nohp" value="<?php echo $d['nohp'];?>"></td>
    </tr> 
    
        
        <td><input type="submit" value="kirim"></td>
    </tr>
   </table>
    </form>
   
    <?php
    }
    ?>
</body>
</html>