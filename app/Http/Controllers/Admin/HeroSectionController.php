<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSection;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    // Menampilkan form edit Hero Section.
    public function index()
    {
        // Mengambil data pertama (Single Row)
        $hero = HeroSection::first();
        return view('admin.hero.index', compact('hero'));
    }

    // Memperbarui data Hero Section.
    public function update(Request $request)
{
    $hero = HeroSection::first();

    $validatedData = $request->validate([
        'tagline_light' => 'required|string|max:255',
        'tagline_gold'  => 'required|string|max:255',
        'deskripsi'     => 'required|string',
        'teks_tombol'   => 'nullable|string|max:50',
        'bg_image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120', 
        'lawyer_image'     => 'nullable|image|mimes:png,webp|max:3072',
    ]);

    // LOGIKA KRUSIAL: Mapping background_utama ke bg_image
    if ($request->hasFile('bg_image')) {
        // Hapus file lama jika ada
        if ($hero && $hero->bg_image) {
            Storage::disk('public')->delete($hero->bg_image);
        }
        // SIMPAN KE KOLOM bg_image
        $validatedData['bg_image'] = $request->file('bg_image')->store('hero', 'public');
    }

    // Proses Lawyer Image
    if ($request->hasFile('lawyer_image')) {
        if ($hero && $hero->lawyer_image) {
            Storage::disk('public')->delete($hero->lawyer_image);
        }
        $validatedData['lawyer_image'] = $request->file('lawyer_image')->store('hero', 'public');
    }

    // PENTING: Buang 'bg_image' dari array sebelum simpan ke DB
    unset($validatedData['bg_image']);

    // Simpan/Update
    HeroSection::updateOrCreate(['id' => 1], $validatedData);

    return redirect()->route('admin.hero.index')->with('success', 'Hero Section berhasil diperbarui.');
}
}