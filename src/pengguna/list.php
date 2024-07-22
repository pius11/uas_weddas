<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>LIST PEGAWAI</title>

    <style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    body {
        font-family: 'Poppins';
        background-color: #f4c2c2; /* Light pink background */
        margin: 0;
        padding: 20px;
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        animation: fadeIn 1s ease-out;
    }
    h2 {
        font-family: 'Poppins';
        font-size: 50px;
        font-weight: bold;
        color: #d147a3; /* Pink color for headings */
        margin-bottom: 20px;
        animation: fadeIn 2s ease-out;
    }
    table {
        width: 90%;
        max-width: 1000px;
        margin-top: 20px;
        border-collapse: collapse;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        animation: fadeIn 3s ease-out;
    }
    table, th, td {
        border: 1px solid #ffb6c1; /* Light pink border */
    }
    th, td {
        text-align: left;
        padding: 12px;
    }
    th {
        background-color: #ff69b4; /* Hot pink background for table headers */
        color: white;
    }
    tr:nth-child(even) {
        background-color: #ffe4e1; /* Misty rose background for even rows */
    }
    input[type="text"], input[type="submit"], .btn {
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ffb6c1; /* Light pink border */
        border-radius: 5px;
    }
    input[type="submit"], .btn {
        background-color: #ff1493; /* Deep pink */
        color: white;
        cursor: pointer;
    }
    input[type="submit"]:hover, .btn:hover {
        background-color: #ff69b4; /* Hot pink on hover */
    }
    @media (max-width: 600px) {
        table, th, td {
            font-size: 14px;
        }
        body {
            padding: 20px;
        }
        h2 {
            font-size: 34px;
        }
        table {
            width: 100%;
        }
    }
</style>

</head>
<body>
    <h2>LIST PEGAWAI</h2>
    <a href="../../form/pengguna.php" class="btn btn-primary">Instert Data</a>
    
    <table border="1">
    <tr>
        <th>no</th>
        <th>id</th>
        <th>user_name</th>
        <th>password</th>
        <th>nama_pengguna</th>
        <th>jabatan</th>
        <th>nohp_pengguna</th>
        <th>opsi</th>
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

    $query2 = mysqli_query($koneksi, "select * from pengguna");
    $jmldata =  mysqli_num_rows($query2);
    $jmlhalaman = ceil($jmldata/$batas);

    echo "<br> Halaman ";

    for ($i=1; $i <= $jmlhalaman ; $i++) 
        if ($i != $halaman) {
            echo "<a href=\"listPage.php?halaman=$i\">$i</a> | ";
        } else {
           echo "<b>$i</b> | ";
        }
    
    echo "<p>Total User : <b>$jmldata</b> Orang</p>";

    //sesuaikan query dengan posisi batas
    $query = "select * from pengguna LIMIT $posisi,$batas";




    $data = mysqli_query($koneksi,$query);
    while ($d = mysqli_fetch_array($data)) {
       ?>
       <tr>
       <td><?php echo $no++; ?></td>
                <td><?php echo $d['id_pengguna']; ?></td>
                <td><?php echo $d['user_name']; ?></td>
                <td><?php echo $d['password']; ?></td>
                <td><?php echo $d['nama_pengguna']; ?></td>
                <td><?php echo $d['jabatan']; ?></td>
                <td><?php echo $d['nohp_pengguna']; ?></td>

        <td>
            <a href="formEdit.php?id_pengguna=<?php echo $d['id_pengguna']; ?>" class="btn btn-warning btn-sm">edit</a>
            <a href="delete.php?id_pengguna=<?php echo $d['id_pengguna']; ?>"class="btn btn-danger btn-sm">hapus</a>
        </td>
       </tr>
       <?php
    }
    ?>
    </table>
    <br>
    <a href="http://localhost/pos/uas_weddas/menuAdmin.php" class="btn btn-secondary">kembali</a>
</body>
</html>