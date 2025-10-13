<?php include 'db.php'; ?>

<?php
if(isset($_POST['submit'])){
  $name  = $_POST['name'];
  $price = $_POST['price'];
  
  $imageName = $_FILES['image']['name'];
  $tmpName   = $_FILES['image']['tmp_name'];
  move_uploaded_file($tmpName, "uploads/" . $imageName);
  
  $conn->query("INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$imageName')");
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Produk</title>
</head>
<body>
  <h1>Tambah Produk</h1>
  <form method="post" enctype="multipart/form-data">
    <label>Nama Produk:</label><br>
    <input type="text" name="name" required><br><br>
    <label>Harga:</label><br>
    <input type="number" name="price" required><br><br>
    <label>Gambar:</label><br>
    <input type="file" name="image" required><br><br>
    <button type="submit" name="submit">Simpan</button>
  </form>
</body>
</html>
