<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $layanan->judul ?? 'Detail Layanan Hukum Bisnis' }}</title>
    <link rel="stylesheet" href="{{ asset('lihatdetail.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <header>
            <a href="{{url('/')}}" class="btn-back">Kembali</a>
            <h1>{{ $layanan->judul ?? 'Hukum Bisnis' }}</h1>
        </header>

        <section class="content-section">
            <h2>Apa Itu {{ $layanan->judul ?? 'Hukum Bisnis?' }}?</h2>
            <p>{{ $layanan->apa_itu ?? 'Hukum Bisnis (atau sering disebut Business Law atau Hukum Dagang) adalah seperangkat aturan dan norma hukum yang mengatur tata cara dan pelaksanaan kegiatan usaha, industri, ataupun keuangan.' }}</p>
        </section>

        <section class="content-section highlight-bg">
            <h2>Mengapa Anda Membutuhkan {{ $layanan->judul ?? 'Hukum Bisnis' }}?</h2>
            <p>{{ $layanan->mengapa_butuh ?? 'Memiliki fondasi hukum yang kuat bukan sekadar formalitas, melainkan investasi strategis untuk menjaga keberlangsungan dan keamanan operasional perusahaan Anda. Berikut adalah beberapa alasan mengapa layanan hukum bisnis sangat penting:' }}</p>
        </section>

        <section class="benefits-section">
            <h2 class="center-title">Keuntungan Menggunakan Layanan {{ $layanan->judul ?? 'Hukum Bisnis' }} Kami</h2>
            
            <div class="cards-container">
                @if($layanan->keuntungan_1)
                <div class="card">
                    <h3>{{ $layanan->keuntungan_1_title ?? 'Kepastian & Keamanan Operasional' }}</h3>
                    <p>{{ $layanan->keuntungan_1 ?? 'Layanan hukum bisnis memberikan Anda kepastian bahwa setiap langkah operasional—mulai dari pendirian usaha hingga transaksi dagang—telah sesuai dengan regulasi yang berlaku. Hal ini melindungi bisnis Anda dari risiko sanksi administratif, denda, atau penghentian paksa oleh otoritas terkait.' }}</p>
                </div>
                @endif

                @if($layanan->keuntungan_2)
                <div class="card">
                    <h3>{{ $layanan->keuntungan_2_title ?? 'Legitimasi & Kredibilitas Profesional' }}</h3>
                    <p>{{ $layanan->keuntungan_2 ?? 'Memiliki legalitas badan usaha dan perjanjian yang standar mengakui keberadaan bisnis Anda secara sah di mata negara dan mitra. Status ini meningkatkan kepercayaan investor, perbankan, dan klien, serta mencegah sengketa internal mengenai kepemilikan aset atau saham perusahaan.' }}</p>
                </div>
                @endif
            </div>
        </section>

        <div class="footer-action">
            <button class="btn-contact">Hubungi Kami</button>
        </div>
    </div>
    <a href="https://wa.me" class="wa-float" target="_blank">
        <img src="image/wa.png" alt="">
        <span>Chat Gratis 15 Menit</span>
    </a>

</body>
</html>