<?php
$host = 'localhost'; //nama host database
$user = 'root'; // username database
$password = ''; // password database 
$dbname = 'sewslay'; // nama database

// koneksi database
$koneksi = mysqli_connect($host, $user, $password, $dbname);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>
