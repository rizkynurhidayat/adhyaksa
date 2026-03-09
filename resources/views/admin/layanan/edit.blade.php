@extends('admin.layouts.master')

@section('title', 'Edit Layanan')

@section('content')
<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Edit Layanan: {{ $layanan->judul }}</h5>
        <a href="{{ route('admin.layanan.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Judul Layanan</label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $layanan->judul) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Slug (URL)</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $layanan->slug) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Ikon Saat Ini</label>
            @if($layanan->ikon)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $layanan->ikon) }}" width="100" class="rounded border shadow-sm">
                </div>
            @endif
            <input type="file" name="ikon" class="form-control @error('ikon') is-invalid @enderror">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti ikon.</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi Singkat (Muncul di Depan)</label>
            <textarea name="deskripsi_singkat" class="form-control" rows="2" required>{{ old('deskripsi_singkat', $layanan->deskripsi_singkat) }}</textarea>
        </div>

        <hr>
        <h6 class="fw-bold mb-3 text-primary">Konten Detail Layanan</h6>

        <div class="mb-3">
            <label class="form-label">Apa Itu (Deskripsi Detail)</label>
            <textarea name="apa_itu" class="form-control" rows="4">{{ old('apa_itu', $layanan->apa_itu) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Mengapa Membutuhkan Layanan Ini?</label>
            <textarea name="mengapa_butuh" class="form-control" rows="4">{{ old('mengapa_butuh', $layanan->mengapa_butuh) }}</textarea>
        </div>

        <div class="row mb-4">
            <label class="form-label d-block">Poin-Poin Keuntungan (Max 2)</label>
            <div class="col-md-6">
                <label class="small text-muted">Keuntungan 1</label>
                <input type="text" name="keuntungan_1" class="form-control" value="{{ old('keuntungan_1', $layanan->keuntungan_1) }}">
            </div>
            <div class="col-md-6">
                <label class="small text-muted">Keuntungan 2</label>
                <input type="text" name="keuntungan_2" class="form-control" value="{{ old('keuntungan_2', $layanan->keuntungan_2) }}">
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Persentase Kasus (%)</label>
                <input type="number" name="persentase_kasus" class="form-control" value="{{ old('persentase_kasus', $layanan->persentase_kasus) }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Urutan Tampil</label>
                <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $layanan->urutan) }}">
            </div>
            <div class="col-md-4 mb-3 d-flex align-items-end">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ $layanan->is_active ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Aktifkan Layanan</label>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary px-5">Simpan Perubahan</button>
            <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
        </div>
    </form>
</div>
@endsection