CREATE TABLE IF NOT EXISTS pesanan (
    id_pesanan INT(11) PRIMARY KEY AUTO_INCREMENT,
    nama_pemesan VARCHAR(100) NOT NULL,
    nomor_hp VARCHAR(15) NOT NULL,
    tanggal_pesan DATE NOT NULL,
    waktu_perjalanan INT(3) NOT NULL,
    penginapan ENUM('Y', 'N') NOT NULL DEFAULT 'N',
    transportasi ENUM('Y', 'N') NOT NULL DEFAULT 'N',
    service_makan ENUM('Y', 'N') NOT NULL DEFAULT 'N',
    jumlah_peserta INT(5) NOT NULL,
    harga_paket DECIMAL(10, 0) NOT NULL,
    jumlah_tagihan DECIMAL(15, 0) NOT NULL
);