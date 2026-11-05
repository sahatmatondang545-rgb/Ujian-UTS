<?php

require_once 'auth.php';

// Memeriksa login dan hak akses admin
wajibRole('admin');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>

    <h2>Selamat Datang, Admin!</h2>

    <p>Anda berhasil masuk ke halaman admin.</p>

    <a href="logout.php">Logout</a>

</body>
</html>