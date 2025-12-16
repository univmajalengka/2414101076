<?php
include 'config.php';

function safe_post($koneksi, $key) {
    return isset($_POST[$key]) ? mysqli_real_escape_string($koneksi, $_POST[$key]) : '';
}

// Cek data wajib
if (empty($_POST['id_pesanan']) || empty($_POST['nama_pemesan']) || empty($_POST['nomor_hp']) || empty($_POST['waktu_perjalanan']) || empty($_POST['jumlah_peserta'])) {
    header('Location: modifikasi_pesanan.php?status=error_edit');
    exit();
}

$id = (int)safe_post($koneksi, 'id_pesanan');
$nama = safe_post($koneksi, 'nama_pemesan');
$hp = safe_post($koneksi, 'nomor_hp');
$tanggal_pesan = safe_post($koneksi, 'tanggal_pesan');
$waktu = (int)safe_post($koneksi, 'waktu_perjalanan');
$peserta = (int)safe_post($koneksi, 'jumlah_peserta');

$penginapan = safe_post($koneksi, 'penginapan') == 'Y' ? 'Y' : 'N';
$transportasi = safe_post($koneksi, 'transportasi') == 'Y' ? 'Y' : 'N';
$makan = safe_post($koneksi, 'service_makan') == 'Y' ? 'Y' : 'N';

$harga_paket = (float)safe_post($koneksi, 'harga_paket');
$jumlah_tagihan = (float)safe_post($koneksi, 'jumlah_tagihan');

// SQL untuk update data
$sql = "UPDATE pesanan SET 
        nama_pemesan = '$nama', 
        nomor_hp = '$hp', 
        tanggal_pesan = '$tanggal_pesan', 
        waktu_perjalanan = $waktu, 
        penginapan = '$penginapan', 
        transportasi = '$transportasi', 
        service_makan = '$makan', 
        jumlah_peserta = $peserta, 
        harga_paket = $harga_paket, 
        jumlah_tagihan = $jumlah_tagihan
        WHERE id_pesanan = $id";

if (mysqli_query($koneksi, $sql)) {
    // Jika berhasil, redirect ke halaman daftar pesanan
    header('Location: modifikasi_pesanan.php?status=sukses_edit');
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>