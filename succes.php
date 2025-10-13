<?php
$order_id = $_GET['order_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-center p-5">
    <h1 class="text-success">🎉 Pesanan Berhasil!</h1>
    <p>Terima kasih, pesanan Anda dengan ID <b>#<?= $order_id; ?></b> sudah kami terima.</p>
    <a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
</body>
</html>
