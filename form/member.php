<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>registrasi member</h2>
    <form action="../src/member/insert.php" method="post">
   <table>
    <tr>
        <td>nama</td>
        <td><input type="text" name="nama_member" ></td>
    </tr>
    <tr>
        <td>nik</td>
        <td><input type="text" name="nik" ></td>
    </tr>

    <tr>
        <td>alamat</td>
        <td><textarea name="alamat"></textarea></td>
    </tr> 

    <tr>
        <td>no handphone</td>
        <td><input type="number" name="nohp" ></td>
    </tr>
    <tr>
        
        <td><input type="submit" value="kirim"></td>
    </tr>
   </table>
    </form>
   
</body>
</html>