<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilPendiri;
use Illuminate\Support\Facades\Storage;

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
            // Simpan foto baru ke folder 'profil'
            $validatedData['foto'] = $request->file('foto')->store('profil', 'public');
        }

        // Gunakan updateOrCreate untuk ID 1 agar data tetap tunggal
        ProfilPendiri::updateOrCreate(['id' => 1], $validatedData);

        return redirect()->route('admin.profil.index')->with('success', 'Profil Pendiri berhasil diperbarui.');
    }
}