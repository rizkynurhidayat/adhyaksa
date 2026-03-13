<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::all();
        return view('admin.kontak.index', compact('kontaks'));
    }

    public function create()
    {
        return view('admin.kontak.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis'          => 'required|string|in:email,whatsapp,lokasi,iframe_peta',
            'judul_tampilan' => 'required|string|max:255',
            'url_tautan'     => 'required|string',
        ]);

        Kontak::create($validatedData);

        return redirect()->route('admin.kontak.index')->with('success', 'Kontak berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('admin.kontak.edit', compact('kontak'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'jenis'          => 'required|string|in:email,whatsapp,lokasi,iframe_peta',
            'judul_tampilan' => 'required|string|max:255',
            'url_tautan'     => 'required|string',
        ]);

        $kontak = Kontak::findOrFail($id);
        $kontak->update($validatedData);

        return redirect()->route('admin.kontak.index')->with('success', 'Kontak berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        return redirect()->route('admin.kontak.index')->with('success', 'Kontak berhasil dihapus.');
    }
}