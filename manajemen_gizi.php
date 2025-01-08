<?php
session_start();
include 'db.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

// Ambil data makanan dari database
$sql = "SELECT * FROM gizi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Gizi - Paperless Office</title>
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
        nav .menu {
            display: flex;
            gap: 10px; /* Memberi jarak antar menu */
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
            padding: 40px;
            text-align: center;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
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
            color: white;
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
        <h1>Manajemen Gizi</h1>
        <div class="menu">
            <a href="tambah_makanan.php" class="btn-tambah">Tambah Makanan</a>
            <a href="dashboard.php">Kembali</a>
        </div>
    </nav>

    <main>
        <h2>Daftar Makanan dan Komposisi Gizi</h2>
        <table>
        <thead>
                <tr>
                    <th>Nama Makanan</th>
                    <th>Kalori</th>
                    <th>Karbohidrat</th>
                    <th>Protein</th>
                    <th>Lemak</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['nama_makanan']); ?></td>
                            <td><?php echo htmlspecialchars($row['kalori']); ?> kcal</td>
                            <td><?php echo htmlspecialchars($row['karbohidrat']); ?> g</td>
                            <td><?php echo htmlspecialchars($row['protein']); ?> g</td>
                            <td><?php echo htmlspecialchars($row['lemak']); ?> g</td>
                            <td>
                                <a href="edit_gizi.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                                <a href="delete_gizi.php?id=<?php echo $row['id']; ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Tidak ada data makanan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

    <div class="footer">
        <p>&copy; 2025 <a href="https://paperlessoffice.com" target="_blank">Paperless Office</a>. Semua hak cipta dilindungi.</p>
    </div>
</body>
</html>
