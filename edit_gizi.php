<?php
session_start();
include 'db.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

// Ambil ID dari URL
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: manajemen_gizi.php');
    exit();
}

// Ambil data makanan berdasarkan ID
$sql = "SELECT * FROM gizi WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    header('Location: manajemen_gizi.php');
    exit();
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_makanan = htmlspecialchars($_POST['nama_makanan']);
    $kalori = htmlspecialchars($_POST['kalori']);
    $karbohidrat = htmlspecialchars($_POST['karbohidrat']);
    $protein = htmlspecialchars($_POST['protein']);
    $lemak = htmlspecialchars($_POST['lemak']);

    $sql_update = "UPDATE gizi SET nama_makanan = ?, kalori = ?, karbohidrat = ?, protein = ?, lemak = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param('siiiii', $nama_makanan, $kalori, $karbohidrat, $protein, $lemak, $id);

    if ($stmt_update->execute()) {
        header('Location: manajemen_gizi.php');
        exit();
    } else {
        $error_message = "Gagal memperbarui data.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Gizi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #a8d5ba, #c9e9d4);
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }
        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        form input {
            width: 96%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
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
        .back-button {
            display: inline-block;
            width: 97%;
            margin-top: 8px;
            background-color: #4CAF50; /* Sama dengan tombol update */
            color: white;
            padding: 8px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #45a049; /* Warna lebih gelap saat hover */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Data Makanan</h2>
        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?= $error_message; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="nama_makanan">Nama Makanan</label>
            <input type="text" id="nama_makanan" name="nama_makanan" value="<?= htmlspecialchars($data['nama_makanan']); ?>" required>

            <label for="kalori">Kalori (kcal)</label>
            <input type="number" id="kalori" name="kalori" value="<?= htmlspecialchars($data['kalori']); ?>" required>

            <label for="karbohidrat">Karbohidrat (g)</label>
            <input type="number" id="karbohidrat" name="karbohidrat" value="<?= htmlspecialchars($data['karbohidrat']); ?>" required>

            <label for="protein">Protein (g)</label>
            <input type="number" id="protein" name="protein" value="<?= htmlspecialchars($data['protein']); ?>" required>

            <label for="lemak">Lemak (g)</label>
            <input type="number" id="lemak" name="lemak" value="<?= htmlspecialchars($data['lemak']); ?>" required>

            <button type="submit">Update</button>
        </form>

        <!-- Tombol Kembali yang sama dengan Update -->
        <a href="manajemen_gizi.php" class="back-button">Kembali</a>
    </div>
</body>
</html>