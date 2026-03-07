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
use App\Models\HeroSection; 
use App\Models\ProfilPendiri;
use App\Models\Layanan;

// Landing Page Routes (Public)

Route::get('/', [HomeController::class, 'index']);

    // Mengarahkan tombol "Lihat Detail" ke file desain elegan (hukumsengketa.blade.php, dll)
    Route::get('/layanan/{slug}', function ($slug) {
    // Cari data di database
    $layanan = Layanan::where('slug', $slug)->firstOrFail();
    // Mengubah slug menjadi nama file (contoh: hukum-sengketa jadi hukumsengketa)
    $viewName = str_replace('-', '', $slug);
    // Jika filenya ada di folder views, tampilkan desain elegan
    if (view()->exists($viewName)) {
        return view($viewName, compact('layanan'));
    }
    // Jika tidak ada file khusus, tampilkan detail standar admin
    return view('admin.layanan.detail', compact('layanan'));
})->name('layanan.detail');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes (Protected by Auth Middleware)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');

    // Hero Section (Single Data - Gunakan PUT)
    Route::get('/hero', [HeroSectionController::class, 'index'])->name('hero.index');
    Route::put('/hero', [HeroSectionController::class, 'update'])->name('hero.update');

    // Profil Pendiri (Single Data - Gunakan PUT)
    Route::get('/profil', [ProfilPendiriController::class, 'index'])->name('profil.index');
    Route::put('/profil', [ProfilPendiriController::class, 'update'])->name('profil.update');

    // Kontak (Single Data - Gunakan PUT)
    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::put('/kontak/{id}', [KontakController::class, 'update'])->name('kontak.update');

    // CRUD Resources (Multiple Data)
    Route::resource('layanan', LayananController::class);
    Route::resource('klien', KlienController::class);
    Route::resource('blog', BlogController::class);
});