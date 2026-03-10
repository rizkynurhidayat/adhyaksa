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
use App\Models\ProfilPendiri;
use App\Models\Layanan;

// Landing Page Routes (Public)

Route::get('/', [HomeController::class, 'index']);

// Route Detail Layanan Dinamis
// Di routes/web.php
Route::get('/layanan/{slug}', function ($slug) {
    // Cari datanya
    $layanan = App\Models\Layanan::where('slug', $slug)->firstOrFail();

    // SEMUA layanan (bisnis, makan, kontrak) akan pakai file ini:
    return view('detail_layanan', compact('layanan'));
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

    // Statistik (Single Data - Gunakan PUT)
    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.index');
    Route::put('/statistik', [StatistikController::class, 'update'])->name('statistik.update');

    // CRUD Resources (Multiple Data)
    Route::resource('layanan', LayananController::class);
    Route::resource('klien', KlienController::class);
    Route::resource('blog', BlogController::class);
});