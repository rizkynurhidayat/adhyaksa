@extends('admin.layouts.master')

@section('title', 'Edit Klien')

@section('content')
<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Edit Klien: {{ $klien->nama }}</h5>
        <a href="{{ route('admin.klien.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <form action="{{ route('admin.klien.update', $klien->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Klien (Internal)</label>
            <input type="text" name="nama" class="form-control" value="{{ $klien->nama }}" required>
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

            <div class="col-md-6 mb-3">
                <label class="form-label">Urutan</label>
                <input type="number" name="urutan" class="form-control" value="{{ $klien->urutan }}">
            </div>
            <div class="col-md-6 mb-3 d-flex align-items-end">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ $klien->is_active ? 'checked' : '' }}>
                    <label class="form-check-label fw-bold" for="is_active">Aktifkan Klien</label>
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection