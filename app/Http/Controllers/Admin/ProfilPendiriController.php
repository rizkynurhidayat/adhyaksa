<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilPendiri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfilPendiriController extends Controller
{
    // Menampilkan form edit profil pendiri.
    public function index()
    {
        $profil = ProfilPendiri::first();
        return view('admin.profil.index', compact('profil'));
    }

    // Memperbarui data profil pendiri.
    public function update(Request $request)
    {
        $profil = ProfilPendiri::first();

        $validatedData = $request->validate([
            'nama'             => 'required|string|max:255',
            'position'         => 'nullable|string|max:255',
            'foto'             => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi'        => 'required|string',
            'tahun_pengalaman' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($profil && $profil->foto) {
                Storage::disk('public')->delete($profil->foto);
            }

            // Menggunakan cara standar Laravel agar tidak error Class Not Found
            $file = $request->file('foto');
            $filename = 'profil_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            // Simpan file ke folder public/storage/profil
            $path = $file->storeAs('profil', $filename, 'public');

            $validatedData['foto'] = $path;
        }

        // Gunakan updateOrCreate untuk ID 1 agar data di database tidak kosong lagi
        ProfilPendiri::updateOrCreate(['id' => 1], $validatedData);

        return redirect()->route('admin.profil.index')->with('success', 'Profil Pendiri berhasil diperbarui.');
    }
}