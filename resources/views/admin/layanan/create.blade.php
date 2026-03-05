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
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Slug (URL)</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="contoh: hukum-bisnis" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Ikon (Image)</label>
            <input type="file" name="ikon" class="form-control @error('ikon') is-invalid @enderror">
            <small class="text-muted">Format: png, jpg, svg. Max: 2MB</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi Singkat (Muncul di Depan)</label>
            <textarea name="deskripsi_singkat" class="form-control" rows="3" required>{{ old('deskripsi_singkat') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Konten Lengkap</label>
            <textarea name="konten" id="editor" class="form-control" rows="10">{{ old('konten') }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Persentase Kasus (%)</label>
                <input type="number" name="persentase_kasus" class="form-control" value="0">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Urutan Tampil</label>
                <input type="number" name="urutan" class="form-control" value="0">
            </div>
            <div class="col-md-4 mb-3 d-flex align-items-end">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                    <label class="form-check-label" for="is_active">Aktifkan Layanan</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn-main mt-3">Simpan Layanan</button>
    </form>
</div>
@endsection