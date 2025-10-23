@extends('guest')

@section('content')

    {{-- PERHATIAN: Semua tag <div> ini akan ditempatkan di dalam <div class="container">
         yang memiliki efek glassmorphism di guest.blade.php --}}

    <div class="header-gradient">
        {{-- DITAMBAHKAN EMOJI POHON SAWIT --}}
        <h1>SISTEM TOKE SAWIT 🌴</h1>
        <p>Silakan masuk untuk mencatat transaksi harian.</p>
    </div>

    <div class="form-content">
        <h2>LOGIN PENGGUNA</h2>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            @if ($errors->any())
                <div class="error">
                    Email atau Password salah.
                </div>
            @endif

            @if (session('status'))
                <div class="error" style="color: #27ae60; background-color: #eafaf1; border-color: #27ae60;">
                    {{ session('status') }}
                </div>
            @endif

            <div class="input-group">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email atau Username" />
            </div>

            <div class="input-group">
                <input id="password" type="password" name="password" required placeholder="Password" />
            </div>

            <div class="link">
                <a href="{{ route('register') }}">Daftar Akun Baru?</a>
            </div>

            {{-- DITAMBAHKAN EMOJI TIMBANGAN --}}
            <button type="submit">Login</button>
        </form>
    </div>
@endsection
