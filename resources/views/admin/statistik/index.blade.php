@extends('admin.layouts.master')

@section('title', 'Kelola Statistik')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0 fw-bold text-dark">Kelola Statistik (Global)</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">{{ session('success') }}</div>
    @endif

    <div class="card shadow border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">Data Statistik Adhyaksa</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.statistik.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <label for="klien_terlayani" class="form-label fw-semibold">Klien Terlayani</label>
                        <input type="text" class="form-control" id="klien_terlayani" name="klien_terlayani" 
                               value="{{ old('klien_terlayani', $statistik->klien_terlayani) }}" placeholder="Contoh: 100+">
                        @error('klien_terlayani') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="kasus_sukses" class="form-label fw-semibold">Kasus Sukses</label>
                        <input type="text" class="form-control" id="kasus_sukses" name="kasus_sukses" 
                               value="{{ old('kasus_sukses', $statistik->kasus_sukses) }}" placeholder="Contoh: 95%">
                        @error('kasus_sukses') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="tahun_pengalaman" class="form-label fw-semibold">Tahun Pengalaman</label>
                        <input type="text" class="form-control" id="tahun_pengalaman" name="tahun_pengalaman" 
                               value="{{ old('tahun_pengalaman', $statistik->tahun_pengalaman) }}" placeholder="Contoh: 12+">
                        @error('tahun_pengalaman') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">Simpan Statistik</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
