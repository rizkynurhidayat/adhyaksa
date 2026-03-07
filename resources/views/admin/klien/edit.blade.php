@extends('admin.layouts.master')

@section('title', 'Edit Klien')

@section('content')
<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        {{-- Baris 8: Pastikan variabelnya $klien sesuai compact di Controller --}}
        <h5 class="mb-0">Edit Klien: {{ $klien->nama_klien }}</h5>
        <a href="{{ route('admin.klien.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <form action="{{ route('admin.klien.update', $klien->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Klien (Internal)</label>
            <input type="text" name="nama_klien" class="form-control" value="{{ $klien->nama_klien }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Logo Klien</label>
            <div class="mb-2">
                {{-- Menampilkan logo lama --}}
                <img src="{{ asset('storage/' . $klien->logo) }}" width="100" class="border rounded">
            </div>
            <input type="file" name="logo" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti logo.</small>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Urutan</label>
                <input type="number" name="urutan" class="form-control" value="{{ $klien->urutan }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="Aktif" {{ $klien->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Nonaktif" {{ $klien->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection