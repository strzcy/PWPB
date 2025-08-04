<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana PHP</title>
    <style>
        /* CSS Sederhana untuk tampilan */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh; /* Setidaknya 80% tinggi viewport */
            background-color: #f0f0f0;
        }

        .calculator {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .calculator input[type="text"],
        .calculator input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1.1em;
        }

        .calculator .buttons button {
            width: 48%; /* Hampir setengah lebar */
            padding: 12px;
            margin: 5px 1%;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .calculator .buttons button:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9ecef;
            border-radius: 5px;
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Kalkulator Sederhana</h2>
        <form action="" method="post">
            <input type="number" name="angka1" placeholder="Angka Pertama" required>
            <input type="number" name="angka2" placeholder="Angka Kedua" required>
            <div class="buttons">
                <button type="submit" name="operasi" value="tambah">+</button>
                <button type="submit" name="operasi" value="kurang">-</button>
                <button type="submit" name="operasi" value="kali">*</button>
                <button type="submit" name="operasi" value="bagi">/</button>
            </div>
        </form>

        <div class="result">
            <?php
            // Cek apakah form sudah disubmit (tombol operasi sudah ditekan)
            // Mengapa menggunakan isset($_POST['operasi'])?
            // $_POST adalah superglobal PHP yang berisi data yang dikirim dari form dengan method="POST".
            // 'operasi' adalah nama (name) dari tombol yang kita tekan di form HTML.
            // isset() berfungsi untuk mengecek apakah sebuah variabel (dalam hal ini, $_POST['operasi']) sudah diatur atau memiliki nilai.
            // Kita melakukan ini karena saat halaman pertama kali dibuka, form belum di-submit, sehingga $_POST['operasi'] belum ada.
            // Jika kita langsung mencoba mengaksesnya, PHP akan mengeluarkan peringatan/error.
            // Dengan isset(), kita memastikan kode kalkulator hanya dijalankan setelah ada data yang valid dari form.
            if (isset($_POST['operasi'])) {

                // Mengambil nilai angka dari input form
                // Mengapa $_POST['nama_input']?
                // Ini adalah cara PHP mengakses data yang dikirim dari input HTML.
                // Kunci di dalam kurung siku ('angka1', 'angka2', 'operasi') harus sama persis dengan atribut 'name' di tag <input> atau <button> HTML.
                // $_POST['angka1'] akan mengambil nilai dari input dengan name="angka1".

                $angka1 = $_POST['angka1'];
                $angka2 = $_POST['angka2'];
                $operasi = $_POST['operasi']; // Mengambil jenis operasi dari tombol yang ditekan

                $hasil = 0; // Inisialisasi variabel hasil. Mengapa diinisialisasi?
                            // Ini adalah praktik yang baik untuk memastikan variabel memiliki nilai awal sebelum digunakan,
                            // meskipun PHP cukup fleksibel. Ini juga membantu menghindari peringatan jika ada kasus di mana $hasil tidak diatur di dalam switch.

                // Menggunakan struktur kontrol switch-case untuk menentukan operasi
                // Mengapa switch-case di sini?
                // Karena kita memiliki satu variabel ($operasi) yang bisa memiliki beberapa nilai diskrit ('tambah', 'kurang', 'kali', 'bagi').
                // Switch-case membuat kode lebih rapi dan mudah dibaca dibandingkan if-elseif-else yang panjang untuk skenario ini.
                switch ($operasi) {
                    case 'tambah':
                        $hasil = $angka1 + $angka2;
                        break; // Mengapa break? Menjelaskan di bagian materi atas.

                    case 'kurang':
                        $hasil = $angka1 - $angka2;
                        break;

                    case 'kali':
                        $hasil = $angka1 * $angka2;
                        break;

                    case 'bagi':
                        // Tambahkan kondisi khusus untuk pembagian dengan nol
                        // Mengapa ada if ($angka2 != 0)?
                        // Dalam matematika, pembagian dengan nol tidak terdefinisi dan akan menghasilkan error fatal (Fatal error: Division by zero) di PHP.
                        // Untuk mencegah program crash, kita harus melakukan validasi ini. Jika $angka2 adalah nol, kita berikan pesan khusus.
                        if ($angka2 != 0) {
                            $hasil = $angka1 / $angka2;
                        } else {
                            $hasil = "Tidak bisa dibagi nol!";
                        }
                        break;

                    default: // Mengapa default? Menjelaskan di bagian materi atas.
                        $hasil = "Operasi tidak valid!";
                        break;
                }

                // Menampilkan hasil
                // Mengapa menggunakan operator titik (.) untuk menggabungkan string?
                // Dalam PHP, operator titik (.) digunakan khusus untuk menggabungkan dua atau lebih string (teks).
                // Berbeda dengan bahasa lain yang mungkin menggunakan '+', PHP memisahkan fungsi penjumlahan angka dan penggabungan string.
                echo "Hasil: " . $hasil;

            } else {
                echo "Masukkan angka dan pilih operasi.";
            }
            ?>
        </div>
    </div>
</body>
</html>
