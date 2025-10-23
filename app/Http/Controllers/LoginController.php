<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan formulir login.
     * TANGGUNG JAWAB: VIEW
     */
    public function showLoginForm()
    {
        // resources/views/auth/login.blade.php
        return view('auth.login');
    }

    /**
     * Menangani percobaan login dan validasi.
     * TANGGUNG JAWAB: LOGIC & VALIDATION
     */
    public function login(Request $request)
    {
        // 1. Validasi Input
        $credentials = $request->validate([
            'nama_user' => 'required|string', // Menggunakan 'nama_user'
            'password' => 'required|string|min:4', // Aturan validasi
        ], [
            // Custom Error Messages
            'nama_user.required' => 'Nama User wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal :min karakter.',
        ]);

        // Catatan: Laravel Auth default menggunakan 'email' dan 'password'.
        // Karena Anda ingin menggunakan 'nama_user' dan 'password', kita perlu sedikit modifikasi
        // pada Auth::attempt jika Anda menggunakan scaffolding default.
        // Untuk contoh sederhana ini, kita akan lakukan otentikasi kustom (simulasi)
        // atau anggap 'nama_user' sebagai field yang digunakan.

        // Simulasikan Otentikasi (Gantilah dengan logika Auth::attempt yang sesungguhnya)
        $user_data = [
            'name' => $credentials['nama_user'], // Asumsi field di DB adalah 'name'
            'password' => $credentials['password']
        ];

        // Contoh: Jika user berhasil masuk
        if ($credentials['nama_user'] === 'Musthofa' && $credentials['password'] === 'sawit123') {
            // Jika berhasil (Dalam aplikasi nyata, gunakan Auth::login atau Auth::attempt)
            // Auth::attempt(['name' => $credentials['nama_user'], 'password' => $credentials['password']]))

            // Lanjutkan ke Dashboard
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');

        } else {
            // Jika gagal
            return back()->withErrors([
                'nama_user' => 'Nama User atau Password salah.',
            ])->onlyInput('nama_user');
        }
    }

    // Anda juga bisa menambahkan method logout jika diperlukan
}
