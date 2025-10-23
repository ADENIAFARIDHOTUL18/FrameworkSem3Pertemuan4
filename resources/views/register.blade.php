@extends('guest')

@section('content')
    <div class="header-gradient">
        FORM PENDAFTARAN MANAJEMEN TOKE MUSTHOFA 🌴
    </div>

    <div class="form-content">
        <h2>DAFTAR AKUN BARU</h2>

        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            @if ($errors->any())
                <div class="error" style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FIELD NAMA --}}
            <div class="input-group">
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="👤 Nama Lengkap" />
            </div>

            {{-- FIELD EMAIL --}}
            <div class="input-group">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="📧 Email" />
            </div>

            {{-- FIELD BARU: NOMOR TELEPON --}}
            <div class="input-group">
                <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required placeholder="📞 Nomor Telepon/WA" />
            </div>

            {{-- FIELD BARU: TANGGAL LAHIR --}}
      
            <div class="input-group">
                <label for="date_of_birth" style="font-size: 0.8em; color: #555; margin-bottom: 5px; display: block; text-align: left;">Tanggal Lahir:</label>
                <input type="date" type="date" name="tanggal_lahir" value="{{ old('date_of_birth') }}" required
                       style="width: 100%; box-sizing: border-box;"
                       />
            </div>

            {{-- FIELD BARU: ALAMAT --}}
            <div class="input-group">
                <textarea
                    id="address"
                    name="address"
                    required
                    placeholder="🏠 Alamat Lengkap" {{-- 🏠 sudah sesuai --}}
                    rows="3"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; resize: vertical;"
                >{{ old('address') }}</textarea>
            </div>

            {{-- FIELD PASSWORD --}}
            <div class="input-group">
                <input id="password" type="password" name="password" required placeholder="🔒 Password" />
            </div>

            {{-- FIELD KONFIRMASI PASSWORD --}}
            <div class="input-group">
                <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="🔑 Konfirmasi Password" />
            </div>

            <div class="link" style="text-align: center;">
                <p style="font-size: 0.85em; color: #777;">Sudah punya akun? <a href="{{ route('login') }}" style="font-weight: bold;">Login di sini</a>.</p>
            </div>

            <button type="submit">Daftar</button>
        </form>
    </div>
@endsection
