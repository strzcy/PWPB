<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana PHP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #ff8c00, #ffcc33);
        }

        .calculator {
            background-color: #fffaf5;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
            width: 320px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .calculator:hover {
            transform: scale(1.02);
        }

        .calculator h2 {
            margin-bottom: 20px;
            color: #ff6600;
        }

        .calculator input[type="number"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 12px;
            border: 2px solid #ffa94d;
            border-radius: 10px;
            font-size: 1.1em;
            outline: none;
            transition: 0.3s;
        }

        .calculator input[type="number"]:focus {
            border-color: #ff6600;
            box-shadow: 0 0 8px rgba(255, 102, 0, 0.4);
        }

        .calculator .buttons button {
            width: 48%;
            padding: 12px;
            margin: 5px 1%;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #ff6600, #ff9900);
            color: white;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .calculator .buttons button:hover {
            background: linear-gradient(135deg, #ff7f27, #ffb347);
            box-shadow: 0 4px 10px rgba(255, 102, 0, 0.5);
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            background: #ffe8cc;
            border-left: 6px solid #ff6600;
            border-radius: 10px;
            font-size: 1.2em;
            font-weight: bold;
            color: #cc5200;
            box-shadow: inset 0 2px 6px rgba(255, 102, 0, 0.1);
        }
        #hehe {
    display: grid;
    grid-template-columns: repeat(4, auto); /* kolom sesuai lebar tombol */
    gap: 10px; /* kasih jarak antar tombol */
    justify-content: center; /* biar seluruh grid ketengah */
    margin-top: 10px;
}

#lin {
    text-align:center;
    padding-right:20px;
}
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Kalkulator Sederhana</h2>
        <form action="" method="post">
            <input type="number" name="angka1" placeholder="Angka Pertama" required>
            <input type="number" name="angka2" placeholder="Angka Kedua" required>
            <div id="hehe" class="buttons">
                <button id="lin" type="submit" name="operasi" value="tambah">+</button>
                <button id="lin" type="submit" name="operasi" value="kurang">-</button>
                <button id="lin" type="submit" name="operasi" value="kali">×</button>
                <button id="lin" type="submit" name="operasi" value="bagi">÷</button>
            </div>
        </form>

        <div class="result">
            <?php
            if (isset($_POST['operasi'])) {
                $angka1 = $_POST['angka1'];
                $angka2 = $_POST['angka2'];
                $operasi = $_POST['operasi'];

                $hasil = 0;
                switch ($operasi) {
                    case 'tambah':
                        $hasil = $angka1 + $angka2;
                        break;
                    case 'kurang':
                        $hasil = $angka1 - $angka2;
                        break;
                    case 'kali':
                        $hasil = $angka1 * $angka2;
                        break;
                    case 'bagi':
                        if ($angka2 != 0) {
                            $hasil = $angka1 / $angka2;
                        } else {
                            $hasil = "Tidak bisa dibagi nol!";
                        }
                        break;
                    default:
                        $hasil = "Operasi tidak valid!";
                        break;
                }
                echo "Hasil: " . $hasil;
            } else {
                echo "Masukkan angka dan pilih operasi.";
            }
            ?>
        </div>
    </div>
</body>
</html>
