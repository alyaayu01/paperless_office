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
    <title>Dashboard - Paperless Office</title>
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
            background: #4CAF50; /* Hijau netral */
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
            background: #6FBF73; /* Hijau netral untuk logout */
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s ease;
        }
        nav a:hover {
            background: #5AA965; /* Warna hijau lebih gelap saat hover */
        }
        main {
            flex: 1;
            padding: 40px;
            text-align: center;
        }
        main h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }
        main p {
            font-size: 18px;
            color: #555;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .menu-item {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .menu-item h3 {
            margin-bottom: 10px;
            font-size: 20px;
            color: #4CAF50;
        }
        .menu-item a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
            font-size: 16px;
        }
        .menu-item a:hover {
            color: #388E3C;
        }
        .footer {
            background: #4CAF50; /* Hijau netral */
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
            margin-top: auto; /* Agar footer tetap di bawah */
        }
        .footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
        .footer a:hover {
            color: #c8f7c5; /* Warna hijau terang */
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
        <h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>Gunakan menu di atas untuk mengelola data kesehatan Anda secara efisien.</p>

        <div class="menu-grid">
            <div class="menu-item">
                <h3>Manajemen Gizi</h3>
                <p>Kelola data makanan dan komposisi gizinya.</p>
            </div>
            <div class="menu-item">
                <h3>Tips Gizi Sehat</h3>
                <p>Pelajari tips pola makan sehat untuk kesehatan optimal.</p>
            </div>
            <div class="menu-item">
                <h3>Kalkulator Kalori</h3>
                <p>Hitung kebutuhan kalori harian Anda dengan mudah.</p>
            </div>
        </div>
    </main>

    <div class="footer">
        <p>&copy; 2025 <a href="https://paperlessoffice.com" target="_blank">Paperless Office</a>. Semua hak cipta dilindungi.</p>
    </div>
</body>
</html>
