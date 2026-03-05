<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSection;
use App\Models\ProfilPendiri;
use App\Models\Layanan;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data terbaru dari database
        $HeroSection = HeroSection::first();
        $profil = ProfilPendiri::first();
        $layanans = Layanan::where('is_active', 1)->orderBy('urutan', 'asc')->get();

        // Mengirim data ke view 'index'
        return view('index', compact('HeroSection', 'profil', 'layanans'));
    }
}