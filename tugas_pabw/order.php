<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $tanggal = $_POST['tanggal'];
    $total = $_POST['total'];

    $sql = "INSERT INTO orders (nama, no_hp, tanggal, total) 
            VALUES ('$nama', '$no_hp', '$tanggal', '$total')";

    if ($conn->query($sql) === TRUE) {
        ?>
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <title>Konfirmasi Pesanan</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Redirect otomatis 5 detik -->
            <meta http-equiv="refresh" content="5;url=index.php">
        </head>
        <body class="d-flex justify-content-center align-items-center vh-100 bg-light">
            <div class="text-center">
                <h2 class="text-success">✅ Pesanan telah dikonfirmasi</h2>
                <p>Terimakasih sudah memesan, <?= htmlspecialchars($nama); ?>!</p>
                <p class="text-muted">Anda akan diarahkan kembali ke halaman utama dalam 5 detik...</p>
                <a href="index.php" class="btn btn-primary mt-3">Kembali ke Halaman Utama</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>
