<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'kasir') {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cash = $_POST['cash'];
    $grandTotal = $_POST['grandTotal'];
    $change = $cash - $grandTotal;

    if ($change < 0) {
        echo "Uang tidak cukup!";
        exit;
    }

    $keranjang = $_SESSION['keranjang'];
    $customer = $_SESSION['customer'];
    $tgl_transaksi = date('Y-m-d');
    $id_pengguna = $_SESSION['username'];
    $id_member = ($customer != 'umum') ? $customer : null;

    // Simpan data transaksi utama ke tabel membeli
    $query = "INSERT INTO membeli (tgl_transaksi, id_pengguna, id_member) 
              VALUES ('$tgl_transaksi', '$id_pengguna', '$id_member')";
    $koneksi->query($query);

    // Ambil id_transaksi yang baru saja dimasukkan
    $id_transaksi = $koneksi->insert_id;

    foreach ($keranjang as $kode_produk => $qty) {
        if ($qty > 0) {
            $query = "SELECT * FROM produk WHERE kode_produk='$kode_produk'";
            $result = $koneksi->query($query);
            $produk = $result->fetch_assoc();

            $subtotal = $produk['harga_jual'] * $qty;

            // Sesuaikan query INSERT dengan skema tabel beli_detail
            $query = "INSERT INTO beli_detail (id_transaksi, kode_produk, harga_jual, total_harga) 
                      VALUES ('$id_transaksi', '$kode_produk', '{$produk['harga_jual']}', '$subtotal')";
            $koneksi->query($query);
        }
    }

    // Mengambil nama kasir dari database
    $query_kasir = "SELECT nama_pengguna FROM pengguna WHERE user_name='$id_pengguna'";
    $result_kasir = $koneksi->query($query_kasir);
    $kasir_info = $result_kasir->fetch_assoc();
    $nama_kasir = $kasir_info['nama_pengguna'];

    echo "<h1>Transaksi Berhasil!</h1>";
    echo "<p>Tanggal: $tgl_transaksi</p>";
    echo "<p>Kasir: $nama_kasir</p>";
    echo "<p>Customer: $customer</p>";
    echo "<table border='1'>";
    echo "<tr><th>Kode Produk</th><th>Nama Produk</th><th>Harga Satuan</th><th>Qty</th><th>Subtotal</th></tr>";

    foreach ($keranjang as $kode_produk => $qty) {
        if ($qty > 0) {
            $query = "SELECT * FROM produk WHERE kode_produk='$kode_produk'";
            $result = $koneksi->query($query);
            $produk = $result->fetch_assoc();

            $subtotal = $produk['harga_jual'] * $qty;

            echo "<tr>";
            echo "<td>" . $kode_produk . "</td>";
            echo "<td>" . $produk['nama_produk'] . "</td>";
            echo "<td>" . $produk['harga_jual'] . "</td>";
            echo "<td>" . $qty . "</td>";
            echo "<td>" . $subtotal . "</td>";
            echo "</tr>";
        }
    }

    echo "</table>";
    echo "<h2>Grand Total: $grandTotal</h2>";
    echo "<h2>Cash: $cash</h2>";
    echo "<h2>Change: $change</h2>";

    echo "<a href='index.php'>Kembali ke Beranda</a>";
} else {
    $query = "SELECT * FROM produk";
    $result = $koneksi->query($query);
    $produk_list = [];
    while ($row = $result->fetch_assoc()) {
        $produk_list[] = $row;
    }
    ?>

    <form method="POST" action="">
        <h1>Pembayaran</h1>
        <table border="1">
            <tr>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Harga Satuan</th>
                <th>Qty</th>
            </tr>
            <?php foreach ($produk_list as $produk): ?>
                <tr>
                    <td><?php echo $produk['kode_produk']; ?></td>
                    <td><?php echo $produk['nama_produk']; ?></td>
                    <td><?php echo $produk['harga_jual']; ?></td>
                    <td><input type="number" name="keranjang[<?php echo $produk['kode_produk']; ?>]" value="0" min="0"></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <label for="cash">Cash:</label>
        <input type="number" name="cash" id="cash" required>
        <br>
        <input type="hidden" name="grandTotal" id="grandTotal" value="0">
        <button type="submit">Bayar</button>
    </form>

    <script>
        const inputs = document.querySelectorAll('input[type="number"]');
        const grandTotalInput = document.getElementById('grandTotal');

        inputs.forEach(input => {
            input.addEventListener('input', calculateGrandTotal);
        });

        function calculateGrandTotal() {
            let grandTotal = 0;
            inputs.forEach(input => {
                const qty = parseInt(input.value);
                const harga = parseInt(input.closest('tr').querySelector('td:nth-child(3)').innerText);
                grandTotal += qty * harga;
            });
            grandTotalInput.value = grandTotal;
        }
    </script>
    <?php
}
?>
