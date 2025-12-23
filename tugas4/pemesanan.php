<?php 
include 'config.php'; 
$paket_terpilih = isset($_GET['paket']) ? htmlspecialchars($_GET['paket']) : 'Paket Wisata Umum';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemesanan Paket Wisata</title>
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
    <h2>Form Pemesanan Paket Wisata: <?php echo $paket_terpilih; ?></h2>
    
    <form id="pemesanan-form" action="proses_simpan.php" method="POST">
        <input type="hidden" name="paket_nama" value="<?php echo $paket_terpilih; ?>">
        
        <div class="form-group">
            <label for="nama_pemesan">Nama Pemesan:</label>
            <input type="text" id="nama_pemesan" name="nama_pemesan" required>
        </div>
        
        <div class="form-group">
            <label for="nomor_hp">Nomor HP/Telp:</label>
            <input type="text" id="nomor_hp" name="nomor_hp" required>
        </div>
        
        <div class="form-group">
            <label for="tanggal_pesan">Tanggal Pesan:</label>
            <input type="date" id="tanggal_pesan" name="tanggal_pesan" required>
        </div>
        
        <div class="form-group">
            <label for="waktu_perjalanan">Waktu Pelaksanaan Perjalanan (Hari):</label>
            <input type="number" id="waktu_perjalanan" name="waktu_perjalanan" min="1" required>
        </div>

        <div class="form-group">
            <label>Pelayanan Paket Perjalanan:</label>
            <div>
                <input type="checkbox" id="penginapan" name="penginapan" value="Y">
                <label for="penginapan">Penginapan (Rp 1.000.000)</label> 
            </div>
            <div>
                <input type="checkbox" id="transportasi" name="transportasi" value="Y">
                <label for="transportasi">Transportasi (Rp 1.200.000)</label> 
            </div>
            <div>
                <input type="checkbox" id="service_makan" name="service_makan" value="Y">
                <label for="service_makan">Servis/Makan (Rp 500.000)</label> 
            </div>
        </div>
        
        <div class="form-group">
            <label for="jumlah_peserta">Jumlah Peserta:</label>
            <input type="number" id="jumlah_peserta" name="jumlah_peserta" min="1" required>
        </div>
        
        <div class="form-group">
            <label for="harga_paket">Harga Paket Perjalanan (Otomatis):</label>
            <input type="text" id="harga_paket" name="harga_paket" readonly>
            </div>
        
        <div class="form-group">
            <label for="jumlah_tagihan">Jumlah Tagihan (Otomatis):</label>
            <input type="text" id="jumlah_tagihan" name="jumlah_tagihan" readonly>
            </div>
        
        <button type="submit" class="btn" id="simpan-btn">Simpan</button>
        <button type="button" class="btn" id="hitung-btn" style="background-color: orange;">Hitung</button>
        <button type="reset" class="btn" style="background-color: red;">Reset</button>

        <?php if (isset($_GET['error'])): ?>
            <p style="color: red; margin-top: 10px;">* Data form pemesanan harus terisi semua!</p>
        <?php endif; ?>
    </form>
</div>

<script src="assets/js/script.js"></script>
</body>
</html>