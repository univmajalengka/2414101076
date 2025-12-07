<?php
// Prosedur / Fungsi untuk menghitung diskon berdasarkan total belanja
function hitungDiskon($totalBelanja) {
    $diskon = 0;

    if ($totalBelanja >= 100000) {
        $diskon = 0.10 * $totalBelanja;   // Diskon 10%
    } elseif ($totalBelanja >= 50000) {
        $diskon = 0.05 * $totalBelanja;   // Diskon 5%
    }

    return $diskon; // Mengembalikan nilai diskon
}

// ================================
// Contoh penggunaan prosedur
// ================================

$totalBelanja = 120000; // Contoh total belanja Rp. 120.000
$diskon = hitungDiskon($totalBelanja); // Memanggil fungsi hitungDiskon()

echo "Total Belanja: Rp. " . $totalBelanja . "<br>";
echo "Diskon: Rp. " . $diskon . "<br>";
echo "Total yang Harus Dibayar: Rp. " . ($totalBelanja - $diskon) . "<br>";
?>
