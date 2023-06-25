<?php
error_reporting();
include 'koneksi.php';
session_start(); // Memulai sesi

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailOrUsername = $_POST['email_or_username'];
    $password = $_POST['password'];

    // Cek apakah email atau username diberikan
    if (empty($emailOrUsername)) {
        echo "Email/Username harus diisi!";
        exit;
    }

    // Cek apakah password diberikan
    if (empty($password)) {
        echo "Password harus diisi!";
        exit;
    }

    // Cari pengguna berdasarkan email atau username
    $query = "SELECT * FROM user WHERE email = '$emailOrUsername' OR username = '$emailOrUsername'";
    $result = mysqli_query($koneksi, $query);

    // Cek apakah pengguna ditemukan
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $hashedPassword = $user['password'];

        // Verifikasi password
        if (password_verify($password, $hashedPassword)) {
            // Password cocok, login berhasil

            // Simpan informasi pengguna ke sesi
            $_SESSION['user_id'] = $user['id_user'];
            $_SESSION['username'] = $user['username'];

            // Simpan informasi pengguna dalam cookie (opsional)
            $cookieName = 'user';
            $cookieValue = $user['id_user'];
            $cookieExpiration = time() + (86400 * 30); // Contoh: cookie berlaku selama 30 hari
            setcookie($cookieName, $cookieValue, $cookieExpiration, '/'); // Simpan cookie

            // Redirect pengguna ke halaman beranda
            header('Location: beranda.php');
            exit;
        } else {
            echo "Password salah!";
            exit;
        }
    } else {
        echo "Pengguna tidak ditemukan!";
        exit;
    }

    mysqli_close($koneksi);
}
?>
