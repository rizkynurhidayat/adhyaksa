@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Kontak</h1>
        <a href="{{ route('admin.kontak.index') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger" style="border-radius: 8px;">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4" style="border-radius: 12px; border: none;">
        <div class="card-header py-3" style="background-color: #f8f9fc; border-bottom: 2px solid #e3e6f0;">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Kontak</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kontak.update', $kontak->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <label class="fw-bold">Jenis Kontak <span class="text-danger">*</span></label>
                        <select name="jenis" class="form-select @error('jenis') is-invalid @enderror" required id="jenisSelect">
                            <option value="">-- Pilih Jenis Kontak --</option>
                            <option value="email" {{ old('jenis', $kontak->jenis) == 'email' ? 'selected' : '' }}>Email (Gmail, Webmail, dll)</option>
                            <option value="whatsapp" {{ old('jenis', $kontak->jenis) == 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                            <option value="lokasi" {{ old('jenis', $kontak->jenis) == 'lokasi' ? 'selected' : '' }}>Alamat Lokasi (Teks)</option>
                            <option value="iframe_peta" {{ old('jenis', $kontak->jenis) == 'iframe_peta' ? 'selected' : '' }}>Embed Peta (Google Maps Iframe)</option>
                        </select>
                        <small class="text-muted d-block mt-1">Ubah tipe kontak jika diperlukan.</small>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="fw-bold">Judul Tampilan <span class="text-danger">*</span></label>
                        <input type="text" name="judul_tampilan" class="form-control" value="{{ old('judul_tampilan', $kontak->judul_tampilan) }}" required>
                        <small class="text-muted d-block mt-1">Teks yang akan dibaca oleh pengunjung website.</small>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="fw-bold">URL / Tautan / Kode Embed <span class="text-danger">*</span></label>
                        <textarea name="url_tautan" class="form-control" rows="3" required>{{ old('url_tautan', $kontak->url_tautan) }}</textarea>
                        <small class="text-muted d-block mt-1" id="urlHelper text-primary">Masukkan link yang relevan. Jika memilih Email, gunakan <code>mailto:email@anda.com</code>. Jika WA, gunakan awalan <code>62</code> tanpa tanda plus.</small>
                    </div>
                </div>

                <hr>
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary px-5">Perbarui Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
