<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSection;
use Illuminate\Support\Facades\Storage;


class HeroSectionController extends Controller
{
    //Menampilkan form edit Hero Section.
    public function index()
    {
        // Mengambil data pertama (Single Row)
        $hero = HeroSection::first();
        return view('admin.hero.index', compact('hero'));
    }

    //Memperbarui data Hero Section.
    public function update(Request $request)
    {
        $hero = HeroSection::first();

        $validatedData = $request->validate([
            'tagline_light' => 'required|string|max:255',
            'tagline_gold'  => 'required|string|max:255',
            'deskripsi'     => 'required|string',
            'teks_tombol'   => 'nullable|string|max:50',
            'bg_image'      => 'nullable|image|mimes:jpeg,png,jpg|max:5120', // Background biasanya besar
            'lawyer_image'  => 'nullable|image|mimes:png,webp|max:3072',    // Image lawyer biasanya transparan (PNG/WebP)
        ]);

        // 1. Logika Update Background Image
        if ($request->hasFile('bg_image')) {
            if ($hero && $hero->bg_image) {
                Storage::disk('public')->delete($hero->bg_image);
            }
            $validatedData['bg_image'] = $request->file('bg_image')->store('hero', 'public');
        }

        // 2. Logika Update Lawyer Image (Foto pengacara)
        if ($request->hasFile('lawyer_image')) {
            if ($hero && $hero->lawyer_image) {
                Storage::disk('public')->delete($hero->lawyer_image);
            }
            $validatedData['lawyer_image'] = $request->file('lawyer_image')->store('hero', 'public');
        }

        // Simpan data (Update atau Create jika belum ada)
        HeroSection::updateOrCreate(['id' => 1], $validatedData);

        return redirect()->route('admin.hero.index')->with('success', 'Hero Section berhasil diperbarui.');
    }
}