<?php
session_start();
include 'koneksi.php';

// if (!isset($_SESSION['username']) || $_SESSION['role'] != 'kasir') {
//     header('Location: login.php');
//     exit;
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cash = $_POST['cash'];
    $total_harga = $_POST['grandTotal'];
    $kode_produks = $_POST['kode_produk'];
    $harga_juals = $_POST['harga_jual'];
    $id_member = $_POST['id_member'];
    $tgl_transaksi = date('Y-m-d');
    $id_pengguna = $_SESSION['id_pengguna'];
    $kembalian = $_POST['kembalian'];

    // Simpan data transaksi utama ke tabel membeli
    $query = "INSERT INTO membeli (tgl_transaksi,id_pengguna,id_member) VALUES ('$tgl_transaksi', '$id_pengguna', '$id_member')";
    $koneksi->query($query);

    // Ambil id_transaksi yang baru saja dimasukkan
    $id_transaksi = $koneksi->insert_id;

    foreach ($kode_produks as $index => $produk) {
        $query = "INSERT INTO beli_detail (id_transaksi,kode_produk,harga_jual,total_harga,kembalian) VALUES ('$id_transaksi','$kode_produks[$index]','$harga_juals[$index]','$total_harga','$kembalian')";
        $koneksi->query($query);
    }

    header("location:historyPembayaran.php");
} else {
    $queryPembeli = "SELECT * FROM pembeli";
    $queryProduct = "SELECT * FROM produk";
    $resultPembeli = $koneksi->query($queryPembeli);
    $resultProduct = $koneksi->query($queryProduct);
    $pembeli_list = [];
    $produk_list = [];
    while ($row = $resultPembeli->fetch_assoc()) {
        $pembeli_list[] = $row;
    }
    while ($row = $resultProduct->fetch_assoc()) {
        $produk_list[] = $row;
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pembayaran</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4c2c2;
                margin: 0;
                padding: 0;
            }
            .container {
                width: 80%;
                margin: auto;
                overflow: hidden;
            }
            .box {
                border: 1px solid #ffb6c1;
                padding: 5px;
                margin: 0px;
                text-align: center;
                background-color: #ff69b4;
                color: white;
                box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            }
            h1 {
                font-family: 'Poppins';
                font-size: 50px;
                font-weight: bold;
                color: white;
            }
            table {
                width: 100%;
                margin: 20px 0;
                border-collapse: collapse;
                box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            }
            table, th, td {
                border: 1px solid #ffb6c1;
            }
            th, td {
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #ff69b4; /* Hot pink background for table headers */
                color: white;
            }
            tr:nth-child(even) {
            background-color: #ffe4e1; /* Misty rose background for even rows */
            }

            input[type="number"], select {
                width: 100%;
                padding: 8px;
                margin: 8px 0;
                box-sizing: border-box;
            }
            button {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border: none;
                cursor: pointer;
            }
            button:hover {
                background-color: #45a049;
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

            @media (max-width: 600px) {
            table, th, td {
                font-size: 14px;
            }
            body {
                padding: 10px;
            }
            h1 {
                font-size: 34px;
            }
            table {
                width: 100%;
            }

        </style>
    </head>
    <body>
    <div class="container">
        <form method="POST">
            <div class="box">
                <h1>Pembayaran</h1>
            </div>
            <table>
                <tr>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga Satuan</th>
                    <th>Qty</th>
                </tr>
                <?php foreach ($produk_list as $i => $produk): ?>
                    <tr class="produks">
                        <td><?= $produk['kode_produk']; ?></td>
                        <td><?= $produk['nama_produk']; ?></td>
                        <td><?= $produk['harga_jual']; ?></td>
                        <td>
                            <input type="number" name="keranjang[<?php echo $produk['kode_produk']; ?>]" value="0" min="0">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <br>
            <label for="member">Member:</label>
            <select name="id_member" id="member">
                <option value="">Select member</option>
                <?php foreach ($pembeli_list as $member) : ?>
                <option value="<?= $member['id_member']; ?>"><?= $member['nama_member']; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="cash">Cash:</label>
            <input type="number" name="cash" id="cash" required>
            <br>
            <label for="grandTotal">Total Harga:</label>
            <input type="number" name="grandTotal" id="grandTotal" value="0" readonly>
            <br>
            <label for="kembalian">Kembalian:</label>
            <input type="number" name="kembalian" id="kembalian" value="0" readonly>
            <br>
            <div id="hiddenInputs"></div>
            <button type="submit">Bayar</button>
        </form>
        <br>
        <div class="form-balik">
            <a href="http://localhost/pos/uas_weddas/historyPembayaran.php" class="btn btn-primary">kembali</a>
        </div>
    </div>

    <script>
    let total_harga_satuan = [];
    let satuan = [];
    let satuan_kode = [];

    const produks = document.querySelectorAll('.produks');
    let grandTotalInput = document.getElementById('grandTotal');
    let kembalianInput = document.getElementById('kembalian');
    let cashInput = document.getElementById('cash');
    let hiddenInputs = document.getElementById('hiddenInputs');

    cashInput.addEventListener('keyup', function(){
        let kembalian = 0
        if (parseInt(cashInput.value) < parseInt(grandTotalInput.value)) {
            kembalian = 0
        } else {
            kembalian = cashInput.value - grandTotalInput.value
        }
        kembalianInput.value = kembalian
    })

    produks.forEach(produk => {
        produk.querySelector('input').addEventListener('keyup', function() {
            let kode = produk.querySelector('td:nth-child(1)').innerText;
            let harga = parseFloat(produk.querySelector('td:nth-child(3)').innerText);
            let qty = parseInt(produk.querySelector('input').value);
            let total_harga = harga * qty;

            total_harga_satuan = total_harga_satuan.filter(harga_satuan => harga_satuan.kode_produk !== kode);
            total_harga_satuan.push({ kode_produk: kode, harga: total_harga });
            satuan = total_harga_satuan.map(harga_satuan => harga_satuan.harga);
            satuan_kode = total_harga_satuan.map(harga_satuan => harga_satuan.kode_produk);

            let grandTotal = satuan.reduce((acc, curr) => acc + curr, 0);
            grandTotalInput.value = grandTotal;

            hiddenInputs.innerHTML = '';
            total_harga_satuan.forEach(item => {
                let kodeInput = document.createElement('input');
                kodeInput.type = 'hidden';
                kodeInput.name = 'kode_produk[]';
                kodeInput.value = item.kode_produk;

                let hargaInput = document.createElement('input');
                hargaInput.type = 'hidden';
                hargaInput.name = 'harga_jual[]';
                hargaInput.value = item.harga;

                hiddenInputs.appendChild(kodeInput);
                hiddenInputs.appendChild(hargaInput);
            });
        });
    });
    </script>
    </body>
    </html>
    <?php
}
?>