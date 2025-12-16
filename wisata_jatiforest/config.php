<?php
// Pengaturan Koneksi Database MariaDB/MySQL
$host = "localhost";
$user = "root"; // Ganti dengan username Anda
$password = ""; // Ganti dengan password Anda
$database = "jatiforest"; 

$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>