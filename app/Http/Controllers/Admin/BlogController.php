<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        // Mengambil data berdasarkan tanggal publish terbaru
        $blogs = Blog::orderBy('tanggal_publish', 'desc')->get();
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul'           => 'required|string|max:255',
            'gambar'          => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tag_statistik'   => 'required|string|max:50',
            'url_link'        => 'required|url',
            'tanggal_publish' => 'nullable|date',
        ]);

        // Handle Upload Gambar
        if ($request->hasFile('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('blog', 'public');
        }

        // Set default values sesuai migration baru
        $validatedData['tanggal_publish'] = $request->tanggal_publish ?? now();
        $validatedData['is_active'] = true;

        Blog::create($validatedData);

        return redirect()->route('admin.blog.index')->with('success', 'Link Blog berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        $validatedData = $request->validate([
            'judul'           => 'required|string|max:255',
            'gambar'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tag_statistik'   => 'required|string|max:50',
            'url_link'        => 'required|url',
            'tanggal_publish' => 'nullable|date',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada upload baru
            if ($blog->gambar) {
                Storage::disk('public')->delete($blog->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('blog', 'public');
        }

        $blog->update($validatedData);

        return redirect()->route('admin.blog.index')->with('success', 'Link Blog berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        
        // Hapus file fisik gambar dari storage
        if ($blog->gambar) {
            Storage::disk('public')->delete($blog->gambar);
        }
        
        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Link Blog berhasil dihapus.');
    }
}