@extends('admin.layouts.master')

@section('title', 'Kelola Layanan')

@section('content')
<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Daftar Layanan</h5>
        <a href="{{ route('admin.layanan.create') }}" class="btn btn-primary" style="text-decoration: none;">
            <i class="fas fa-plus"></i> + Tambah Layanan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th width="80">Ikon</th>
                    <th>Judul Layanan</th>
                    <th>Status</th>
                    <th>Persentase</th> <th width="100">Urutan</th>
                    <th width="250" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($layanans as $layanan)
                <tr>
                    <td>
                        @if($layanan->ikon)
                            <img src="{{ asset('storage/' . $layanan->ikon) }}" width="45" height="45" class="rounded shadow-sm" style="object-fit: cover;">
                        @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                <small class="text-muted">No Img</small>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="fw-bold">{{ $layanan->judul }}</div>
                        <small class="text-muted">{{ Str::limit($layanan->deskripsi_singkat, 50) }}</small>
                    </td>
                    <td>
                        <span class="badge {{ $layanan->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $layanan->is_active ? 'Aktif' : 'Non-aktif' }}
                        </span>
                    </td>
                    <td>
                        <span class="badge bg-info text-dark">
                            {{ $layanan->persentase_kasus ?? '0%' }}
                        </span>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark border">{{ $layanan->urutan }}</span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">

                            <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan {{ $layanan->judul }}?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">
                        Belum ada data layanan. Klik tombol <strong>+ Tambah Layanan</strong> untuk memulai.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection