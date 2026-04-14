<?php
// INFO SERVER
echo "<h3 style='text-align:center;'>Menjalankan PHP dengan Laragon Localhost</h3>";

// KONFIGURASI DATABASE
$db_host = "localhost";
$db_user = "root";
$db_pass = "12345";
$db_name = "mahasiswa";

// MEMBUAT KONEKSI
$koneksi = new mysqli($db_host, $db_user, $db_pass, $db_name);

// CEK KONEKSI
if ($koneksi->connect_errno) {
    exit("Gagal koneksi database: " . $koneksi->connect_error);
}

// AMBIL DATA
$query = "SELECT id, username FROM user";
$data  = $koneksi->query($query);

// CEK QUERY
if ($data === false) {
    exit("Terjadi kesalahan query: " . $koneksi->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data User - PHP</title>

    <style>
        body {
            font-family: Verdana, sans-serif;
            background: #9db4c0;
            padding: 20px;
        }

        .box {
            width: 65%;
            margin: auto;
            background: #6a6df0;
            padding: 25px;
            border-radius: 12px;
        }

        h2, h4 {
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
        }

        th {
            background: #7faee0;
            color: #fff;
            padding: 12px;
        }

        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }

        tr:hover {
            background: #eaeaea;
        }

        .no-data {
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>

<div class="box">

    <h2>Aplikasi PHP & MySQL</h2>
    <h4>Daftar User</h4>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
            </tr>
        </thead>

        <tbody>
            <?php if ($data->num_rows > 0): ?>
                <?php while ($item = $data->fetch_assoc()): ?>
                    <tr>
                        <td><?= $item['id']; ?></td>
                        <td><?= $item['username']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2" class="no-data">Data tidak ditemukan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>