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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Menu Admin</title>

    <style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    body {
        font-family: 'Poppins';
        background-color: #f4c2c2; /* Light pink background */
        margin: 0;
        padding: 0px;
        flex-direction: column;
        align-items: center;
        animation: fadeIn 1s ease-out;
        background-image: url(IMG/iqbal.jpg);
        background-size: 1920px 1080px;
    }
    
    .container-fluid {
        align-items: center;
    }

    .navbar-brand {
        font-size: 30px;
        font-weight: bold;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Menu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="src/pengguna/list.php">Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="src/produk/list.php">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="src/member/list.php">Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>