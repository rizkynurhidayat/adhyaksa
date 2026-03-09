@extends('admin.layouts.master')

@section('title', 'Statistik Klien')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0 fw-bold text-dark">Kelola Statistik Klien</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">{{ session('success') }}</div>
    @endif

    <div class="card shadow border-0">
        <div class="card-body p-4">
            <form action="{{ route('admin.statistik.update') }}" method="POST">
                @csrf
                @method('PUT')
                
                <p class="text-muted mb-4">Angka-angka ini akan ditampilkan di bagian bawah Daftar Klien pada Halaman Utama.</p>

                <div class="row">
                    <div class="col-md-4 mb-4">
                        <label class="form-label fw-bold">Klien Terlayani</label>
                        <input type="text" name="klien_terlayani" class="form-control" value="{{ old('klien_terlayani', $statistik->klien_terlayani) }}" placeholder="Contoh: 100+" required>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <label class="form-label fw-bold">Kasus Sukses</label>
                        <input type="text" name="kasus_sukses" class="form-control" value="{{ old('kasus_sukses', $statistik->kasus_sukses) }}" placeholder="Contoh: 95%" required>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <label class="form-label fw-bold">Tahun Pengalaman</label>
                        <input type="text" name="tahun_pengalaman" class="form-control" value="{{ old('tahun_pengalaman', $statistik->tahun_pengalaman) }}" placeholder="Contoh: 12+" required>
                    </div>
                </div>

                <div class="mt-4 border-top pt-3 text-end">
                    <button type="submit" class="btn btn-primary px-5 shadow-sm">Simpan Statistik</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
