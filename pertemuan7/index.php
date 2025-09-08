<?php
require 'koneksi.php';
// --- LOGIKA PENCARIAN ---
$search = '';
$search_query_part = '';
if (isset($_GET['search'])) {
 $search = mysqli_real_escape_string($koneksi, $_GET['search']);
 // Membuat bagian WHERE untuk query jika ada pencarian
 $search_query_part = " WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
}
// --- LOGIKA PAGINATION ---
// 1. Tentukan batas data per halaman
$limit = 5;
// 2. Tentukan halaman aktif
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
// 3. Hitung offset
$offset = ($page - 1) * $limit;
// 4. Query untuk menghitung total data (dengan atau tanpa pencarian)
$total_result_query = "SELECT COUNT(id) AS total FROM products" . $search_query_part;
$total_result = mysqli_query($koneksi, $total_result_query);
$total_rows = mysqli_fetch_assoc($total_result)['total'];
$total_pages = ceil($total_rows / $limit);
// --- QUERY UTAMA PENGAMBIL DATA ---
$query = "SELECT * FROM products" . $search_query_part . " ORDER BY id DESC LIMIT $limit
OFFSET $offset";
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
 <form action="index.php" method="GET" style="display: flex; justify-content: flex-end;
margin-bottom: 20px;">
 <input type="text" name="search" placeholder="Cari produk..." value="<?=
htmlspecialchars($_GET['search'] ?? '') ?>">
 <button type="submit">Cari</button>
</form>
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
 <div style="margin-top: 20px; text-align: center;">
 <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
 <a href="?page=<?= $i; ?>&search=<?= htmlspecialchars($search); ?>" style="padding:
8px 12px; border: 1px solid #ddd; text-decoration: none; color: #007bff; <?= ($i == $page) ?
'background-color:#007bff; color:white;' : ''; ?>">
 <?= $i; ?>
 </a>
 <?php endfor; ?>
</div>

 </div>
</body>
</html>