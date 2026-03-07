@extends('admin.layouts.master')

@section('title', 'Tambah Link Blog')

@section('content')
<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Tambah Artikel Baru (Link Luar)</h5>
        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="p-4 border rounded bg-white shadow-sm">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Judul Artikel</label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan judul yang akan tampil di kartu" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Link URL Artikel</label>
                        <input type="url" name="url_link" class="form-control" placeholder="https://contoh.com/berita-hukum" required>
                        <small class="text-muted">Tempelkan link berita atau artikel tujuan di sini.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Gambar Thumbnail</label>
                        <input type="file" name="gambar" class="form-control" required>
                        <small class="text-muted">Pilih gambar yang mewakili isi berita.</small>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tag Statistik</label>
                            <input type="text" name="tag_statistik" class="form-control" placeholder="Misal: 97% orang terbantu" value="90% orang terbantu">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tanggal Terbit</label>
                            <input type="date" name="tanggal_publish" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary px-5">Simpan & Tayangkan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection