<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Statistik;

class StatistikController extends Controller
{
    public function index()
    {
        // Get the single Statistik record or create one if it doesn't exist
        $statistik = Statistik::first() ?? new Statistik();
        return view('admin.statistik.index', compact('statistik'));
    }

    public function update(Request $request)
    {
        $statistik = Statistik::first() ?? new Statistik();

        $validatedData = $request->validate([
            'klien_terlayani'   => 'nullable|string|max:255',
            'kasus_sukses'     => 'nullable|string|max:255',
            'tahun_pengalaman' => 'nullable|string|max:255',
        ]);

        $statistik->fill($validatedData);
        $statistik->save();

        return redirect()->route('admin.statistik.index')->with('success', 'Statistik berhasil diperbarui.');
    }
}
