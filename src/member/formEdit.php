<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Edit Data Member</title>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4c2c2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            animation: fadeIn 1s ease-in-out;
        }
        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            animation: slideIn 1s ease-in-out;
            max-width: 400px;
            width: 100%;
        }
        .login-container h1 {
            margin-bottom: 20px;
            color: #cc47a4;
            font-weight: bold;
            animation: fadeIn 2s ease-in-out;
            text-align: center;
        }
        .login-container label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            animation: fadeIn 2s ease-in-out;
        }
        .login-container input[type="text"],
        .login-container input[type="password"],
        .login-container input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus,
        .login-container input[type="number"]:focus {
            border-color: #4CAF50;
        }
        .login-container button {
            background-color: #cc47a4;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        .login-container button:hover {
            background-color: #bc3693;
        }
        .login-container .error-message {
            color: red;
            margin-top: 20px;
            animation: fadeIn 1s ease-in-out;
        }
        .btn-secondary {
            background-color: #cc47a4;
        }
        .btn-secondary:hover {
            background-color: #bc3693;
        }
    </style>
</head>
<body>
    <div class="login-container">
    <h1>Edit Data Member</h1>
    <a href="list.php" class="btn btn-secondary">Kembali
    <i class="bi bi-chevron-double-left"></i>
    </a>
    <br><br>
    <?php
    include '../../koneksi.php';
    $id = $_GET['id_member'];
    $data = mysqli_query($koneksi,"select * from pembeli where id_member='$id'");

    while ($d = mysqli_fetch_array($data)) {
        ?>
    <table>
    <form action="edit.php" method="post">
    <input type="hidden" name="id_member" value="<?php echo $d['id_member'];?>">
    <label for="nama_member">Nama Member</label>
    <input type="text" name="nama_member" value="<?php echo $d['nama_member'];?>">
    
    <label for="nik">NIK</label>
    <input type="text" name="nik" value="<?php echo $d['nik'];?>">
    
    <label for="alamat">Alamat</label>
    <input type="text" name="alamat" value="<?php echo $d['alamat'];?>">
    
    <label for="nohp">No. Hp</label>
    <input type="number" name="nohp" value="<?php echo $d['nohp'];?>">
    
    <button type="submit">Kirim
    <i class="bi bi-floppy"></i>
    </button>
    </form>
   
    <?php
    }
    ?>
    </div>
</body>
</html>