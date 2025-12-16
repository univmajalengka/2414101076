// --- Logika Slideshow ---
let slideIndex = 0;

function showSlides() {
    let i;
    // Dapatkan semua elemen dengan class 'mySlides'
    let slides = document.getElementsByClassName("mySlides");
    
    // Safety check 1: Jika tidak ada elemen slideshow, hentikan fungsi.
    if (slides.length === 0) {
        return; 
    }

    // Sembunyikan semua slide
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    
    // Hitung slide berikutnya
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }    
    
    // Tampilkan slide yang sekarang
    let currentSlide = slides[slideIndex - 1];
    
    // Safety check 2: Pastikan elemen slide yang akan ditampilkan ada
    if (currentSlide) {
        currentSlide.style.display = "block";  
        // Ulangi setelah 4 detik
        setTimeout(showSlides, 4000); 
    }
}

// --- Logika Perhitungan Formulir Pemesanan & Inisialisasi DOM ---
// Pastikan semua kode dijalankan setelah semua elemen HTML dimuat
document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Inisialisasi Slideshow (akan berjalan hanya jika elemen 'mySlides' ada)
    showSlides(); 

    // 2. Logika Perhitungan Formulir
    const form = document.getElementById('pemesanan-form');

    // Blok kode ini hanya berjalan di halaman yang memiliki form dengan ID 'pemesanan-form'
    if (form) {
        const penginapanCheckbox = document.getElementById('penginapan');
        const transportasiCheckbox = document.getElementById('transportasi');
        const makanCheckbox = document.getElementById('service_makan');
        const waktuPerjalananInput = document.getElementById('waktu_perjalanan');
        const jumlahPesertaInput = document.getElementById('jumlah_peserta');
        const hargaPaketInput = document.getElementById('harga_paket');
        const jumlahTagihanInput = document.getElementById('jumlah_tagihan');
        const hitungButton = document.getElementById('hitung-btn');

        // PENTING: Periksa apakah semua elemen form yang dibutuhkan ada sebelum mencoba menggunakannya
        // Ini adalah poin kritis yang mungkin menyebabkan 'Cannot read properties of null'
        if (!penginapanCheckbox || !transportasiCheckbox || !makanCheckbox || 
            !waktuPerjalananInput || !jumlahPesertaInput || 
            !hargaPaketInput || !jumlahTagihanInput) {
            // Jika ada elemen penting yang hilang, hentikan fungsi perhitungan
            // Ini mencegah error pada baris addEventListener
            return;
        }

        // Konstanta harga
        const HARGA_PENGINAPAN = 1000000;
        const HARGA_TRANSPORTASI = 1200000;
        const HARGA_MAKAN = 500000;

        function hitungHarga() {
            let hargaPaket = 0;
            // Pastikan nilai diinput dan diubah ke angka (float/number)
            let waktuPerjalanan = parseFloat(waktuPerjalananInput.value) || 0;
            let jumlahPeserta = parseFloat(jumlahPesertaInput.value) || 0;

            if (penginapanCheckbox.checked) {
                hargaPaket += HARGA_PENGINAPAN;
            }
            if (transportasiCheckbox.checked) {
                hargaPaket += HARGA_TRANSPORTASI;
            }
            if (makanCheckbox.checked) {
                hargaPaket += HARGA_MAKAN;
            }

            // Update Harga Paket Perjalanan
            hargaPaketInput.value = hargaPaket;
            
            // Hitung Jumlah Tagihan
            let jumlahTagihan = waktuPerjalanan * jumlahPeserta * hargaPaket;
            jumlahTagihanInput.value = jumlahTagihan;
        }

        // Tambahkan event listener untuk perhitungan saat ada perubahan
        penginapanCheckbox.addEventListener('change', hitungHarga);
        transportasiCheckbox.addEventListener('change', hitungHarga);
        makanCheckbox.addEventListener('change', hitungHarga);
        waktuPerjalananInput.addEventListener('input', hitungHarga);
        jumlahPesertaInput.addEventListener('input', hitungHarga);
        
        // Event listener untuk tombol 'Hitung' 
        if (hitungButton) {
            hitungButton.addEventListener('click', function(e) {
                e.preventDefault();
                hitungHarga();
            });
        }
        
        // Panggil hitungHarga saat halaman dimuat (penting untuk kasus Edit)
        hitungHarga(); 

        // --- Logika Validasi Form (Sisi Klien) ---
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            const requiredFields = [
                'nama_pemesan', 'nomor_hp', 'tanggal_pesan', 
                'waktu_perjalanan', 'jumlah_peserta'
            ];
            
            requiredFields.forEach(id => {
                const input = document.getElementById(id);
                
                if (input && !input.value.trim()) {
                    isValid = false;
                    input.style.border = '2px solid red';
                } else if (input) {
                    input.style.border = '1px solid #ccc';
                }
            });

            if (!isValid) {
                e.preventDefault(); 
                alert('Data form pemesanan harus terisi semua!'); 
            }
        });
    }
});