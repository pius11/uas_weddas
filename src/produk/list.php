<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>LIST PRODUK</h2>
    <a href="../../form/produk.php">instert data</a>
    <br>
    <table border="1">
    <tr>
        <th>no</th>
        <th>kode_produk</th>
        <th>nama_produk</th>
        <th>satuan</th>
        <th>harga_jual</th>
        <td>opsi</td>
    </tr>
    

    <?php
    
    include "../../koneksi.php";
   $no=1;
   //batas, cek halamab dan posisi data
    $batas = 5;
    $halaman = @$_GET['halaman'];

    if (empty($halaman)) {
        $posisi = 0;
        $halaman = 1;
    } else {
        $posisi = ($halaman-1)* $batas;
    }
    $no = ($halaman-1) * $batas + 1;
    //hitung total data

    $query2 = mysqli_query($koneksi, "select * from produk");
    $jmldata =  mysqli_num_rows($query2);
    $jmlhalaman = ceil($jmldata/$batas);

    echo "<br> Halaman ";

    for ($i=1; $i <= $jmlhalaman ; $i++) 
        if ($i != $halaman) {
            echo "<a href=\"listPage.php?halaman=$i\">$i</a> | ";
        } else {
           echo "<b>$i</b> | ";
        }
    
    echo "<p>total buku : <b>$jmldata</b> buah</p>";

    //sesuaikan query dengan posisi batas
    $query = "select * from produk LIMIT $posisi,$batas";




    $data = mysqli_query($koneksi,$query);
    while ($d = mysqli_fetch_array($data)) {
       ?>
       <tr>
       <td><?php echo $no++; ?></td>
                <td><?php echo $d['kode_produk']; ?></td>
                <td><?php echo $d['nama_produk']; ?></td>
                <td><?php echo $d['satuan']; ?></td>
                <td><?php echo $d['harga_jual']; ?></td>
                

        <td>
            <a href="formEdit.php?kode_produk=<?php echo $d['kode_produk']; ?>">edit</a>

            <a href="delete.php?kode_produk=<?php echo $d['kode_produk']; ?>">hapus</a>
        </td>
       </tr>
       <?php
    }
    ?>
    </table>
</body>
</html>