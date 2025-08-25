<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Pendataan Siswa</title>
 <style>
  /* CSS digunakan untuk mengatur tampilan/gaya halaman web */
  body {
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 90vh;
    background-color: #f4f4f4;
    padding: 20px;
    color:white;
  }
  .container {
    background-color: green;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 500px;
    margin-bottom: 20px;
  }
  h2 {
    text-align: center;
    /* color: #333; */
    margin-bottom: 25px;
  }
  label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    /* color: #555; */
  }
  input[type="text"],
  input[type="number"],
  select {
    text-align:center;
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1em;
  }
  button {
    width: 100%;
    padding: 12px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1.1em;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  button:hover {
    background-color: #218838;
  }
  .data-display {
    background-color: #e9ecef;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    width: 100%;
    max-width: 600px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
  }
  th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
    color:black;
  }
  th {
    background-color: green;
    color: white;
  }
  tr:nth-child(even) {
    background-color: #f8f9fa;
  }
  .message {
    text-align: center;
    color: #6c757d;
    margin-top: 15px;
  }

  .dwa {
    color:black;
  }
 </style>
</head>
<body>
  <div class="container">
    <h2>Form Input Data Siswa</h2>
    <form style="text-align:center;" action="" method="post">
      <label style="text-align:left;" for="nama">Nama Lengkap:</label>
      <input type="text" id="nama" name="nama" required>
      
      <label style="text-align:left;" for="umur">Umur:</label>
      <input type="number" id="umur" name="umur" min="15" max="20" required>

      <select id="kelas" name="kelas" required>
        <option value="">-- Pilih Kelas --</option>
        <option value="XI RPL 1">XI RPL 1</option>
        <option value="XI RPL 2">XI RPL 2</option>
        <option value="XI RPL 3">XI RPL 3</option>
      </select>


      <button type="submit" name="submit_data">Tambah Siswa</button>
    </form>
  </div>

  <div class="data-display">
    <h2 class="dwa">Daftar Siswa</h2>
    <?php
session_start(); 

if (!isset($_SESSION['daftar_siswa'])) {
    $_SESSION['daftar_siswa'] = [];
}

// Tambah siswa
if (isset($_POST['submit_data'])) {
    $nama  = htmlspecialchars($_POST['nama']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $umur  = (int)$_POST['umur'];

    $siswaBaru = [
        "nama"  => $nama,
        "kelas" => $kelas,
        "umur"  => $umur
    ];

    array_push($_SESSION['daftar_siswa'], $siswaBaru);

    echo "<p class='message' style='color: green;'>Data siswa " . $nama . " berhasil ditambahkan!</p>";
}

// Hapus siswa
if (isset($_POST['hapus_data'])) {
    $index = (int)$_POST['hapus_data'];
    if (isset($_SESSION['daftar_siswa'][$index])) {
        unset($_SESSION['daftar_siswa'][$index]);
        $_SESSION['daftar_siswa'] = array_values($_SESSION['daftar_siswa']); // reset index
        echo "<p class='message' style='color: red;'>Data siswa berhasil dihapus!</p>";
    }
}
if (!empty($_SESSION['daftar_siswa'])) {
    echo "<table>";
    echo "<thead><tr><th>No.</th><th>Nama</th><th>Kelas</th><th>Umur</th><th>Aksi</th></tr></thead>";
    echo "<tbody>";
    $nomor = 1;
    foreach ($_SESSION['daftar_siswa'] as $index => $data) {
        echo "<tr>";
        echo "<td>" . $nomor++ . "</td>";
        echo "<td>" . $data['nama'] . "</td>";
        echo "<td>" . $data['kelas'] . "</td>";
        echo "<td>" . $data['umur'] . "</td>";
        echo "<td>
                <form method='post' style='display:inline;'>
                    <button type='submit' name='hapus_data' value='" . $index . "' 
                        onclick=\"return confirm('Yakin mau hapus data ini?')\">Hapus</button>
                </form>
              </td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p class='message'>Belum ada data siswa.</p>";
}

?>

  </div>
</body>
</html>