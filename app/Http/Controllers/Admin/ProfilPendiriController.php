<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilPendiri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ProfilPendiriController extends Controller
{
    //Menampilkan form edit profil pendiri.
    public function index()
    {
        // Mengambil data pertama. Jika belum ada, kirim data kosong.
        $profil = ProfilPendiri::first();
        return view('admin.profil.index', compact('profil'));
    }

    //Memperbarui data profil pendiri.
    public function update(Request $request)
    {
        $profil = ProfilPendiri::first();

        $validatedData = $request->validate([
            'nama'             => 'required|string|max:255',
            'position'         => 'nullable|string|max:255',
            'foto'             => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi'        => 'required|string',
            'persentase_kasus' => 'required|integer|min:0|max:100',
            'tahun_pengalaman' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($profil && $profil->foto) {
                Storage::disk('public')->delete($profil->foto);
            }

            // Proses resize & crop ke 600x600 px (rasio 1:1, dari tengah)
            $file = $request->file('foto');
            $filename = 'profil_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'profil';

            // Pastikan folder tujuan ada
            Storage::disk('public')->makeDirectory($destinationPath);

            // Resize & crop menggunakan Intervention Image
            $image = Image::read($file->getRealPath());
            $image->cover(300, 300);
            $image->save(Storage::disk('public')->path($destinationPath . '/' . $filename));

            $validatedData['foto'] = $destinationPath . '/' . $filename;
        }

        // Gunakan updateOrCreate untuk ID 1 agar data tetap tunggal
        ProfilPendiri::updateOrCreate(['id' => 1], $validatedData);

        return redirect()->route('admin.profil.index')->with('success', 'Profil Pendiri berhasil diperbarui.');
    }
}