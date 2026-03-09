<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Statistik;

class StatistikController extends Controller
{
    public function index()
    {
        // Get the first record or create a new instance with default values
        $statistik = Statistik::first() ?? new Statistik([
            'klien_terlayani' => '100+',
            'kasus_sukses' => '95%',
            'tahun_pengalaman' => '12+',
        ]);
        
        return view('admin.statistik.index', compact('statistik'));
    }

    public function update(Request $request)
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

        return redirect()->route('admin.statistik.index')->with('success', 'Statistik berhasil diperbarui.');
    }
}
