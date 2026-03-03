// 1. ketika navbar di scroll berubah warna dan mengambang
window.onscroll = function() {
    var nav = document.querySelector('.navbar');
    var hamburgerSvg = document.querySelector('#mobile-menu svg'); // icon hamburger
    
    if (window.scrollY > 50) {
        // jika di-scroll lebih dari 50px
        nav.classList.add("scrolled");
        
        // hamburger akan berubah warna hitam ketika di scroll di navbar warna putih
        if (hamburgerSvg) {
            hamburgerSvg.setAttribute('fill', '#000000');
        }
    } else {
        // jika kembali ke atas akan seperti semula
        nav.classList.remove("scrolled");
        
        // warna hamburger akan kembali jadi putih ketika kembali keatas
        if (hamburgerSvg) {
            hamburgerSvg.setAttribute('fill', '#ffffff');
        }
    }
};

// 2. icon klik open menu dan closemenu (Buka/Tutup)
const mobileMenu = document.querySelector('#mobile-menu');
const closeMenu = document.querySelector('#close-menu');
const navLinks = document.querySelector('#nav-menu');

// jika klik hamburger --> keluar menu 
if (mobileMenu) {
    mobileMenu.addEventListener('click', () => {
        navLinks.classList.add('active');
    });
}

// klik close (X) -> menutup Menu
if (closeMenu) {
    closeMenu.addEventListener('click', () => {
        navLinks.classList.remove('active');
    });
}

// klik Isi Menu -> akan menutup menu dan langsung menuju ke halaman
document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('click', () => {
        navLinks.classList.remove('active');
    });
});