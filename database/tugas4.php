<?php
// PROGRAM UPDATE DATA USER VIA CLI (PDO)

// SETTING DATABASE
$dbHost = "localhost";
$dbName = "mahasiswa";
$dbUser = "root";
$dbPass = "12345";

// BUAT KONEKSI PDO
try {
    $koneksi = new PDO(
        "mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4",
        $dbUser,
        $dbPass
    );

    // setting error mode
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $err) {
    exit("Tidak bisa konek ke database: " . $err->getMessage() . PHP_EOL);
}

// INPUT DARI TERMINAL
echo "=== UPDATE DATA USER ===\n";
$userId   = readline("Input ID user: ");
$namaBaru = readline("Input username baru: ");

// VALIDASI SEDERHANA
if (empty($userId) || empty($namaBaru)) {
    exit("ID dan username tidak boleh kosong!\n");
}

// QUERY UPDATE
$query = "UPDATE user SET username = :nama WHERE id = :uid";

try {
    $prepare = $koneksi->prepare($query);
    $prepare->bindParam(':nama', $namaBaru);
    $prepare->bindParam(':uid', $userId);

    $prepare->execute();

    // CEK APAKAH ADA DATA YANG BERUBAH
    if ($prepare->rowCount() > 0) {
        echo "Update berhasil ✔\n";
    } else {
        echo "Tidak ada data yang berubah (ID mungkin tidak ditemukan)\n";
    }

} catch (PDOException $e) {
    echo "Terjadi kesalahan saat update: " . $e->getMessage() . "\n";
}
?>