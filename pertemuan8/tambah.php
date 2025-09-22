<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Tambah Produk</title>
 <style>
 body { font-family: 'Segoe UI', sans-serif; background-color: #f8f9fa; padding: 20px; 
color: #333; }
 .container { max-width: 500px; margin: auto; background: #fff; padding: 30px; boxshadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 8px; }
 h1 { text-align: center; color: #343a40; border-bottom: 2px solid #007bff; paddingbottom: 10px; margin-bottom: 20px; }
 .form-group { margin-bottom: 20px; }
 .form-group label { display: block; margin-bottom: 8px; font-weight: bold; }
 .form-group input, .form-group textarea { width: 100%; padding: 10px; box-sizing: 
border-box; border: 1px solid #ccc; border-radius: 4px; }
 .btn { width: 100%; padding: 12px 15px; color: #fff; background-color: #007bff; border: 
none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background-color 0.3s; 
}
 .btn:hover { background-color: #0056b3; }
 </style>
</head>
<body>
 <div class="container">
 <h1>Formulir Tambah Produk</h1>
 <form action="proses_tambah.php" method="POST">
 <div class="form-group">
 <label for="name">Nama Produk</label>
 <input type="text" name="name" id="name" required>
 </div>
 <div class="form-group">
 <label for="description">Deskripsi</label>
 <textarea name="description" id="description" rows="4"></textarea>
 </div>
 <div class="form-group">
 <label for="price">Harga</label>
 <input type="number" name="price" id="price" required>
 </div>
 <div class="form-group">
 <label for="stock">Stok</label>
 <input type="number" name="stock" id="stock" required>
 </div>
 <button type="submit" class="btn">Simpan Produk</button>
 </form>
 </div>
</body>
</html>