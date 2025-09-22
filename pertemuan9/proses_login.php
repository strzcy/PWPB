<?php
// 1. Memulai session
session_start();

// 2. Include koneksi
require 'koneksi.php';

// 3. Pastikan data form dikirim
if (!isset($_POST['username'], $_POST['password'])) {
    header('Location: login.php?error=1');
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];

// 4. Ambil user dari database dengan prepared statement (lebih aman)
$stmt = mysqli_prepare($koneksi, "SELECT username, password, role FROM users WHERE username = ?");
if (!$stmt) {
    // jika gagal prepare, fallback ke redirect error
    header('Location: login.php?error=1');
    exit;
}
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($user = mysqli_fetch_assoc($result)) {
    $hashed_password = $user['password'];

    // 5. Verifikasi:
    // - Jika password di DB adalah hasil password_hash(), gunakan password_verify()
    // - Jika password di DB masih plaintext (seperti '12345'), cocokkan langsung (fallback)
    if ( (strlen($hashed_password) > 0 && password_verify($password, $hashed_password))
         || $password === $hashed_password ) {

        // Simpan session
        $_SESSION['username'] = $user['username'];
        $_SESSION['role']     = $user['role'];

        header('Location: index.php');
        exit;
    }
}

// 6. Jika gagal
header('Location: login.php?error=1');
exit;
