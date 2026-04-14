<?php
// lihat folder database
// operasi update
// bisa menggunakan CLI saja

$host = 'localhost';
$db   = 'mahasiswa';
$user = 'root';
$pass = '12345';

// ==========================
// KONFIGURASI DATABASE
// ==========================
$dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Koneksi DB gagal: " . $e->getMessage());
}

// input dari CLI
$id = readline("Masukkan ID: ");
$username = readline("Masukkan nama baru: ");

// update query
$sql = "UPDATE user SET username = :username WHERE id = :id";
$stmt = $pdo->prepare($sql);

$result = $stmt->execute([
    'username' => $username,
    'id' => $id
]);

if ($result) {
    echo "Data berhasil diupdate\n";
} else {
    echo "Gagal update\n";
}



?>