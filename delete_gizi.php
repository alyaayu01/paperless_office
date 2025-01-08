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

if ($id) {
    $sql_delete = "DELETE FROM gizi WHERE id = ?";
    $stmt = $conn->prepare($sql_delete);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header('Location: manajemen_gizi.php');
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    header('Location: manajemen_gizi.php');
    exit();
}
?>
