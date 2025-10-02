<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;

// Halaman default Laravel
Route::get('/', function () {
    return view('welcome');
});

// Route sederhana teks
Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

// Route dengan parameter
Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: ' . $param1;
});

// Route mahasiswa (dengan nama route)
Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

// Route halaman About (gunakan view)
Route::get('/about', function () {
    return view('halaman-about');
});

// Route halaman detail mahasiswa
Route::get('/mahasiswa/detail', function () {
    return view('halaman-mahasiswa-detail');
});

// Route halaman profil mahasiswa
Route::get('/mahasiswa/profil', function () {
    return view('halaman-mahasiswa-profil');
});

Route::get('/pegawai', [PegawaiController::class, 'index']);
