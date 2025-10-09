<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //  Menampilkan halaman login
    public function index()
    {
        return view('login-form'); // arahkan ke view login.blade.php
    }

    // Proses login
    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'string',
                'min:3',
                'regex:/[A-Z]/' // harus mengandung 1 huruf besar
            ],
        ]);

        $nim = "M2455301211"; // password dan username yang benar

        // Jika sesuai
        if ($request->username === $nim && $request->password === $nim) {
            return back()->with('success', 'Succes👋');
        } else {
            return back()->with('error', 'Username atau Password salah!');
        }
    }
}
