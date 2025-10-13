<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id=$id");
$product = $result->fetch_assoc();

if(isset($_POST['update'])){
  $name  = $_POST['name'];
  $price = $_POST['price'];

  if(!empty($_FILES['image']['name'])){
    $imageName = $_FILES['image']['name'];
    $tmpName   = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmpName, "uploads/" . $imageName);
    $conn->query("UPDATE products SET name='$name', price='$price', image='$imageName' WHERE id=$id");
  } else {
    $conn->query("UPDATE products SET name='$name', price='$price' WHERE id=$id");
  }

  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Produk</title></head>
<body>
  <h1>Edit Produk</h1>
  <form method="post" enctype="multipart/form-data">
    <label>Nama Produk:</label><br>
    <input type="text" name="name" value="<?= $product['name'] ?>"><br><br>
    <label>Harga:</label><br>
    <input type="number" name="price" value="<?= $product['price'] ?>"><br><br>
    <label>Gambar:</label><br>
    <input type="file" name="image"><br><br>
    <img src="uploads/<?= $product['image'] ?>" width="100"><br><br>
    <button type="submit" name="update">Update</button>
  </form>
</body>
</html>
