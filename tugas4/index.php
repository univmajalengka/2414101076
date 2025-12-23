<?php 
// Sertakan konfigurasi koneksi (meskipun tidak ada interaksi DB di Beranda, ini baik untuk konsistensi)
include 'config.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang di Wisata JatiForest</title>
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

<div class="slideshow-container">
    <div class="mySlides fade">
        <img src="assets/images/slide1.jpg" alt="Pemandangan Hutan Jati"> 
    </div>
    <div class="mySlides fade">
        <img src="assets/images/slide2.jpg" alt="Aktivitas Outbound">
    </div>
    <div class="mySlides fade">
        <img src="assets/images/slide3.jpg" alt="Spot Foto JatiForest">
    </div>
</div>

<div class="container">
    <h2>Paket Wisata Unggulan</h2>
    <div class="paket-grid">
        
        <div class="paket-card">
            <img src="assets/images/paket1.jpg" alt="Trekking Jati">
            <div class="paket-card-body">
                <h3>Paket 1: Wisata Panahan</h3>
                <p>Rasakan keseruan bermain panahan dengan suasana alam.</p>
                <div class="youtube-link">
                    <iframe 
                        width="100%" 
                        height="200" 
                        src="https://www.youtube.com/embed/a_oIWFGCP8o" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                </div>
                <a href="pemesanan.php?paket=Trekking Jati" class="btn">Pesan Sekarang</a>
            </div>
        </div>

        <div class="paket-card">
            <img src="assets/images/paket2.jpg" alt="Edukasi Hutan">
            <div class="paket-card-body">
                <h3>Paket 2: Edukasi & Budaya</h3>
                <p>Pelajari ekosistem hutan jati dan interaksi dengan masyarakat lokal. Termasuk servis makan siang.</p>
                <div class="youtube-link">
                    <iframe 
                        width="100%" 
                        height="200" 
                        src="https://www.youtube.com/embed/5x2GTND9iI4" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                </div>
                <a href="pemesanan.php?paket=Edukasi Budaya" class="btn">Pesan Sekarang</a>
            </div>
        </div>

        <div class="paket-card">
            <img src="assets/images/paket3.jpg" alt="Outbound">
            <div class="paket-card-body">
                <h3>Paket 3: Petualangan Outbound</h3>
                <p>Aktivitas team building, flying fox, dan permainan alam. Sudah termasuk transportasi.</p>
                <div class="youtube-link">
                    <iframe 
                        width="100%" 
                        height="200" 
                        src="https://www.youtube.com/embed/ORnL7LOEZO4" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                </div>
                <a href="pemesanan.php?paket=Petualangan Outbound" class="btn">Pesan Sekarang</a>
            </div>
        </div>
        
    </div>
</div>

<script src="assets/js/script.js"></script>

</body>
</html>