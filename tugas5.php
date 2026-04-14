<?php
// menjalankan kode php di web server
// cara1: xampp
// file php disisipkan di folder xampp/htdocs

// cara2: wsl, apache2, php, mysql
// konfigurasi apache


echo "<h3>Saya menggunakan Laragon untuk menjalankan Localhost dan PHP Web Server</h3>";


// KONEKSI DATABASE
$host = "localhost";
$user = "root";
$pass = "12345";
$db   = "mahasiswa";

$conn = new mysqli($host, $user, $pass, $db);

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// QUERY DATA
$sql = "SELECT * FROM user"; // sesuaikan nama tabel
$result = $conn->query($sql);

// validasi query
if (!$result) {
    die("Query error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tugas 5 - Web Server PHP</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        h3 {
            text-align: center;
            color: #171616;
        }

        .container {
            width: 60%;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #007BFF;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .empty {
            text-align: center;
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>PHP Web Server (Laragon)</h2>
    <h3>Data Users</h3>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
        </tr>

        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['username']; ?></td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="2" class="empty">Tidak ada data</td>
            </tr>
        <?php endif; ?>

    </table>

</div>

</body>
</html>