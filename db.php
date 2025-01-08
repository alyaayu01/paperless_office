<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paperless_office";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
