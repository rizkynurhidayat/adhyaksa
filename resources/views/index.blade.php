<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adhyaksa Partner</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    
</head>

<body>


    <!-- ================== navbar ==================-->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <img src="image/logo.png" alt="Logo">
            </div>

            <ul class="nav-links" id="nav-menu">
                <div class="close-menu" id="close-menu">
                    <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px" fill="currentColor"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                </div>
                <li><a href="#">Beranda</a></li>
                <li><a href="#profilpendiri">Profil</a></li>
                <li><a href="#layanankami">Layanan</a></li>
                <li><a href="#blog">Blog</a></li>
                <li><a href="#hubungikami">Kontak</a></li>
            </ul>
            
            <div class="nav-cta">
                <a href="https://docs.google.com/forms/d/e/1FAIpQLScMLys1zr-66y0z_Vic4mXvhJWDy6JvxNRlsQv9KHw44BmXig/viewform" class="btn-gold">Konsultasi</a>
            </div>
            
            <div class="menu-toggle hidden" id="mobile-menu">
               <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
            </div>
        </div>
    </nav>

    <a href="https://wa.me" class="wa-float" target="_blank">
        <img src="image/wa.png" alt="">
        <span>Chat Gratis 15 Menit</span>
    </a>
    

    <!--================== Beranda  ==================-->
    <header class="hero">
        <div class="hero-overlay"></div>
        <div class="container hero-wrapper">
            <div class="hero-text">
                <img src="image/simbol1.svg" alt="Icon" class="hero-icon">
                <h1>Mitra Hukum Terpercaya <br><span>untuk Bisnis Anda</span></h1>
                <p>Jasa konsultan hukum profesional yang memberikan solusi tepat, terpercaya, dan sesuai peraturan bagi individu maupun perusahaan.</p>
                <a href="#layanankami">
                    <button class="btn-main">Dapatkan Layanan Kami</button>
                </a>
            </div>

            <div class="hero-image">
                <img src="image/imglawyer.png" alt="Lawyers">
            </div>
        </div>
    </header>




    <!--================== profil pendiri ==================-->
    <section id="profilpendiri" class="founder-section">
        <div class="container">
            <div class="title-text">
                <h2>PROFIL PENDIRI</h2>
                <div class="underline-center"></div>
            </div>

            <div class="founder-content">
                <div class="founder-image-box">
                    @if(isset($profil->foto) && $profil->foto)
                        <img src="{{ asset('storage/' . $profil->foto) }}" alt="{{ $profil->nama ?? 'Pendiri' }}">
                    @else
                        <img src="image/yulistia.png" alt="Pendiri">
                    @endif
                </div>

                <div class="founder-details">
                    <h1 class="main-name">{{ $profil->nama ?? 'Yulistya Adi Nugraha S.H., M.Kn' }}</h1>
                    @if(isset($profil->position) && $profil->position)
                        <p class="founder-position" style="color: #c8a45a; font-weight: 600; margin-bottom: 10px;">{{ $profil->position }}</p>
                    @endif
                    <p class="description">
                        {{ $profil->deskripsi ?? 'Meskipun kami berbasis di Kabupaten Tegal, layanan kenotariatan kami siap membantu klien dari berbagai latar belakang—termasuk pemilik tanah di wilayah pelosok yang belum bersertifikat—untuk menembus kendala administrasi yang berbelit dan mendapatkan hak hukum mereka sepenuhnya.' }}
                    </p>

                    <div class="founder-stats">
                        <div class="stat-box gray-box">
                            <span class="stat-number">{{ $profil->persentase_kasus ?? '95' }}%</span>
                            <span class="stat-desc">Kasus Sukses</span>
                        </div>
                        <div class="stat-box gold-box">
                            <span class="stat-number">{{ $profil->tahun_pengalaman ?? '12' }}+</span>
                            <span class="stat-desc">Tahun<br>Pengalaman</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!--================== layanan kami ==================-->
    <section id="layanankami" class="layanan-section">
        <div class="container">
            <div class="section-title">
                <h2>LAYANAN KAMI</h2>
                <div class="underline-center"></div>
            </div>

            <div class="layanan-grid">
                @foreach($layanans as $layanan)
                <div class="layanan-card">
                    <img src="{{ asset('storage/' . $layanan->ikon) }}" alt="{{ $layanan->judul }}">
                    <h3>{{ $layanan->judul }}</h3>
                    <p class="subtitle">Yulistya Adi Nugraha</p>
                    <div class="card-footer">
                        <span class="tag">{{ $layanan->persentase_kasus ?? '95' }}% kasus tertangani</span>
                        <a href="{{ route('layanan.detail', $layanan->slug) }}" class="btn-detail">Lihat Detail</a>
                    </div>
                </div>
                @endforeach

                <div class="layanan-card">
                    <img src="image/logo hukum.svg" alt="Sengketa Lahan">
                    <h3>Sengketa Lahan</h3>
                    <p class="subtitle">Yulistya Adi Nugraha</p>
                    <div class="card-footer">
                        <span class="tag">95% kasus tertangani</span>
                        <a href="hukumsengketa.html" class="btn-detail">Lihat Detail</a>
                    </div>
                </div>

                <div class="layanan-card">
                    <img src="image/logo hukum.svg" alt="Kontrak">
                    <h3>Kontrak</h3>
                    <p class="subtitle">Yulistya Adi Nugraha</p>
                    <div class="card-footer">
                        <span class="tag">95% kasus tertangani</span>
                        <a href="hukumkontrak.html" class="btn-detail" >Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="layanan-bottom">
                <p>Kami menyediakan layanan konsultasi hukum profesional yang berfokus pada <br>
                    ketepatan, kerahasiaan, dan solusi terbaik untuk setiap permasalahan hukum Anda.</p>
                <a href="#" class="btn-konsultasi-large">Konsultasi</a>
            </div>
        </div>
    </section>



    <!--================== Daftar Klien ==================-->
    <section class="client-section">
        <div class="container">
            <div class="client-header">
                <h1>Daftar Klien & Rekan Kami</h1>
                <div class="underline-center"></div>
                <p> Sebagai bukti komitmen kami dalam memberikan layanan hukum yang handal dan mudah
                    <br>diakses, berikut adalah klien dan partner kami
                </p>
            </div>

            <div class="logo-slider">
                <div class="logo-track">
                    <img src="image/geprek.png" alt="Geprek">
                    <img src="image/pertamina.png" alt="Pertamina">
                    <img src="image/pecel.png" alt="Pecel Lele">
                    <img src="image/indomie.png" alt="Indomie">
                    <img src="image/geprek.png" alt="Geprek">
                    <img src="image/pertamina.png" alt="Pertamina">
                    <img src="image/pecel.png" alt="Pecel Lele">
                    <img src="image/indomie.png" alt="Indomie">
                </div>
            </div>

            <div class="stats-container-row">
                <div class="stat-item gold-card">
                    <span class="stat-val">100+</span>
                    <span class="stat-lab">Klien<br>Terlayani</span>
                </div>
                
                <div class="stat-item dark-card">
                    <i class="fas fa-file-alt"></i>
                    <div class="stat-text-group">
                        <span class="stat-val">95%</span>
                        <span class="stat-lab">Kasus Sukses</span>
                    </div>
                </div>

                <div class="stat-item gold-card">
                    <span class="stat-val">12+</span>
                    <span class="stat-lab">Tahun<br>Pengalaman</span>
                </div>
            </div>
        </div>
    </section>



    <!--================== Blog  ==================-->
    <section id="blog" class="blog-section">
        <div class="container">
            <div class="blog-header">
                <h2>BLOG</h2>
                <div class="underline-center"></div>
                <p class="subtitle">Analisis hukum terbaru & terpercaya dari praktisi</p>
            </div>

            <div class="blog-grid">
                <article class="blog-card">
                    <a href="#" class="blog-link">
                        <div class="blog-img-wrapper">
                            <img src="image/img blog1.png" alt="Kasus Hukum Bisnis">
                        </div>
                        <div class="blog-content">
                            <h4>Adhyaksa & Partners Berhasil memenangkan kasus hukum bisnis</h4>
                            <span class="stat-tag">97% orang terbantu</span>
                        </div>
                    </a>
                </article>

                <article class="blog-card">
                    <a href="#" class="blog-link">
                        <div class="blog-img-wrapper">
                            <img src="image/img blog2.png" alt="Kasus Sengketa Lahan">
                        </div>
                        <div class="blog-content">
                            <h4>Adhyaksa & Partners Berhasil menangani kasus sengketa lahan</h4>
                            <span class="stat-tag">99% orang terbantu</span>
                        </div>
                    </a>
                </article>

                <article class="blog-card">
                    <a href="#" class="blog-link">
                        <div class="blog-img-wrapper">
                            <img src="image/img blog3.png" alt="Kasus Hukum Kontrak">
                        </div>
                        <div class="blog-content">
                            <h4>Adhyaksa & Partners Berhasil menangani kasus hukum kontrak</h4>
                            <span class="stat-tag">98% orang terbantu</span>
                        </div>
                    </a>
                </article>
            </div>

            <div class="cta-bottom">
                <p>Butuh pendampingan hukum yang tepat?<br>
                    Konsultasikan permasalahan hukum Anda dengan tim ahli kami.
                </p>
                <a href="#" class="btn-hubungi">Hubungi Kami</a>
            </div>
        </div>
    </section>

    <!--================== hubungi kami ==================-->
    <footer id="hubungikami" class="footer-section">
    <div class="container">
        <div class="footer-header">
            <h2>Hubungi Kami</h2>
            <div class="underline-center">
                <i class="fas fa-balance-scale"></i>
            </div>
            <p>Kami siap menjadi mitra hukum Anda dalam menghadapi berbagai persoalan hukum secara profesional dan terpercaya.</p>
        </div>

        <div class="contact-grid">
            <div class="contact-card">
                <div class="icon-box">
                    <img src="image/icons8-gmail-48.png">
                </div>
                <h3>Email Kami</h3>
                <a href="mailto:adhyaksapartners@gmail.com">adhyaksapartners@gmail.com</a>
                <a href="mailto:mitrahukum_anda@gmail.com">mitrahukum_anda@gmail.com</a>
            </div>

            <div class="contact-card">
                <div class="icon-box">
                    <img src="image/wa.png">
                </div>
                <h3>WhatsApp</h3>
                <a href="https://wa.me" target="_blank">+62 882-3962-7371</a>
                <a href="https://wa.me" target="_blank">+62 857-7952-4825</a>
            </div>

            <div class="contact-card">
                <div class="icon-box">
                    <img src="image/google-maps.png">
                </div>
                <h3>Lokasi Kantor</h3>
                <a href="https://maps.app.goo.gl/KpLbCPbegLo3VVkR9">Jl. KH. Agus Salim, Kudaile, Kec. Slawi, Kab. Tegal 524135</a>
            </div>
        </div>
    </div>

    <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31682.214506683496!2d109.10645432552936!3d-6.976630553532447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fbeef3f898a49%3A0x9ab741554fbee2ec!2sNotaris%20Yulistya%20Adi%20Nugraha.%2C%20S.H.M.Kn!5e0!3m2!1sid!2sid!4v1768187812085!5m2!1sid!2sid" width="900" height="450" style="border:0;"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="footer-bottom">
        <div class="container bottom-content">
            <p>© 2025 Adhyaksa & Partners - Konsultan Hukum. Semua Hak Dilindungi.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</footer>
    <!-- <footer id="hubungikami" class="footer-section">
        <div class="container">
            <div class="footer-header">
                <h2>Hubungi Kami</h2>
                <div class="underline-center">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <p>Kami siap menjadi mitra hukum Anda dalam menghadapi berbagai persoalan hukum secara profesional dan
                    terpercaya.
                </p>
            </div>

            <div class="contact-card-container">
                <div class="icon-circle">
                    <img src="image/icons8-gmail-48.png" alt="Email">
                    <img src="image/wa.png" alt="WA">
                    <img src="image/maps.png" alt="Maps">
                </div>
                <span class="garis"></span>

                <div class="contact-card">
                    <div class="card-content">
                        <b>konsultanhukum</b>
                        <a href="mailto:adhyaksapartners@gmail.com">adhyaksapartners@gmail.com</a>
                        <a href="mailto:mitrahukum_anda@gmail.com">mitrahukum_anda@gmail.com</a>
                    </div>

                    <div class="card-content">
                        <a href="https://wa.me/6288239627371" target="_blank"><i class="fas fa-user"></i> +62882-3962-7371</a>
                        <a href="https://wa.me/6285879524825" target="_blank"><i class="fas fa-user"></i> +62858-7952-4825</a>
                        <a href="https://wa.me/6281215816678" target="_blank"><i class="fas fa-user"></i> +62812-1581-6678</a>
                        <a href="https://wa.me/6283823719251" target="_blank"><i class="fas fa-user"></i> +62838-2371-9251</a>
                    </div>
                                 
                    <div class="card-content">
                        <a href="https://maps.google.com/?q=Jl. KH. Agus Salim Kudaile, Kecamatan Slawi, Kab. Tegal 52413"target="_blank">
                            Jl. KH. Agus Salim Kelurahan Kudaile,<br>
                            Kecamatan Slawi,<br>
                            Kab. Tegal 52413
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31682.214506683496!2d109.10645432552936!3d-6.976630553532447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fbeef3f898a49%3A0x9ab741554fbee2ec!2sNotaris%20Yulistya%20Adi%20Nugraha.%2C%20S.H.M.Kn!5e0!3m2!1sid!2sid!4v1768187812085!5m2!1sid!2sid" width="600" height="450" style="border:0;"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        <div class="copyright">
            <div class="container">
                <i class="fas fa-balance-scale"></i>
                <span>&copy; 2025 Adhyaksa & Partners - Konsultan Hukum. Semua Hak Dilindungi.</span>
            </div>
        </div>
    </footer> -->
    <!--================== pemanggilan js ==================-->
    <script src="{{ asset('script.js') }}"></script>
</body>
</html>