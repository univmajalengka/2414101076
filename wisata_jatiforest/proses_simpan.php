<?php
include 'config.php';

// Fungsi untuk membersihkan dan mengambil data POST
function safe_post($koneksi, $key) {
    return isset($_POST[$key]) ? mysqli_real_escape_string($koneksi, $_POST[$key]) : '';
}

// Cek apakah data yang wajib sudah terisi
if (empty($_POST['nama_pemesan']) || empty($_POST['nomor_hp']) || empty($_POST['tanggal_pesan']) || empty($_POST['waktu_perjalanan']) || empty($_POST['jumlah_peserta'])) {
    // Redirect kembali ke form dengan pesan error [cite: 50]
    header('Location: pemesanan.php?error=1');
    exit();
}

// Ambil data dari form
$nama = safe_post($koneksi, 'nama_pemesan');
$hp = safe_post($koneksi, 'nomor_hp');
$tanggal_pesan = safe_post($koneksi, 'tanggal_pesan');
$waktu = (int)safe_post($koneksi, 'waktu_perjalanan');
$peserta = (int)safe_post($koneksi, 'jumlah_peserta');

// Cek status checkbox
$penginapan = safe_post($koneksi, 'penginapan') == 'Y' ? 'Y' : 'N';
$transportasi = safe_post($koneksi, 'transportasi') == 'Y' ? 'Y' : 'N';
$makan = safe_post($koneksi, 'service_makan') == 'Y' ? 'Y' : 'N';

// Ambil nilai perhitungan (asumsi ini sudah dihitung benar oleh JS atau dihitung ulang di sini)
// Agar sesuai spesifikasi (asumsi perhitungan JS sudah benar)
$harga_paket = (float)safe_post($koneksi, 'harga_paket');
$jumlah_tagihan = (float)safe_post($koneksi, 'jumlah_tagihan');

// SQL untuk menyimpan data
$sql = "INSERT INTO pesanan (nama_pemesan, nomor_hp, tanggal_pesan, waktu_perjalanan, penginapan, transportasi, service_makan, jumlah_peserta, harga_paket, jumlah_tagihan)
        VALUES ('$nama', '$hp', '$tanggal_pesan', $waktu, '$penginapan', '$transportasi', '$makan', $peserta, $harga_paket, $jumlah_tagihan)";

if (mysqli_query($koneksi, $sql)) {
    // Jika berhasil, redirect ke halaman daftar pesanan 
    header('Location: modifikasi_pesanan.php?status=sukses_simpan');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>