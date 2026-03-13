@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Kontak (Hubungi Kami)</h1>
        <a href="{{ route('admin.kontak.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="border-radius: 8px; padding: 10px 20px;">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kontak Baru
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" style="border-radius: 8px;" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4" style="border-radius: 12px; border: none;">
        <div class="card-header py-3" style="background-color: #f8f9fc; border-bottom: 2px solid #e3e6f0; border-radius: 12px 12px 0 0;">
            <h6 class="m-0 font-weight-bold text-primary">Data Kontak Tersimpan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="border-radius: 8px; overflow: hidden;">
                    <thead style="background-color: #4e73df; color: white;">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Jenis Kontak</th>
                            <th>Judul Tampilan</th>
                            <th>URL / Tautan</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kontaks as $index => $k)
                            <tr>
                                <td class="text-center align-middle">{{ $index + 1 }}</td>
                                <td class="align-middle">
                                    @if($k->jenis == 'email')
                                        <span class="badge bg-primary px-3 py-2"><i class="fas fa-envelope me-1"></i> Email</span>
                                    @elseif($k->jenis == 'whatsapp')
                                        <span class="badge bg-success px-3 py-2"><i class="fab fa-whatsapp me-1"></i> WhatsApp</span>
                                    @elseif($k->jenis == 'lokasi')
                                        <span class="badge bg-danger px-3 py-2"><i class="fas fa-map-marker-alt me-1"></i> Lokasi (Teks)</span>
                                    @elseif($k->jenis == 'iframe_peta')
                                        <span class="badge bg-secondary px-3 py-2"><i class="fas fa-map me-1"></i> Embed Peta</span>
                                    @endif
                                </td>
                                <td class="align-middle fw-bold">{{ Str::limit($k->judul_tampilan, 40) }}</td>
                                <td class="align-middle text-muted small">
                                    <a href="{{ $k->url_tautan }}" target="_blank" class="text-truncate d-inline-block" style="max-width: 250px;">{{ $k->url_tautan }}</a>
                                </td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.kontak.edit', $k->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.kontak.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kontak ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <i class="fas fa-inbox fa-3x mb-3"></i><br>
                                    Belum ada data kontak. Silahkan tambah baru.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection