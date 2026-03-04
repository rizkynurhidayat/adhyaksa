<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// =============================================
// Landing Page Routes (Public)
// =============================================
Route::get('/', function () {
    return view('index');
});
Route::get('/hukumbisnis', function () {
    return view('hukumbisnis');
});
Route::get('/hukumkontrak', function () {
    return view('hukumkontrak');
});
Route::get('/hukumsengketa', function () {
    return view('hukumsengketa');
});

// =============================================
// Authentication Routes (Tanpa Register)
// =============================================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// =============================================
// Admin Routes (Protected by Auth Middleware)
// =============================================
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});