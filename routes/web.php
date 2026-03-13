<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\ProfilPendiriController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\KlienController; 
use App\Http\Controllers\Admin\BlogController; 
use App\Http\Controllers\Admin\StatistikController;
use App\Models\HeroSection;
use App\Models\Klien;
use App\Models\Blog;
use App\Models\Layanan as LayananModel;
use App\Models\ProfilPendiri;
use App\Models\Kontak;
// Landing Page Routes (Public)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route Detail Layanan Dinamis

Route::get('/layanan/{slug}', function ($slug) {
    // 1. Cari data layanan berdasarkan slug
    $layanan = App\Models\Layanan::where('slug', $slug)->firstOrFail();

    // 2. Ambil data kontak agar variabel $kontaks tersedia di view
    $kontaks = App\Models\Kontak::all(); 

    // 3. Kirim kedua variabel ke view
    return view('detail_layanan', compact('layanan', 'kontaks'));
})->name('layanan.detail');


// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes (Protected by Auth Middleware)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        $totalKlien   = Klien::count();
        $totalBlog    = Blog::count();
        $totalLayanan = LayananModel::count();

        return view('admin.dashboard', compact('totalKlien', 'totalBlog', 'totalLayanan'));
    })->name('dashboard');

    // Hero Section (Single Data - Gunakan PUT)
    Route::get('/hero', [HeroSectionController::class, 'index'])->name('hero.index');
    Route::put('/hero', [HeroSectionController::class, 'update'])->name('hero.update');

    // Profil Pendiri (Single Data - Gunakan PUT)
    Route::get('/profil', [ProfilPendiriController::class, 'index'])->name('profil.index');
    Route::put('/profil', [ProfilPendiriController::class, 'update'])->name('profil.update');

    // Kontak 
    Route::resource('kontak', KontakController::class);
    // Statistik (Single Data - Gunakan PUT)
    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.index');
    Route::put('/statistik', [StatistikController::class, 'update'])->name('statistik.update');

    // CRUD Resources (Multiple Data)
    Route::resource('layanan', LayananController::class);
    Route::resource('klien', KlienController::class);
    Route::resource('blog', BlogController::class);
});