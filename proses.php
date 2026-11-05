<?php

// Koneksi database menggunakan PDO
$host = "localhost";
$db   = "db_perpus";
$user = "root";
$pass = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {
    die("Koneksi database gagal.");
}

// Memastikan data dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Akses tidak diizinkan.");
}

// Mengambil data input
$judul = trim($_POST['judul'] ?? '');
$tahun = $_POST['tahun'] ?? '';

// Validasi judul
if ($judul === '') {
    die("Judul wajib diisi.");
}

// Validasi tahun
$tahunSekarang = (int) date('Y');

if (
    !ctype_digit((string)$tahun) ||
    (int)$tahun < 1900 ||
    (int)$tahun > $tahunSekarang
) {
    die("Tahun harus berupa angka antara 1900 dan tahun berjalan.");
}

// Menyimpan data menggunakan prepared statement
$sql = "INSERT INTO buku (judul, tahun)
        VALUES (:judul, :tahun)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':judul' => $judul,
    ':tahun' => (int)$tahun
]);

echo "Buku berhasil disimpan.";

?>