<?php
/**
 * File: index.php
 * Proyek: Sistem Manajemen Stok Barang
 * Guru Pengampu: Bapak Sulthan Alawy Shihab, S.Kom.
 *
 * Kode PHP di sini akan dipakai untuk logika program.
 * Untuk saat ini masih dikosongkan.
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <!-- Metadata -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Manajemen Stok Barang</title>

  <!-- Styling (CSS) -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f2f5;
      margin: 0;
      padding: 20px;
      color: #333;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }

    .container {
      width: 100%;
      max-width: 900px;
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      box-sizing: border-box;
    }

    h1, h2 {
      text-align: center;
      color: #1e3a8a;
      font-weight: 600;
    }

    .form-section {
      background-color: #f9fafb;
      border: 1px solid #e5e7eb;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: 400;
      color: #4b5563;
    }

    input[type="text"], textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #d1d5db;
      border-radius: 6px;
      box-sizing: border-box;
      transition: border-color 0.2s;
    }

    input[type="text"]:focus, textarea:focus {
      outline: none;
      border-color: #2563eb;
    }

    .btn-submit {
      background-color: #22c55e;
      color: white;
      padding: 12px 20px;
      border: none;
      cursor: pointer;
      border-radius: 6px;
      font-weight: 600;
      transition: background-color 0.2s;
    }

    .btn-submit:hover {
      background-color: #16a34a;
    }

    .table-section table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    .table-section th, .table-section td {
      border: 1px solid #e5e7eb;
      padding: 12px;
      text-align: left;
    }

    .table-section th {
      background-color: #eef2ff;
      color: #1e3a8a;
      font-weight: 600;
    }

    .table-section tr:nth-child(even) {
      background-color: #f9fafb;
    }

    @media (max-width: 600px) {
      body {
        padding: 10px;
      }
      .container {
        padding: 20px;
      }
      .table-section table,
      .table-section thead,
      .table-section tbody,
      .table-section th,
      .table-section td,
      .table-section tr {
        display: block;
      }
      .table-section thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }
      .table-section tr {
        margin: 0 0 1rem 0;
      }
      .table-section td {
        border: none;
        border-bottom: 1px solid #e5e7eb;
        position: relative;
        padding-left: 50%;
        text-align: right;
      }
      .table-section td:before {
        position: absolute;
        top: 6px;
        left: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        text-align: left;
        font-weight: 600;
      }
      .table-section td:nth-of-type(1):before { content: "No"; }
      .table-section td:nth-of-type(2):before { content: "Nama Produk"; }
      .table-section td:nth-of-type(3):before { content: "Harga"; }
      .table-section td:nth-of-type(4):before { content: "Stok"; }
      .table-section td:nth-of-type(5):before { content: "Deskripsi"; }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Sistem Manajemen Stok Barang</h1>

    <!-- Form Tambah Produk -->
    <div class="form-section">
      <h2>Tambah Produk Baru</h2>
      <form action="" method="post">
        <div class="form-group">
          <label for="name">Nama Produk:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="price">Harga:</label>
          <input type="text" id="price" name="price" required>
        </div>
        <div class="form-group">
          <label for="stock">Stok:</label>
          <input type="text" id="stock" name="stock" required>
        </div>
        <div class="form-group">
          <label for="description">Deskripsi:</label>
          <textarea id="description" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn-submit">Tambah Produk</button>
      </form>
    </div>

    <!-- Tabel Data Produk -->
    <div class="table-section">
      <h2>Data Produk</h2>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Data produk akan ditampilkan di sini -->
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

