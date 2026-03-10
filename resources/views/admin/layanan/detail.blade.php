@extends('admin.layouts.master') 

@section('title', 'Detail Layanan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h2 class="mb-4">{{ $layanan->judul }}</h2>
                    <hr>
                    
                    @if($layanan->ikon)
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $layanan->ikon) }}" class="img-fluid rounded" style="max-height: 250px;">
                        </div>
                    @endif
                    
                    <div class="konten-layanan mt-3">
                        <h5><strong>Apa Itu:</strong></h5>
                        <p>{!! nl2br(e($layanan->apa_itu)) !!}</p>
                        
                        <h5 class="mt-4"><strong>Mengapa Membutuhkan:</strong></h5>
                        <p>{!! nl2br(e($layanan->mengapa_butuh)) !!}</p>

                        <h5 class="mt-4"><strong>Keuntungan:</strong></h5>
                        <ul>
                            @if($layanan->keuntungan_1) <li>{{ $layanan->keuntungan_1 }}</li> @endif
                            @if($layanan->keuntungan_2) <li>{{ $layanan->keuntungan_2 }}</li> @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Informasi Layanan</h5>
                </div>
                <div class="card-body">
                    <p class="mb-1"><strong>Deskripsi Singkat:</strong></p>
                    <p class="text-muted small mb-3">{{ $layanan->deskripsi_singkat }}</p>

                    
                    <p class="mb-2"><strong>Status:</strong></p>
                    <span class="badge {{ $layanan->is_active ? 'bg-success' : 'bg-danger' }} mb-4">
                        {{ $layanan->is_active ? 'Aktif' : 'Non-Aktif' }}
                    </span>
                    
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="btn btn-primary">Edit Layanan</a>
                        <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline-secondary">Kembali ke Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection