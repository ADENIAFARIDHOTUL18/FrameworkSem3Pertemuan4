<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
// Hapus atau abaikan use Mahasiswa/Pegawai/Home Controller jika sudah tidak dipakai

// ---------------------------------------------
// --- CORE AUTHENTICATION (TOKE SAWIT) ---
// ---------------------------------------------

Route::get('/', function () {
    return redirect()->route('login');
});

// LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// REGISTER
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// -------------------------------------------------------------------
// --- PROTECTED ROUTES (SISTEM SAWIT MUSTHOFA) ---
// -------------------------------------------------------------------

Route::middleware(['auth'])->group(function () {
    // DASHBOARD UTAMA TOKE SAWIT
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// ---------------------------------------------
// --- RUTE LAMA/TRAINING (Pertahankan jika dibutuhkan) ---
// ---------------------------------------------
Route::get('/welcome', function () {
    return view('welcome');
});
// ... (Sisa rute training Anda di sini)
