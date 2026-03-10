@extends('admin.layouts.master')

@section('title', 'Tambah Layanan')

@section('content')
<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Tambah Layanan Baru</h5>
        <a href="{{ route('admin.layanan.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Judul Layanan</label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Slug (URL)</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="contoh: hukum-bisnis" required>
                @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Ikon (Image)</label>
            <input type="file" name="ikon" class="form-control @error('ikon') is-invalid @enderror">
            <small class="text-muted">Format: png, jpg, svg. Max: 2MB</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi Singkat (Muncul di Halaman Depan)</label>
            <textarea name="deskripsi_singkat" class="form-control" rows="2" required>{{ old('deskripsi_singkat') }}</textarea>
        </div>

        <hr>
        <h6 class="fw-bold mb-3 text-primary">Konten Detail Layanan</h6>

        <div class="mb-3">
            <label class="form-label">Apa Itu (Deskripsi Detail)</label>
            <textarea name="apa_itu" class="form-control" rows="4" placeholder="Jelaskan apa itu layanan ini...">{{ old('apa_itu') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Mengapa Membutuhkan Layanan Ini?</label>
            <textarea name="mengapa_butuh" class="form-control" rows="4" placeholder="Alasan klien harus menggunakan layanan ini...">{{ old('mengapa_butuh') }}</textarea>
        </div>

        <div class="row mb-4">
            <label class="form-label d-block">Poin-Poin Keuntungan (Max 3)</label>
            <div class="col-md-4">
                <input type="text" name="keuntungan_1" class="form-control" value="{{ old('keuntungan_1') }}" placeholder="Keuntungan 1">
            </div>
            <div class="col-md-4">
                <input type="text" name="keuntungan_2" class="form-control" value="{{ old('keuntungan_2') }}" placeholder="Keuntungan 2">
            </div>
            <div class="col-md-4">
                <input type="text" name="keuntungan_3" class="form-control" value="{{ old('keuntungan_3') }}" placeholder="Keuntungan 3">
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Urutan Tampil</label>
                <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 0) }}">
            </div>
            <div class="col-md-6 mb-3 d-flex align-items-end">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                    <label class="form-check-label" for="is_active">Aktifkan Layanan</label>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary px-5">Simpan Layanan</button>
        </div>
    </form>
</div>
@endsection