<?php
include 'config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $sql = "DELETE FROM pesanan WHERE id_pesanan = $id";

    if (mysqli_query($koneksi, $sql)) {
        // Jika berhasil, redirect ke halaman daftar pesanan
        header('Location: modifikasi_pesanan.php?status=sukses_hapus');
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
} else {
    header('Location: modifikasi_pesanan.php?status=error_hapus');
}

mysqli_close($koneksi);
?>