<?php
session_start();
include 'db.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

// Proses ketika formulir disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_makanan = htmlspecialchars($_POST['nama_makanan']);
    $kalori = htmlspecialchars($_POST['kalori']);
    $karbohidrat = htmlspecialchars($_POST['karbohidrat']);
    $protein = htmlspecialchars($_POST['protein']);
    $lemak = htmlspecialchars($_POST['lemak']);

    // Query untuk menambahkan data ke database
    $sql = "INSERT INTO gizi (nama_makanan, kalori, karbohidrat, protein, lemak) 
            VALUES ('$nama_makanan', '$kalori', '$karbohidrat', '$protein', '$lemak')";

    if ($conn->query($sql) === TRUE) {
        header('Location: manajemen_gizi.php'); // Redirect ke halaman utama
        exit();
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Makanan - Manajemen Gizi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #a8d5ba, #c9e9d4);
            margin: 0;
            padding: 0;
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
        }
        nav h1 {
            margin: 0;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            background: #6FBF73;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }
        nav a:hover {
            background: #5AA965;
        }
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10p rgb(0, 0, 0)(0, 0, 0)(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 22px;
            color: #333;
            text-align: center;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
            color: #555;
        }
        form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        form button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        form button:hover {
            background-color: #5AA965;
        }
        .footer {
            background: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
            margin-top: auto;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <h1>Tambah Makanan</h1>
        <a href="manajemen_gizi.php">Kembali</a>
    </nav>

    <main>
        <div class="form-container">
            <h2>Form Tambah Makanan</h2>
            <?php
            if (isset($error_message)) {
                echo "<p class='error'>{$error_message}</p>";
            }
            ?>
            <form method="POST" action="">
                <label for="nama_makanan">Nama Makanan</label>
                <input type="text" id="nama_makanan" name="nama_makanan" placeholder="Masukkan nama makanan" required>

                <label for="kalori">Kalori (kcal)</label>
                <input type="number" id="kalori" name="kalori" placeholder="Masukkan jumlah kalori" required>

                <label for="karbohidrat">Karbohidrat (g)</label>
                <input type="number" id="karbohidrat" name="karbohidrat" placeholder="Masukkan jumlah karbohidrat" required>

                <label for="protein">Protein (g)</label>
                <input type="number" id="protein" name="protein" placeholder="Masukkan jumlah protein" required>

                <label for="lemak">Lemak (g)</label>
                <input type="number" id="lemak" name="lemak" placeholder="Masukkan jumlah lemak" required>

                <button type="submit">Tambah Makanan</button>
            </form>
        </div>
    </main>

    <div class="footer">
        <p>&copy; 2025 Paperless Office. Semua hak cipta dilindungi.</p>
    </div>
</body>
</html>
