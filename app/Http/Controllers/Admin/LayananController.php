<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    //  Menampilkan daftar semua layanan.
    public function index()
    {
        // Mengambil semua data layanan, diurutkan dari yang terbaru
        $layanans = Layanan::orderBy('urutan', 'asc')->get();
        return view('admin.layanan.index', compact('layanans'));
    }

    // Menampilkan form tambah layanan.
    public function create()
    {
        return view('admin.layanan.create');
    }

    // Menyimpan layanan baru ke database.
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'judul'             => 'required|string|max:255',
            'slug'              => 'required|string|max:255|unique:layanans',
            'ikon'              => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_singkat' => 'required|string',
            'konten'            => 'required|string',
            'persentase_kasus'  => 'nullable|numeric|min:0|max:100',
            'is_active'         => 'nullable', // Checkbox biasanya mengirim null jika tidak dicentang
            'urutan'            => 'nullable|integer',
        ]);

        // 2. Logika Checkbox (is_active)
        $validatedData['is_active'] = $request->has('is_active') ? 1 : 0;

        // 3. Logika Upload Ikon
        if ($request->hasFile('ikon')) {
            // Simpan ke folder public/layanan agar bisa diakses browser
            $path = $request->file('ikon')->store('layanan', 'public');
            $validatedData['ikon'] = $path;
        }

        // 4. Simpan ke Database
        Layanan::create($validatedData);

        // 5. Redirect dengan pesan sukses
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    // Menampilkan detail layanan (Opsional).
    public function show(string $id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.show', compact('layanan'));
    }

    // Menampilkan form edit layanan.
    public function edit(string $id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.edit', compact('layanan'));
    }

    // Memperbarui data layanan di database.
    public function update(Request $request, string $id)
    {
        $layanan = Layanan::findOrFail($id);

        $validatedData = $request->validate([
            'judul'             => 'required|string|max:255',
            'slug'              => 'required|string|max:255|unique:layanans,slug,' . $layanan->id,
            'ikon'              => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_singkat' => 'required|string',
            'konten'            => 'required|string',
            'persentase_kasus'  => 'nullable|numeric|min:0|max:100',
            'is_active'         => 'nullable',
            'urutan'            => 'nullable|integer',
        ]);

        $validatedData['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('ikon')) {
            // Hapus ikon lama jika ada di storage
            if ($layanan->ikon) {
                Storage::disk('public')->delete($layanan->ikon);
            }
            // Simpan ikon baru
            $path = $request->file('ikon')->store('layanan', 'public');
            $validatedData['ikon'] = $path;
        }

        $layanan->update($validatedData);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    // Menghapus layanan dari database.
    public function destroy(string $id)
    {
        $layanan = Layanan::findOrFail($id);

        // Hapus file ikon dari storage sebelum hapus data di database
        if ($layanan->ikon) {
            Storage::disk('public')->delete($layanan->ikon);
        }

        $layanan->delete();

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}