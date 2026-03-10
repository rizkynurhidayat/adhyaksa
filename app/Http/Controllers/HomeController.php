<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSection;
use App\Models\ProfilPendiri;
use App\Models\Layanan;
use App\Models\Klien;
use App\Models\Kontak;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data terbaru dari database
        $HeroSection = HeroSection::first();
        $profil = ProfilPendiri::first();
        $layanans = Layanan::where('is_active', 1)->orderBy('urutan', 'asc')->get();
        $klients = Klien::where('is_active', 1)->orderBy('urutan', 'asc')->get();
        $clients = Klien::where('is_active', 1)->orderBy('urutan', 'asc')->get();
        // Ambil statistik dari tabel Statistik terpisah
        $statistik = \App\Models\Statistik::first();
        $clientCount = $statistik->klien_terlayani ?? '100+'; 
        $successRate = $statistik->kasus_sukses ?? '95%'; 
        $experienceYears = $statistik->tahun_pengalaman ?? '12+'; 
        $blogs = Blog::latest()->take(3)->get();
        $kontak = Kontak::first(); new Kontak(); // PERBAIKAN: Jika data null, buat objek baru agar Blade tidak error (Trying to access property on null)
        return view('index', compact('HeroSection', 'profil', 'layanans', 'clients', 'clientCount', 'successRate', 'experienceYears', 'blogs', 'kontak'));
    }
}