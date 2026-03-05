@extends('views.layouts.master') 

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $layanan->judul }}</h1>
            <hr>
            @if($layanan->ikon)
                <img src="{{ asset('storage/' . $layanan->ikon) }}" class="img-fluid mb-4" style="max-width: 200px;">
            @endif
            
            <div class="konten-layanan">
                {!! $layanan->konten !!} {{-- Menggunakan {!! !!} agar tag HTML dari editor (seperti <p> atau <b>) terbaca --}}
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card p-3">
                <h5>Statistik Kasus</h5>
                <p>Tingkat Keberhasilan: <strong>{{ $layanan->persentase_kasus }}%</strong></p>
                <a href="https://wa.me/nomorkamu" class="btn btn-success">Konsultasi Sekarang</a>
            </div>
        </div>
    </div>
</div>
@endsection