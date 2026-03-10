@extends('admin.layouts.master')

@section('title', 'Kelola Klien & Statistik')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0 fw-bold text-dark">Daftar Klien & Statistik</h4>
        {{-- Tombol diarahkan ke route create (halaman baru) --}}
        <a href="{{ route('admin.klien.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-lg"></i> Tambah Logo Klien
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">{{ session('success') }}</div>
    @endif

    {{-- Tabel Daftar Klien --}}
    <div class="card shadow border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">Daftar Logo Klien</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Logo</th>
                            <th>Nama Klien (Internal)</th>
                            <th>Urutan</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kliens as $k)
                        <tr>
                            <td class="ps-4">
                                <img src="{{ asset('storage/' . $k->logo) }}" width="60" class="rounded border shadow-sm p-1">
                            </td>
                            <td class="fw-bold text-secondary">{{ $k->nama }}</td>
                            <td>{{ $k->urutan ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $k->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $k->is_active ? 'Aktif' : 'Non-Aktif' }}
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group">
                                    <a href="{{ route('admin.klien.edit', $k->id) }}" class="btn btn-sm btn-outline-primary shadow-sm">Edit</a>
                                    <form action="{{ route('admin.klien.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus klien ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger shadow-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Belum ada data klien.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    {{-- Form Statistik Klien --}}
    <div class="card shadow border-0 mt-4">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">Statistik Klien</h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.klien.statistik.update') }}" method="POST">
                @csrf
                @method('PUT')
                
                <p class="text-muted mb-4">Angka-angka ini akan ditampilkan di bagian bawah Daftar Klien pada Halaman Utama.</p>

                <div class="row">
                    <div class="col-md-4 mb-4">
                        <label class="form-label fw-bold">Klien Terlayani</label>
                        <input type="text" name="klien_terlayani" class="form-control" value="{{ old('klien_terlayani', $statistik->klien_terlayani) }}" placeholder="Contoh: 100+" required>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <label class="form-label fw-bold">Kasus Sukses</label>
                        <input type="text" name="kasus_sukses" class="form-control" value="{{ old('kasus_sukses', $statistik->kasus_sukses) }}" placeholder="Contoh: 95%" required>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <label class="form-label fw-bold">Tahun Pengalaman</label>
                        <input type="text" name="tahun_pengalaman" class="form-control" value="{{ old('tahun_pengalaman', $statistik->tahun_pengalaman) }}" placeholder="Contoh: 12+" required>
                    </div>
                </div>

                <div class="mt-4 border-top pt-3 text-end">
                    <button type="submit" class="btn btn-primary px-5 shadow-sm">Simpan Statistik</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection