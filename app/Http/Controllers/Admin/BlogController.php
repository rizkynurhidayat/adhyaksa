<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest('tanggal_publish')->get();
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
            'ringkasan'       => 'required|string|max:500',
            'konten'          => 'required|string',
            'tag_statistik'   => 'nullable|string|max:50',
            'is_published'    => 'nullable',
            'tanggal_publish' => 'nullable|date',
        ]);

        // 1. Generate Slug Otomatis
        $validatedData['slug'] = Str::slug($request->judul);

        // 2. Handle Upload Gambar
        if ($request->hasFile('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('blog', 'public');
        }

        // 3. Handle Boolean & Date
        $validatedData['is_published'] = $request->has('is_published') ? 1 : 0;
        $validatedData['tanggal_publish'] = $request->tanggal_publish ?? now();

        Blog::create($validatedData);

        return redirect()->route('admin.blog.index')->with('success', 'Artikel berhasil dibuat.');
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
            'ringkasan'       => 'required|string|max:500',
            'konten'          => 'required|string',
            'tag_statistik'   => 'nullable|string|max:50',
            'is_published'    => 'nullable',
            'tanggal_publish' => 'nullable|date',
        ]);

        // Update Slug jika judul berubah
        $validatedData['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            if ($blog->gambar) {
                Storage::disk('public')->delete($blog->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('blog', 'public');
        }

        $validatedData['is_published'] = $request->has('is_published') ? 1 : 0;
        $validatedData['tanggal_publish'] = $request->tanggal_publish ?? $blog->tanggal_publish;

        $blog->update($validatedData);

        return redirect()->route('admin.blog.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->gambar) {
            Storage::disk('public')->delete($blog->gambar);
        }
        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Artikel berhasil dihapus.');
    }
}