<?php
// 1. Mulai session
session_start();

// 2. Hapus semua variabel session
$_SESSION = [];

// 3. Hancurkan session
session_destroy();

// 4. Redirect ke halaman login
header("Location: login.php");
exit;
