<?php
require 'koneksi.php';
$query = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Manajemen Stok Produk</title>
 <style>
 body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: 
#f8f9fa; margin: 0; padding: 20px; color: #333; }
 .container { max-width: 1000px; margin: auto; background: #ffffff; padding: 20px; boxshadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 8px; }
 h1 { text-align: center; color: #343a40; border-bottom: 2px solid #007bff; paddingbottom: 10px; margin-bottom: 20px; }
 .btn { display: inline-block; padding: 10px 18px; margin-bottom: 20px; color: #fff; 
background-color: #007bff; text-decoration: none; border-radius: 5px; transition: 
background-color 0.3s; }
 .btn:hover { background-color: #0056b3; }
 table { width: 100%; border-collapse: collapse; }
 th, td { border: 1px solid #dee2e6; padding: 12px; text-align: left; }
 th { background-color: #343a40; color: #ffffff; }
 tr:nth-child(even) { background-color: #f2f2f2; }
 .actions a { margin-right: 10px; text-decoration: none; padding: 5px 10px; border-radius: 
4px; transition: opacity 0.3s; }
 .actions .edit { background-color: #28a745; color: white; }
 .actions .delete { background-color: #dc3545; color: white; }
 .actions a:hover { opacity: 0.8; }
 </style>
</head>
<body>
 <div class="container">
 <h1>Daftar Produk</h1>
 <a href="tambah.php" class="btn">Tambah Produk Baru</a>
 <table>
 <thead>
 <tr>
 <th>ID</th>
 <th>Nama Produk</th>
 <th>Deskripsi</th>
 <th>Harga</th>
 <th>Stok</th>
 <th>Aksi</th>
 </tr>
 </thead>
 <tbody>
 <?php while ($row = mysqli_fetch_assoc($result)) : ?>
 <tr>
 <td><?= $row['id']; ?></td>
 <td><?= htmlspecialchars($row['name']); ?></td>
 <td><?= htmlspecialchars($row['description']); ?></td>
 <td>Rp <?= number_format($row['price'], 0, ',', '.'); ?></td>
 <td><?= $row['stock']; ?></td>
 <td class="actions">
 <a href="edit.php?id=<?= $row['id']; ?>" class="edit">Edit</a>
 <a href="hapus.php?id=<?= $row['id']; ?>" class="delete" onclick="return 
confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</a>
 </td>
 </tr>
 <?php endwhile; ?>
 </tbody>
 </table>
 </div>
</body>
</html>