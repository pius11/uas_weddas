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
    $id = $_GET['kode_produk'];
    $data = mysqli_query($koneksi,"select * from produk where kode_produk='$id'");

    while ($d = mysqli_fetch_array($data)) {
        ?>
   <table>
   <form action="edit.php" method="post">
    <tr>
        <td>nama produk </td>
        <td>
        <input type="hidden" name="kode_produk" value="<?php echo $d['kode_produk'];?>">
            <input type="text" name="nama_produk" value="<?php echo $d['nama_produk'];?>">
        </td>
    </tr>
    <tr>
        <td>satuan</td>
        <td><input type="text" name="satuan" value="<?php echo $d['satuan'];?>"></td>
    </tr>
   
    <tr>
        <td>harga jual</td>
        <td><input type="number" name="harga_jual" value="<?php echo $d['harga_jual'];?>"></td>
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