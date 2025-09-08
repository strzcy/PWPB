<?php
// Detail koneksi database
$host = "127.0.0.1:3307"; // harus pakai :3307 karena MySQL kamu jalan di port 3307
$user = "root";
$pass = "";
$db   = "db_manajemen_stok";

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Mengecek apakah koneksi berhasil atau gagal
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil!"; // buat tes
}
?>
