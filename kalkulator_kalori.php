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
    <title>Kalkulator Kalori - Paperless Office</title>
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
            text-align: center;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            position: relative;
        }
        form h2 {
            font-size: 24px;
            text-align: center;
            background: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin: -20px -20px 20px;
        }
        form label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
            color: #333;
        }
        form input, form select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        form button {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        form button:hover {
            background: #388E3C;
        }
        .result {
            margin-top: 20px;
            background: #e8f5e9;
            padding: 20px;
            border-radius: 10px;
            color: #388E3C;
            text-align: center;
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
        <form id="calorieForm">
            <h2>Kalkulator Kalori</h2>
            <label for="weight">Berat Badan (kg):</label>
            <input type="number" id="weight" name="weight" required>

            <label for="height">Tinggi Badan (cm):</label>
            <input type="number" id="height" name="height" required>

            <label for="age">Usia (tahun):</label>
            <input type="number" id="age" name="age" required>

            <label for="gender">Jenis Kelamin:</label>
            <select id="gender" name="gender" required>
                <option value="male">Pria</option>
                <option value="female">Wanita</option>
            </select>

            <label for="activity">Tingkat Aktivitas:</label>
            <select id="activity" name="activity" required>
                <option value="1.2">Sedentary (Sedikit atau tanpa aktivitas fisik)</option>
                <option value="1.375">Ringan (Olahraga ringan 1-3 hari/minggu)</option>
                <option value="1.55">Sedang (Olahraga moderat 3-5 hari/minggu)</option>
                <option value="1.725">Aktif (Olahraga berat 6-7 hari/minggu)</option>
                <option value="1.9">Sangat Aktif (Pekerjaan fisik berat/olahraga berat)</option>
            </select>

            <button type="button" onclick="calculateCalories()">Hitung Kalori</button>
        </form>

        <div id="result" class="result" style="display:none;"></div>
    </main>

    <div class="footer">
        <p>&copy; 2025 <a href="https://paperlessoffice.com" target="_blank">Paperless Office</a>. Semua hak cipta dilindungi.</p>
    </div>

    <script>
        function calculateCalories() {
            const weight = parseFloat(document.getElementById('weight').value);
            const height = parseFloat(document.getElementById('height').value);
            const age = parseInt(document.getElementById('age').value);
            const gender = document.getElementById('gender').value;
            const activity = parseFloat(document.getElementById('activity').value);

            let bmr;

            if (gender === 'male') {
                bmr = 10 * weight + 6.25 * height - 5 * age + 5;
            } else {
                bmr = 10 * weight + 6.25 * height - 5 * age - 161;
            }

            const calories = bmr * activity;

            document.getElementById('result').style.display = 'block';
            document.getElementById('result').innerHTML = `<h3>Kebutuhan Kalori Harian Anda:</h3><p>${calories.toFixed(2)} kalori</p>`;
        }
    </script>
</body>
</html>
