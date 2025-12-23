<?php 
include 'config.php'; 

// Ambil semua data pesanan
$query = "SELECT * FROM pesanan ORDER BY id_pesanan DESC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pesanan & Modifikasi</title>
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
    <h2>Daftar Pesanan</h2>

    <?php if (isset($_GET['status'])): ?>
        <p style="color: green; font-weight: bold;"><?php 
            if ($_GET['status'] == 'sukses_simpan') echo 'Data pesanan berhasil disimpan!';
            if ($_GET['status'] == 'sukses_edit') echo 'Data pesanan berhasil diubah!';
            if ($_GET['status'] == 'sukses_hapus') echo 'Data pesanan berhasil dihapus!';
        ?></p>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Phone</th>
                <th>Jml Peserta</th>
                <th>Jml Hari</th>
                <th>Penginapan</th>
                <th>Transportasi</th>
                <th>Servis/Makan</th>
                <th>Harga Paket</th>
                <th>Total Tagihan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['nama_pemesan']); ?></td>
                        <td><?php echo htmlspecialchars($row['nomor_hp']); ?></td>
                        <td><?php echo htmlspecialchars($row['jumlah_peserta']); ?></td>
                        <td><?php echo htmlspecialchars($row['waktu_perjalanan']); ?></td>
                        <td><?php echo $row['penginapan']; ?></td>
                        <td><?php echo $row['transportasi']; ?></td>
                        <td><?php echo $row['service_makan']; ?></td>
                        <td><?php echo number_format($row['harga_paket'], 0, ',', '.'); ?></td>
                        <td><?php echo number_format($row['jumlah_tagihan'], 0, ',', '.'); ?></td>
                        <td>
                            <a href="pemesanan_edit.php?id=<?php echo $row['id_pesanan']; ?>" class="edit-btn">Edit</a>
                            <button onclick="confirmDelete(<?php echo $row['id_pesanan']; ?>)" class="delete-btn">Delete</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="10">Tidak ada data pesanan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
[cite_start]// Fungsi konfirmasi hapus [cite: 62]
function confirmDelete(id) {
    // Tampilkan pop-up konfirmasi
    if (confirm("Anda yakin akan hapus data pesanan ini? [cite: 34]")) {
        // Jika OK, redirect ke proses_hapus.php
        window.location.href = 'proses_hapus.php?id=' + id;
    }
}
</script>

</body>
</html>
<?php 
mysqli_close($koneksi);
?>