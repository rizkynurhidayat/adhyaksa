<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
{
    public function index()
    {
        // PERBAIKAN: Jika data null, buat objek baru agar Blade tidak error (Trying to access property on null)
        $kontak = Kontak::first() ?? new Kontak();
        return view('admin.kontak.index', compact('kontak'));
    }

    public function update(Request $request, string $id)
    {
        // VALIDASI DATA
        $validatedData = $request->validate([
            'email_1'          => 'required|email|max:255',
            'email_2'          => 'nullable|email|max:255',
            'wa_1'             => 'required|string|max:50',
            'wa_2'             => 'nullable|string|max:50',
            'alamat'           => 'required|string',
            'link_google_maps' => 'required|string', 
        ]);

        // Cari data berdasarkan ID, jika tidak ada (setelah migrate:fresh), maka buat baru
        $kontak = Kontak::find($id);

        if ($kontak) {
            $kontak->update($validatedData);
        } else {
            Kontak::create($validatedData);
        }

        return redirect()->route('admin.kontak.index')->with('success', 'Kontak berhasil diperbarui.');
    }
}