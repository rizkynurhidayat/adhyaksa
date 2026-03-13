@extends('admin.layouts.master')

@section('title', 'Edit Profil Pendiri')

@section('content')
<div class="card shadow border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Profil Pendiri</h5>
    </div>
    <div class="card-body">

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="{{ $profil->nama ?? '' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jabatan / Posisi</label>
                    <input type="text" name="position" class="form-control" value="{{ $profil->position ?? '' }}" placeholder="Contoh: Managing Partner">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" required>{{ $profil->deskripsi ?? '' }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Tahun Pengalaman</label>
                    <input type="number" name="tahun_pengalaman" class="form-control" value="{{ $profil->tahun_pengalaman ?? 12 }}" min="0" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Kasus Berhasil</label>
                    <input type="number" name="kasus_sukses" class="form-control" value="{{ $profil->kasus_sukses ?? 95 }}" min="0" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Pendiri</label>
                <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png,image/jpg">
                @if(isset($profil->foto) && $profil->foto)
                    <div class="mt-2">
                        <p class="text-muted mb-1">Foto saat ini:</p>
                        <img src="{{ asset('storage/' . $profil->foto) }}" class="rounded border" width="150" alt="Foto Pendiri">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection
