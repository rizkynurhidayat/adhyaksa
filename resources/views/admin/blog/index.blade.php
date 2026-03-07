@extends('admin.layouts.master')

@section('title', 'Kelola Blog')

@section('content')
<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Daftar Link Blog</h5>
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Tambah Link Baru</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th width="120px">Gambar</th>
                    <th>Judul & Tanggal</th>
                    <th>Link Tujuan</th>
                    <th>Statistik</th>
                    <th width="150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $blog->gambar) }}" width="100" class="rounded shadow-sm">
                    </td>
                    <td>
                        <div class="fw-bold">{{ $blog->judul }}</div>
                        <small class="text-muted">
                            <i class="far fa-calendar-alt"></i> 
                            {{ \Carbon\Carbon::parse($blog->tanggal_publish)->format('d M Y') }}
                        </small>
                    </td>
                    <td>
                        <a href="{{ $blog->url_link }}" target="_blank" class="text-truncate d-inline-block" style="max-width: 200px;">
                            {{ $blog->url_link }}
                        </a>
                    </td>
                    <td>
                        <span class="badge bg-dark">{{ $blog->tag_statistik }}</span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">Belum ada data blog.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection