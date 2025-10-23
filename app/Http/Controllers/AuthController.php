<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // =====================================
    // LOGIN
    // =====================================
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // =====================================
    // REGISTER
    // =====================================
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // 🔒 Validasi input
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[^0-9]*$/', // Tidak boleh mengandung angka
            ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'alamat' => ['nullable', 'string', 'max:300'], // Opsional, maksimal 300 karakter
            'tanggal_lahir' => ['required', 'date'], // Harus berupa tanggal
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[A-Z])(?=.*\d).+$/', // Harus ada huruf kapital & angka
            ],
        ], [
            'name.regex' => 'Nama tidak boleh mengandung angka.',
            'alamat.max' => 'Alamat maksimal 300 karakter.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa format tanggal yang valid.',
            'password.regex' => 'Password harus mengandung minimal satu huruf kapital dan satu angka.',
        ]);

        // ✅ Simpan user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil!');
    }

    // =====================================
    // LOGOUT
    // =====================================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
