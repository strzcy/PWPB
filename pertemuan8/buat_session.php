<?php
session_start();

$_SESSION['username']="Dessi Puspita Sari";
$_SESSION['role']="Guru";

echo "Halo, ". $_SESSION['username']. "!<br>";
echo "Sesion telah dibuat dan data anda sudah disimpan di server.<br>";
echo '<a href="tampil_session.php">Klik disini untuk pindah ke halaman tampil session</a>';

?>