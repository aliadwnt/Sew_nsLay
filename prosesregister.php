<?php
error_reporting();
include 'koneksi.php';
if(isset($_POST['register'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Cek apakah user dengan email yang sama sudah terdaftar
        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($koneksi, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "Email sudah terdaftar!";
            exit;
        }

        // Validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email tidak valid!";
            exit;
        }

        // Validasi username
        if (strlen($username) < 3) {
            echo "Username harus memiliki setidaknya 3 karakter!";
            exit;
        }

        // Validasi password
        if (strlen($password) < 6) {
            echo "Password harus memiliki setidaknya 6 karakter!";
            exit;
        }
        
         // Enkripsi password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


        // Insert data pengguna ke tabel user
        $tgl_buat = date('Y-m-d H:i:s');
        $query = "INSERT INTO user (email, username, password, tgl_buat) VALUES ('$email', '$username', '$hashedPassword', '$tgl_buat')";
        if (mysqli_query($koneksi, $query)) {
            // Redirect pengguna ke halaman login
            header('Location: login.php');
            exit;
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }

        mysqli_close($koneksi);
    }
?>
