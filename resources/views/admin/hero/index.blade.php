@extends('admin.layouts.master')

@section('title', 'Edit Hero Section')

@section('content')
<div class="card shadow border-0">
    <div class="card-header bg-white">
        <h5 class="mb-0">Edit Hero Section</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tagline Light (Putih)</label>
                    {{-- Pakai ?? '' supaya kalau $hero null tidak error --}}
                    <input type="text" name="tagline_light" class="form-control" value="{{ $hero->tagline_light ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tagline Gold (Emas)</label>
                    <input type="text" name="tagline_gold" class="form-control" value="{{ $hero->tagline_gold ?? '' }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Singkat</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ $hero->deskripsi ?? '' }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Background Utama</label>
                    <input type="file" name="bg_image" class="form-control">
                    @if(isset($hero->bg_image) && $hero->bg_image)
                        <img src="{{ asset('storage/' . $hero->bg_image) }}" class="mt-2 rounded border" width="200">
                    @endif
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Foto Lawyer (PNG/WebP)</label>
                    <input type="file" name="lawyer_image" class="form-control">
                    @if(isset($hero->lawyer_image) && $hero->lawyer_image)
                        <img src="{{ asset('storage/' . $hero->lawyer_image) }}" class="mt-2 rounded border" width="100">
                    @endif
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Teks Tombol</label>
                <input type="text" name="teks_tombol" class="form-control" value="{{ $hero->teks_tombol ?? '' }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan Hero</button>
        </form>
    </div>
</div>
@endsection