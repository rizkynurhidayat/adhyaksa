@extends('admin.layouts.master')

@section('title', 'Kelola Kontak & Lokasi')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaturan Kontak & Lokasi</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-left-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Kontak Perusahaan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kontak.update', $kontak->id ?? 0) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Email Utama</label>
                        <input type="email" name="email_1" class="form-control" 
                               value="{{ old('email_1', $kontak->email_1) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Email Cadangan (Opsional)</label>
                        <input type="email" name="email_2" class="form-control" 
                               value="{{ old('email_2', $kontak->email_2) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">WhatsApp 1 (Contoh: +62 8xx)</label>
                        <input type="text" name="wa_1" class="form-control" 
                               value="{{ old('wa_1', $kontak->wa_1) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">WhatsApp 2 (Opsional)</label>
                        <input type="text" name="wa_2" class="form-control" 
                               value="{{ old('wa_2', $kontak->wa_2) }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="fw-bold">Alamat Lengkap Kantor</label>
                        <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $kontak->alamat) }}</textarea>
                    </div>

                </div>

                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary px-5 shadow-sm">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection