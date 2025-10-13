<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Produk</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Daftar Produk</h1>
  <a href="add_product.php">+ Tambah Produk</a> | 
  <a href="history.php">Riwayat Pembelian</a>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>No</th>
      <th>Nama Produk</th>
      <th>Harga</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM products");
    $no = 1;
    while($row = $result->fetch_assoc()):
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $row['name'] ?></td>
      <td>Rp <?= number_format($row['price'],0,',','.') ?></td>
      <td><img src="uploads/<?= $row['image'] ?>" width="80"></td>
      <td>
        <a href="edit_product.php?id=<?= $row['id'] ?>">Edit</a> | 
        <a href="delete_product.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus produk ini?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
