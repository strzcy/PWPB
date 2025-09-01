<?php
require 'koneksi.php';
$id = $_GET['id'];
if (!is_numeric($id)) {
 die("Invalid ID");
}
$query = "SELECT * FROM products WHERE id=$id";
$result = mysqli_query($koneksi, $query);
$product = mysqli_fetch_assoc($result);
if (!$product) {
 die("Produk tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Edit Produk</title>
 <style>
 body { font-family: 'Segoe UI', sans-serif; background-color: #f8f9fa; padding: 20px; 
color: #333; }
 .container { max-width: 500px; margin: auto; background: #fff; padding: 30px; boxshadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 8px; }
 h1 { text-align: center; color: #343a40; border-bottom: 2px solid #28a745; paddingbottom: 10px; margin-bottom: 20px; }
 .form-group { margin-bottom: 20px; }
 .form-group label { display: block; margin-bottom: 8px; font-weight: bold; }
 .form-group input, .form-group textarea { width: 100%; padding: 10px; box-sizing: 
border-box; border: 1px solid #ccc; border-radius: 4px; }
 .btn { width: 100%; padding: 12px 15px; color: #fff; background-color: #28a745; border: 
none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background-color 0.3s; 
}
 .btn:hover { background-color: #218838; }
 </style>
</head>
<body>
 <div class="container">
 <h1>Formulir Edit Produk</h1>
 <form action="proses_edit.php" method="POST">
 <input type="hidden" name="id" value="<?= $product['id']; ?>">
 <div class="form-group">
 <label for="name">Nama Produk</label>
 <input type="text" name="name" id="name" value="<?= 
htmlspecialchars($product['name']); ?>" required>
 </div>
 <div class="form-group">
 <label for="description">Deskripsi</label>
 <textarea name="description" id="description" rows="4"><?= 
htmlspecialchars($product['description']); ?></textarea>
 </div>
 <div class="form-group">
 <label for="price">Harga</label>
 <input type="number" name="price" id="price" value="<?= $product['price']; ?>" 
required>
 </div>
 <div class="form-group">
 <label for="stock">Stok</label>
 <input type="number" name="stock" id="stock" value="<?= $product['stock']; ?>" 
required>
 </div>
 <button type="submit" class="btn">Simpan Perubahan</button>
 </form>
 </div>
</body>
</html>