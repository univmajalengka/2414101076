/* ===================================================
                MOBILE MENU
=================================================== */
const menuBtn = document.getElementById("mobile-menu-button");
const mobileMenu = document.getElementById("mobile-menu");
const menuOpen = document.getElementById("menu-open");
const menuClose = document.getElementById("menu-close");

menuBtn.onclick = () => {
  mobileMenu.classList.toggle("hidden");
  menuOpen.classList.toggle("hidden");
  menuClose.classList.toggle("hidden");
};

/* ===================================================
                SLIDESHOW / CAROUSEL
=================================================== */
(function () {
  const slides = [...document.querySelectorAll(".carousel-slide")];
  const dots = document.querySelector(".carousel-dots");
  let i = 0;

  // buat dot indikator
  slides.forEach((s, x) => {
    let b = document.createElement("button");
    b.className = "bg-white/60";
    b.onclick = () => go(x);
    dots.appendChild(b);
  });

  // tampilkan slide
  function show() {
    slides.forEach((s, x) => {
      s.style.transform =
        x === i
          ? "translateX(0)"
          : x < i
          ? "translateX(-100%)"
          : "translateX(100%)";
    });

    dots.childNodes.forEach(
      (d, x) => (d.style.opacity = x === i ? "1" : "0.4")
    );
  }

  // pindah slide
  function go(x) {
    i = x;
    show();
  }

  // slide otomatis
  function next() {
    i = (i + 1) % slides.length;
    show();
  }

  // jalankan
  show();
  setInterval(next, 6000);
})();

/* ===================================================
        AUTO SELECT PAKET + SCROLL KE FORM
=================================================== */
function pesanPaket(nama) {
  document.getElementById("pilihanPaket").value = nama;
  document.location.hash = "pemesanan";
}
