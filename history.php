<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Riwayat Pembelian</title>
</head>
<body>
  <h1>Riwayat Pembelian</h1>
  <a href="index.php">← Kembali ke Produk</a>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>No</th>
      <th>Nama Konsumen</th>
      <th>Produk</th>
      <th>Jumlah</th>
      <th>Total</th>
      <th>Tanggal</th>
    </tr>
    <?php
    $query = "SELECT purchases.*, products.name AS product_name 
              FROM purchases JOIN products ON purchases.product_id = products.id 
              ORDER BY purchase_date DESC";
    $result = $conn->query($query);
    $no = 1;
    while($row = $result->fetch_assoc()):
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $row['customer_name'] ?></td>
      <td><?= $row['product_name'] ?></td>
      <td><?= $row['quantity'] ?></td>
      <td>Rp <?= number_format($row['total_price'],0,',','.') ?></td>
      <td><?= $row['purchase_date'] ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
