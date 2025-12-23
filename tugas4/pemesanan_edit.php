<?php 
include 'config.php'; 

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id == 0) {
    header('Location: modifikasi_pesanan.php');
    exit();
}

// Ambil data pesanan berdasarkan ID
$query = "SELECT * FROM pesanan WHERE id_pesanan = $id";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
    echo "Data tidak ditemukan.";
    exit();
}

$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pesanan Paket Wisata</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <div class="container">
        <h1>Wisata JatiForest</h1>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="modifikasi_pesanan.php">Daftar Pesanan</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <h2>Form Edit Pesanan Paket Wisata</h2>
    
    <form id="pemesanan-form" action="proses_edit.php" method="POST">
        <input type="hidden" name="id_pesanan" value="<?php echo $data['id_pesanan']; ?>">
        
        <div class="form-group">
            <label for="nama_pemesan">Nama Pemesan:</label>
            <input type="text" id="nama_pemesan" name="nama_pemesan" value="<?php echo htmlspecialchars($data['nama_pemesan']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="nomor_hp">Nomor HP/Telp:</label>
            <input type="text" id="nomor_hp" name="nomor_hp" value="<?php echo htmlspecialchars($data['nomor_hp']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="tanggal_pesan">Tanggal Pesan:</label>
            <input type="date" id="tanggal_pesan" name="tanggal_pesan" value="<?php echo htmlspecialchars($data['tanggal_pesan']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="waktu_perjalanan">Waktu Pelaksanaan Perjalanan (Hari):</label>
            <input type="number" id="waktu_perjalanan" name="waktu_perjalanan" min="1" value="<?php echo htmlspecialchars($data['waktu_perjalanan']); ?>" required>
        </div>

        <div class="form-group">
            <label>Pelayanan Paket Perjalanan:</label>
            <div>
                <input type="checkbox" id="penginapan" name="penginapan" value="Y" <?php echo $data['penginapan'] == 'Y' ? 'checked' : ''; ?>>
                <label for="penginapan">Penginapan (Rp 1.000.000)</label>
            </div>
            <div>
                <input type="checkbox" id="transportasi" name="transportasi" value="Y" <?php echo $data['transportasi'] == 'Y' ? 'checked' : ''; ?>>
                <label for="transportasi">Transportasi (Rp 1.200.000)</label>
            </div>
            <div>
                <input type="checkbox" id="service_makan" name="service_makan" value="Y" <?php echo $data['service_makan'] == 'Y' ? 'checked' : ''; ?>>
                <label for="service_makan">Servis/Makan (Rp 500.000)</label>
            </div>
        </div>
        
        <div class="form-group">
            <label for="jumlah_peserta">Jumlah Peserta:</label>
            <input type="number" id="jumlah_peserta" name="jumlah_peserta" min="1" value="<?php echo htmlspecialchars($data['jumlah_peserta']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="harga_paket">Harga Paket Perjalanan (Otomatis):</label>
            <input type="text" id="harga_paket" name="harga_paket" readonly value="<?php echo htmlspecialchars($data['harga_paket']); ?>">
        </div>
        
        <div class="form-group">
            <label for="jumlah_tagihan">Jumlah Tagihan (Otomatis):</label>
            <input type="text" id="jumlah_tagihan" name="jumlah_tagihan" readonly value="<?php echo htmlspecialchars($data['jumlah_tagihan']); ?>">
        </div>
        
        <button type="submit" class="btn" id="simpan-btn">Simpan Perubahan</button>
        <button type="button" class="btn" id="hitung-btn" style="background-color: orange;">Hitung Ulang</button>
        <button type="button" class="btn" style="background-color: red;" onclick="window.location.href='modifikasi_pesanan.php'">Batal</button>
    </form>
</div>

<script src="assets/js/script.js"></script>
</body>
</html>
<?php 
mysqli_close($koneksi);
?>