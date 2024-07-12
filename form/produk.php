<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>input produk</h2>
    <form action="../src/produk/insert.php" method="post">
   <table>
    <tr>
        <td>kode produk</td>
        <td><input type="text" name="kode_produk" ></td>
    </tr>
    <tr>
        <td>nama produk</td>
        <td><input type="text" name="nama_produk" ></td>
    </tr>
   
    <tr>
        <td>satuan</td>
        <td><input type="text" name="satuan" ></td>
    </tr> 
    
    <tr>
        <td>harga jual</td>
        <td><input type="number" name="harga_jual" ></td>
    </tr>
    <tr>
        
        <td><input type="submit" value="kirim"></td>
    </tr>
   </table>
    </form>
   
</body>
</html>