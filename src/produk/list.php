<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
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
        color: #d147a3; /* Pink color for headings */
        font-size: 50px;
        font-weight: bold;
        text-align: center;
        animation: fadeIn 2s ease-out;
    }
    table {
        width: 90%;
        max-width: 800px;
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
    a {
        color: #ff1493; /* Deep pink links */
        text-decoration: none;
        font-weight: bold;
    }
    a:hover {
        color: #ff69b4; /* Hot pink on hover */
    }
    input[type="submit"], .btn {
        background-color: #ff1493; /* Deep pink */
        color: white;
        cursor: pointer;
    }
    input[type="submit"]:hover, .btn:hover {
        background-color: #ff69b4; /* Hot pink on hover */
    }
    .btn-warning {
        background-color: #ff1493; /* Custom warning button color */
        border-color: #ffc107;
    }
    .btn-warning:hover {
        background-color: #e0a800; /* Custom warning button hover color */
        border-color: #d39e00;
    }
    .btn-danger {
        background-color: #ff1493; /* Custom danger button color */
        border-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #c82333; /* Custom danger button hover color */
        border-color: #bd2130;
    }
    .btn-container {
        display: flex;
        justify-content: space-between;
    }
    .pagination .page-item.active .page-link {
        background-color: #FF1493; /* Deep pink */
        border-color: #FF1493; /* Deep pink */
        color: white; /*kalo aktif dia  putih */
    }
    .pagination .page-link {
        color: #FF1493; /* Deep pink */
    }
    @media (max-width: 600px) {
        table, th, td {
            font-size: 14px;
        }
        body {
            padding: 10px;
        }
        table {
            width: 100%;
        }
        .btn-container {
            flex-direction: column;
            align-items: center;
        }
        .btn-container .btn {
            margin-bottom: 10px;
        }
    }
    </style>

    <title>LIST PRODUK</title>
</head>
<body>
    <h2>LIST PRODUK</h2>
    <a href="../../form/produk.php" class="btn btn-primary">Insert Data
    <i class="bi bi-database-add"></i>
    </a>
    <table border="1">
    <tr>
        <th>No</th>
        <th>Kode Produk</th>
        <th>Nama Produk</th>
        <th>Satuan</th>
        <th>Harga Jual</th>
        <th>Opsi</th>
    </tr>
    
    <?php
    include "../../koneksi.php";
    session_start();
    $no=1;
    // batas, cek halaman dan posisi data
    $batas = 10;
    $halaman = @$_GET['halaman'];

    if (empty($halaman)) {
        $posisi = 0;
        $halaman = 1;
    } else {
        $posisi = ($halaman-1)* $batas;
    }
    $no = ($halaman-1) * $batas + 1;
    // hitung total data
    $query2 = mysqli_query($koneksi, "SELECT * FROM produk");
    $jmldata = mysqli_num_rows($query2);
    $jmlhalaman = ceil($jmldata/$batas);

    // sesuaikan query dengan posisi batas
    $query = "SELECT * FROM produk LIMIT $posisi,$batas";
    $data = mysqli_query($koneksi, $query);
    while ($d = mysqli_fetch_array($data)) {
    ?>
       <tr>
           <td><?php echo $no++; ?></td>
           <td><?php echo $d['kode_produk']; ?></td>
           <td><?php echo $d['nama_produk']; ?></td>
           <td><?php echo $d['satuan']; ?></td>
           <td><?php echo $d['harga_jual']; ?></td>
           <td>
               <a href="formEdit.php?kode_produk=<?php echo $d['kode_produk']; ?>" class="btn btn-warning btn-sm">
                   <i class="bi bi-pencil-square"></i>
               </a>
               <a href="delete.php?kode_produk=<?php echo $d['kode_produk']; ?>" class="btn btn-danger btn-sm">
                   <i class="bi bi-trash"></i>
               </a>
           </td>
       </tr>
    <?php
    }
    ?>
    </table>

    <nav aria-label="Page navigation example" style="margin-top: 20px;">
        <ul class="pagination justify-content-center">
            <?php
            echo "<li class='page-item'><span class='page-link'>Halaman </span></li>";
            for ($i=1; $i <= $jmlhalaman; $i++) {
                if ($i != $halaman) {
                    echo "<li class='page-item'><a class='page-link' href=\"listPage.php?halaman=$i\">$i</a></li>";
                } else {
                    echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                }
            }
            ?>
        </ul>
    </nav>

    <p>Total Produk: <b><?php echo $jmldata; ?></b> buah</p>

    <?php
    // Cek apakah variabel sesi 'role' sudah diatur
    if (isset($_SESSION['jabatan'])) {
        if ($_SESSION['jabatan'] == 'admin') {
            $return_url = "../../menuAdmin.php";
        } else {
            $return_url = "../../menuKasir.php";
        }
    } else {
        // Default jika tidak ada role, misalnya redirect ke halaman login atau beranda umum
        $return_url = "../../index.php";
    }
    ?>

    <a href="<?php echo $return_url; ?>" class="btn btn-secondary">Kembali
    <i class="bi bi-chevron-double-left"></i>   
    </a>
</body>
</html>
