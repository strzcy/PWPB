<?php
    if(isset($_SESSION['username'])) {
        $nama_pengguna = $_SESSION['username'];
        $peran_pengguna = $_SESSION['role'];
        echo "Selamat datang kembali di halaman kedua, " . $nama_pengguna . "!<br>";
        echo "Peran Anda adalah sebagai: " . $peran_pengguna . ".<br>";
        echo "Ini membuktikan bahwa server masih mengingat Anda meskipun Anda sudah berpindah halaman.";
    }else {
        echo"maaf, tidak ada data session yang ditemukan";
        echo '<br><a href="buat_session.php">Kembali ke halaman buat session</a>';
    }
?>