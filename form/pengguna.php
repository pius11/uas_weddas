<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>registrasi kasir</h2>
    <form action="../src/pengguna/insert.php" method="post">
   <table>
    <tr>
        <td>user name</td>
        <td><input type="text" name="user_name" ></td>
    </tr>
    <tr>
        <td>password</td>
        <td><input type="password" name="password" ></td>
    </tr>
   
    <tr>
        <td>nama lengkap</td>
        <td><input type="text" name="nama_pengguna" ></td>
    </tr> 
    <tr>
        <td>jabatan</td>
        <td><input type="radio" name="jabatan" value="admin">admin <input type="radio" name="jabatan" value="kasir">kasir</td>
    </tr>
    <tr>
        <td>no handphone</td>
        <td><input type="number" name="nohp_pengguna" ></td>
    </tr>
    <tr>
        
        <td><input type="submit" value="kirim"></td>
    </tr>
   </table>
    </form>
   
</body>
</html>