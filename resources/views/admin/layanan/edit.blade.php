@extends('admin.layouts.master')

@section('title', 'Edit Layanan')

@section('content')
<div class="admin-card">
    <h5>Edit Layanan: {{ $layanan->judul }}</h5>
    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        {{-- Gunakan struktur input yang sama dengan create, tapi tambahkan value="{{ $layanan->field }}" --}}
        <div class="mb-3">
            <label class="form-label">Judul Layanan</label>
            <input type="text" name="judul" class="form-control" value="{{ $layanan->judul }}" required>
        </div>

        @if($layanan->ikon)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $layanan->ikon) }}" width="80" class="rounded border">
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label">Ganti Ikon (Opsional)</label>
            <input type="file" name="ikon" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi Singkat</label>
            <textarea name="deskripsi_singkat" class="form-control" rows="3">{{ $layanan->deskripsi_singkat }}</textarea>
        </div>

        <button type="submit" class="btn-main">Update Layanan</button>
    </form>
</div>
@endsection