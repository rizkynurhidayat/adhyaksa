<?php

use Illuminate\Support\Facades\Route;

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