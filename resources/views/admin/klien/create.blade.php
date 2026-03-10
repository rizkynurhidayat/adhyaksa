@extends('admin.layouts.master')

@section('title', 'Tambah Klien Baru')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0 fw-bold text-dark">Tambah Klien Baru</h4>
        <a href="{{ route('admin.klien.index') }}" class="btn btn-light border shadow-sm btn-sm">Kembali</a>
    </div>

    <div class="card shadow border-0">
        <div class="card-body p-4">
            <form action="{{ route('admin.klien.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold">Nama Klien</label>
                        <input type="text" name="nama" class="form-control" placeholder="Misal: Pertamina" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold">Upload Logo (Image)</label>
                        <input type="file" name="logo" class="form-control" required>
                        <small class="text-muted italic small">Format: png, jpg, svg. Max: 2MB</small>
                    </div>
                </div>

                <div class="row border-top pt-4 mt-2">
                    <p class="fw-bold mb-3 text-primary">Statistik (Isi untuk menampilkan angka di landing page):</p>
                    <div class="col-md-4 mb-3">
                        <label class="form-label small fw-bold">Terlayani</label>
                        <input type="text" name="klien_terlayani" class="form-control" placeholder="Contoh: 100+">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label small fw-bold">Kasus Sukses</label>
                        <input type="text" name="kasus_sukses" class="form-control" placeholder="Contoh: 95%">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label small fw-bold">Pengalaman</label>
                        <input type="text" name="tahun_pengalaman" class="form-control" placeholder="Contoh: 12+">
                    </div>
                </div>

                <div class="mt-4 border-top pt-3 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" checked>
                        <label class="form-check-label fw-bold" for="is_active">Aktifkan Klien</label>
                    </div>
                    <button type="submit" class="btn btn-primary px-5 shadow-sm">Simpan Klien</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection