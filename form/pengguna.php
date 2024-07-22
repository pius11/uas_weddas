<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4c2c2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }
        h2 {
            text-align: center;
            font-weight: bold;
            color: #d147a3;
            margin-bottom: 20px;
        }
        .form-group, .form-balik {
            margin-bottom: 20px;
        }
        .form-group, .form-balik label {
            color: #555;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group, .form-balik textarea {
            resize: vertical;
        }
        .btn-primary {
            background-color: #d147a3;
            border-color: #d147a3;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #c13592;
            border-color: #c13592;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrasi Pegawai</h2>
        <form action="../src/pengguna/insert.php" method="post">
            <div class="form-group">
                <label for="user_name">User Name</label>
                <input type="text" id="user_name" name="user_name" placeholder="User Name">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="nama_pengguna">Nama Lengkap</label>
                <input type="text" id="nama_pengguna" name="nama_pengguna" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <select name="jabatan" id="" >
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                    </select>
                <!-- <div>
                    <i type="radio" id="admin" name="jabatan" value="admin">
                    <label for="admin">admin</label>
                    <select type="radio" id="kasir" name="jabatan" value="kasir">
                    <label for="kasir">kasir</label>
                </div> -->
            </div>
            <div class="form-group">
                <label for="nohp_pengguna">No Handphone</label>
                <input type="number" id="nohp_pengguna" name="nohp_pengguna" placeholder="No Handphone">
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-with-icon">
            Kirim  <i class="bi bi-floppy"></i>
            </div>
        </form>
        <div class="form-balik">
            <a href="../src/pengguna/list.php" class="btn btn-primary">Kembali
            <i class="bi bi-chevron-double-left"></i>
            </a>
        </div>
    </div>
</body> 
</html>