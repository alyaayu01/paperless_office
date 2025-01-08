<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tips Gizi Sehat - Paperless Office</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        nav {
            background: #4CAF50;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        nav h1 {
            margin: 0;
            font-size: 28px;
        }
        nav .menu {
            display: flex;
            gap: 15px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            background: #6FBF73;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s ease;
        }
        nav a:hover {
            background: #5AA965;
        }
        main {
            flex: 1;
            padding: 40px;
            text-align: left;
        }
        main h2 {
            font-size: 32px;
            margin-bottom: 20px;
            text-align: center;
            color: #4CAF50;
        }
        .tip {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .tip h3 {
            margin: 0 0 10px;
            color: #388E3C;
        }
        .tip p {
            margin: 0;
            color: #555;
            line-height: 1.6;
        }
        .footer {
            background: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
            margin-top: auto;
        }
        .footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
        .footer a:hover {
            color: #c8f7c5;
        }
    </style>
</head>
<body>
    <nav>
        <h1>Paperless Office</h1>
        <div class="menu">
            <a href="manajemen_gizi.php">Manajemen Gizi</a>
            <a href="tips_gizi.php">Tips Gizi Sehat</a>
            <a href="kalkulator_kalori.php">Kalkulator Kalori</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <main>
        <h2>Tips Gizi Sehat</h2>

        <div class="tip">
            <h3>1. Makanlah Beragam Jenis Makanan</h3>
            <p>Untuk mendapatkan asupan gizi yang seimbang, pastikan Anda mengonsumsi berbagai jenis makanan, termasuk sayuran, buah-buahan, biji-bijian, protein, dan lemak sehat.</p>
        </div>

        <div class="tip">
            <h3>2. Hindari Konsumsi Gula Berlebihan</h3>
            <p>Gula yang berlebihan dapat menyebabkan obesitas dan meningkatkan risiko diabetes. Batasi konsumsi minuman manis dan makanan tinggi gula.</p>
        </div>

        <div class="tip">
            <h3>3. Pastikan Cukup Serat dalam Diet Anda</h3>
            <p>Makanan tinggi serat, seperti buah-buahan, sayuran, dan biji-bijian, membantu pencernaan yang sehat dan mengurangi risiko penyakit kronis.</p>
        </div>

        <div class="tip">
            <h3>4. Minum Air yang Cukup</h3>
            <p>Hidrasi adalah kunci. Pastikan Anda minum minimal 8 gelas air setiap hari untuk menjaga tubuh tetap sehat dan berenergi.</p>
        </div>

        <div class="tip">
            <h3>5. Batasi Konsumsi Lemak Jenuh</h3>
            <p>Lemak jenuh, seperti yang terdapat dalam makanan cepat saji, harus dikonsumsi dalam jumlah minimal. Pilih lemak sehat seperti yang ditemukan dalam alpukat atau kacang-kacangan.</p>
        </div>

        <div class="tip">
            <h3>6. Makan Secara Teratur</h3>
            <p>Jangan melewatkan waktu makan. Makan secara teratur membantu menjaga energi sepanjang hari dan mencegah makan berlebihan.</p>
        </div>

        <div class="tip">
            <h3>7. Perhatikan Porsi Makan</h3>
            <p>Kendalikan porsi makan Anda untuk mencegah asupan kalori yang berlebihan. Gunakan piring yang lebih kecil jika diperlukan.</p>
        </div>
    </main>

    <div class="footer">
        <p>&copy; 2025 <a href="https://paperlessoffice.com" target="_blank">Paperless Office</a>. Semua hak cipta dilindungi.</p>
    </div>
</body>
</html>
