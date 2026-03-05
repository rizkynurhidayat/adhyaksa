<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();
        return view('admin.kontak.index', compact('kontak'));
    }

    public function update(Request $request, string $id)
    {
        $kontak = Kontak::findOrFail($id);

        $validatedData = $request->validate([
            'email_1' => 'required|email|max:255',
            'email_2' => 'nullable|email|max:255',
            'wa_1' => 'required|string|max:20',
            'wa_2' => 'nullable|string|max:20',
            'alamat' => 'required|string',
            'link_google_maps' => 'required|url|max:255',
        ]);

        $kontak->update($validatedData);

        return redirect()->route('admin.kontak.index')->with('success', 'Kontak berhasil diperbarui.');
    }


}
