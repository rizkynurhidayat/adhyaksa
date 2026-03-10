<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Klien;
use App\Models\Statistik;
use Illuminate\Support\Facades\Storage;

class KlienController extends Controller
{
    public function index()
    {
        // Urutkan berdasarkan kolom 'urutan' agar tampilan di user bisa diatur
        $kliens = Klien::orderBy('urutan', 'asc')->get();
        
        // Get the first record or create a new instance with default values
        $statistik = Statistik::first() ?? new Statistik([
            'klien_terlayani' => '100+',
            'kasus_sukses' => '95%',
            'tahun_pengalaman' => '12+',
        ]);
        
        return view('admin.klien.index', compact('kliens', 'statistik'));
    }

    public function create()
    {
        return view('admin.klien.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'              => 'required|string|max:255',
            'logo'              => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website'           => 'nullable|url',
            'button_pengalaman' => 'nullable|string',
            'button_sukses'     => 'nullable|string',
            'button_terlayani'  => 'nullable|string',
            'is_active'         => 'boolean',
            'urutan'            => 'nullable|integer',
        ]);

        // Handle Checkbox is_active
        $validatedData['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('klien', 'public');
        }

        Klien::create($validatedData);

        return redirect()->route('admin.klien.index')->with('success', 'Klien berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $klien = Klien::findOrFail($id);
        return view('admin.klien.edit', compact('klien'));
    }

    public function update(Request $request, string $id)
    {
        $klien = Klien::findOrFail($id);

        $validatedData = $request->validate([
            'nama'              => 'required|string|max:255',
            'logo'              => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website'           => 'nullable|url',
            'button_pengalaman' => 'nullable|string',
            'button_sukses'     => 'nullable|string',
            'button_terlayani'  => 'nullable|string',
            'is_active'         => 'boolean',
            'urutan'            => 'nullable|integer',
        ]);

        $validatedData['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            if ($klien->logo) {
                Storage::disk('public')->delete($klien->logo);
            }
            $validatedData['logo'] = $request->file('logo')->store('klien', 'public');
        }

        $klien->update($validatedData);

        return redirect()->route('admin.klien.index')->with('success', 'Data klien diperbarui.');
    }

    public function destroy(string $id)
    {
        $klien = Klien::findOrFail($id);
        if ($klien->logo) {
            Storage::disk('public')->delete($klien->logo);
        }
        $klien->delete();

        return redirect()->route('admin.klien.index')->with('success', 'Klien dihapus.');
    }

    public function updateStatistik(Request $request)
    {
        $validatedData = $request->validate([
            'klien_terlayani' => 'required|string|max:255',
            'kasus_sukses' => 'required|string|max:255',
            'tahun_pengalaman' => 'required|string|max:255',
        ]);

        $statistik = Statistik::first();
        if ($statistik) {
            $statistik->update($validatedData);
        } else {
            Statistik::create($validatedData);
        }

        return redirect()->route('admin.klien.index')->with('success', 'Statistik berhasil diperbarui.');
    }
}