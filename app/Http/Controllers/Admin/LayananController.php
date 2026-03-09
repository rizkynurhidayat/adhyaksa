<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::orderBy('urutan', 'asc')->get();
        return view('admin.layanan.index', compact('layanans'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul'             => 'required|string|max:255',
            'slug'              => 'required|string|max:255|unique:layanans',
            'ikon'              => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'deskripsi_singkat' => 'required|string', // Pastikan name di HTML adalah deskripsi_singkat
            'apa_itu'           => 'nullable|string',
            'mengapa_butuh'     => 'nullable|string',
            'keuntungan_1'      => 'nullable|string',
            'keuntungan_2'      => 'nullable|string',
            'persentase_kasus'  => 'nullable|numeric|min:0|max:100',
            'is_active'         => 'nullable',
            'urutan'            => 'nullable|integer',
        ]);

        $validatedData['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('ikon')) {
            $validatedData['ikon'] = $request->file('ikon')->store('layanan', 'public');
        }

        Layanan::create($validatedData);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, string $id)
    {
        $layanan = Layanan::findOrFail($id);

        $validatedData = $request->validate([
            'judul'             => 'required|string|max:255',
            'slug'              => 'required|string|max:255|unique:layanans,slug,' . $id,
            'ikon'              => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'deskripsi_singkat' => 'required|string',
            'apa_itu'           => 'nullable|string',
            'mengapa_butuh'     => 'nullable|string',
            'keuntungan_1'      => 'nullable|string',
            'keuntungan_2'      => 'nullable|string',
            'persentase_kasus'  => 'nullable|numeric|min:0|max:100',
            'is_active'         => 'nullable',
            'urutan'            => 'nullable|integer',
        ]);

        $validatedData['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('ikon')) {
            if ($layanan->ikon) {
                Storage::disk('public')->delete($layanan->ikon);
            }
            $validatedData['ikon'] = $request->file('ikon')->store('layanan', 'public');
        }

        $layanan->update($validatedData);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function show(string $id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.detail', compact('layanan'));
    }

    public function destroy(string $id)
    {
        $layanan = Layanan::findOrFail($id);
        if ($layanan->ikon) {
            Storage::disk('public')->delete($layanan->ikon);
        }
        $layanan->delete();

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}