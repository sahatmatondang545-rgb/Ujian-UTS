<?php

function wajibLogin() {

    // Memulai session
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Memeriksa apakah pengguna sudah login
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    // Batas waktu 15 menit
    $batasWaktu = 15 * 60;

    // Memeriksa aktivitas terakhir
    if (isset($_SESSION['last_activity'])) {

        if (time() - $_SESSION['last_activity'] > $batasWaktu) {

            // Menghapus session
            $_SESSION = [];
            session_destroy();

            header("Location: login.php?pesan=timeout");
            exit;
        }
    }

    // Memperbarui aktivitas terakhir
    $_SESSION['last_activity'] = time();
}


function wajibRole($role) {

    // Memastikan pengguna sudah login
    wajibLogin();

    // Memeriksa hak akses
    if (
        !isset($_SESSION['role']) ||
        $_SESSION['role'] !== $role
    ) {
        header("Location: login.php?pesan=akses_ditolak");
        exit;
    }

}

?>