@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengaturan Kontak Per Aplikasi</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kontak.update', $kontak->id ?? 0) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="border p-3 rounded shadow-sm bg-light">
                            <label class="fw-bold text-primary"><i class="fas fa-envelope"></i> GMAIL</label>
                            <div class="mb-2">
                                <label class="small">Nama Akun (Judul)</label>
                                <input type="text" name="email_1_judul" class="form-control" value="{{ old('email_1_judul', $kontak->email_1_judul) }}" placeholder="Contoh: adminnya@gmail.com">
                            </div>
                            <div>
                                <label class="small">Link URL Gmail</label>
                                <input type="text" name="email_1_link" class="form-control" value="{{ old('email_1_link', $kontak->email_1_link) }}" placeholder="https://mail.google.com/mail/?view=cm&fs=1&to=...">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="border p-3 rounded shadow-sm bg-light">
                            <label class="fw-bold text-success"><i class="fab fa-whatsapp"></i> WHATSAPP</label>
                            <div class="mb-2">
                                <label class="small">Judul Tampilan</label>
                                <input type="text" name="wa_1_judul" class="form-control" value="{{ old('wa_1_judul', $kontak->wa_1_judul) }}" placeholder="Contoh: Chat Admin">
                            </div>
                            <div>
                                <label class="small">Link URL WhatsApp</label>
                                <input type="text" name="wa_1_link" class="form-control" value="{{ old('wa_1_link', $kontak->wa_1_link) }}" placeholder="https://wa.me/628xxx">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="border p-3 rounded shadow-sm bg-light">
                            <label class="fw-bold text-danger"><i class="fas fa-map-marker-alt"></i> GOOGLE MAPS</label>
                            <div class="mb-2">
                                <label class="small">Nama Alamat (Judul)</label>
                                <textarea name="alamat_judul" class="form-control" rows="2" placeholder="Masukkan alamat lengkap">{{ old('alamat_judul', $kontak->alamat_judul) }}</textarea>
                            </div>
                            <div>
                                <label class="small">Link URL Google Maps</label>
                                <input type="text" name="link_google_maps" class="form-control" value="{{ old('link_google_maps', $kontak->link_google_maps) }}" placeholder="https://goo.gl/maps/...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right mt-4">
                    <button type="submit" class="btn btn-primary px-5">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection