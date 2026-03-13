@extends('admin.layouts.master')

@section('title', 'Edit Link Blog')

@section('content')
<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Edit Artikel: {{ $blog->judul }}</h5>
        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="p-4 border rounded bg-white shadow-sm">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Judul Artikel</label>
                        <input type="text" name="judul" class="form-control" value="{{ $blog->judul }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Link URL Artikel</label>
                        <input type="url" name="url_link" class="form-control" value="{{ $blog->url_link }}" required>
                        <small class="text-muted">Link berita atau artikel luar yang dituju.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Gambar Thumbnail (Opsional)</label>
                        <div class="mb-2">
                            <small class="text-muted">Gambar saat ini:</small><br>
                            <img src="{{ asset('storage/' . $blog->gambar) }}" width="150" class="rounded border mt-1">
                        </div>
                        <input type="file" name="gambar" class="form-control">
                        <small class="text-muted text-danger">*Kosongkan jika tidak ingin mengganti gambar.</small>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tag Statistik</label>
                            <input type="text" name="tag_statistik" class="form-control" value="{{ $blog->tag_statistik }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tanggal Terbit</label>
                            <input type="date" name="tanggal_publish" class="form-control" 
                                   value="{{ \Carbon\Carbon::parse($blog->tanggal_publish)->format('Y-m-d') }}">
                        </div>
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-success px-5">Perbarui Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection