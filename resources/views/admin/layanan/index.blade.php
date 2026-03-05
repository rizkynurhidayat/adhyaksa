@extends('admin.layouts.master')

@section('title', 'Kelola Layanan')

@section('content')
<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Daftar Layanan</h5>
        <a href="{{ route('admin.layanan.create') }}" class="btn-main" style="text-decoration: none; padding: 10px 20px;">+ Tambah Layanan</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Ikon</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($layanans as $layanan)
                <tr>
                    <td>
                        @if($layanan->ikon)
                            <img src="{{ asset('storage/' . $layanan->ikon) }}" width="40" height="40" style="object-fit: cover;">
                        @else
                            -
                        @endif
                    </td>
                    <td><strong>{{ $layanan->judul }}</strong></td>
                    <td>
                        <span class="badge {{ $layanan->is_active ? 'bg-success' : 'bg-secondary' }}">
                            {{ $layanan->is_active ? 'Aktif' : 'Non-aktif' }}
                        </span>
                    </td>
                    <td>{{ $layanan->urutan }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST" onsubmit="return confirm('Hapus layanan ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection