<?php
session_start();
include 'db.php';

// Tambahkan pengguna default jika belum ada
$default_username = 'alya';
$default_password = password_hash('alya29', PASSWORD_BCRYPT);

$sql_check = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param('s', $default_username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $sql_insert = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param('ss', $default_username, $default_password);
    $stmt_insert->execute();
}

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Paperless Office</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #a8d5ba, #c9e9d4); /* Warna hijau soft */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }
        form {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 25px;
            color: #4CAF50; /* Hijau tua */
        }
        input {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        input:focus {
            border-color: #4CAF50; /* Hijau soft */
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #4CAF50; /* Hijau */
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #45a049; /* Hijau lebih gelap */
        }
        p {
            color: red;
            font-size: 14px;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }
        .footer a {
            color: #4CAF50; /* Hijau */
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer a:hover {
            color: #45a049; /* Hijau lebih gelap */
        }
        .instructions {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }
        .instructions a {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <form method="POST">
        <h2>Manajemen Kesehatan</h2>
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
        <div class="footer">
            <p>Belum punya akun? <a href="register.php">Daftar</a></p>
        </div>
    </form>
</body>
</html>
