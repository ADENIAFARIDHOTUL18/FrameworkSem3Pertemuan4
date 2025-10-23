<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Petani Musthofa</title>
    <style>
        /* FONT */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            color: #333;
        }
        .main-layout {
            display: flex;
            min-height: 100vh;
        }

        /* =========================================================================
           1. SIDEBAR - GRADASI HIJAU GLASSMORPHISM
           ========================================================================= */
        .sidebar {
            width: 250px;
            /* Gradasi Hijau Netral, lebih dalam dan kalem */
            background: linear-gradient(to bottom, rgba(30, 70, 58, 0.95), rgba(55, 95, 81, 0.9));
            /* Menambahkan efek blur */
            backdrop-filter: blur(10px); 
            -webkit-backdrop-filter: blur(10px);
            
            color: white;
            padding: 20px 0;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.4);
            position: fixed;
            height: 100%;
            z-index: 10;
        }
        .sidebar-header {
            padding: 0 20px 30px 20px;
            font-size: 26px;
            font-weight: 900;
            color: #DCE775; /* Warna Kuning-Hijau Cerah untuk Header */
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            margin-bottom: 15px;
            letter-spacing: 1px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }
        .sidebar-nav a {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            color: #d0d0d0;
            border-left: 4px solid transparent;
            font-size: 15px;
            transition: background-color 0.2s, border-left-color 0.2s, color 0.2s;
        }
        .sidebar-nav a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        .sidebar-nav a.active {
            background-color: rgba(255, 255, 255, 0.2);
            border-left-color: #DCE775; /* Border aktif menggunakan warna cerah */
            color: white;
            font-weight: 700;
        }

        /* =========================================================================
           2. CONTENT WRAPPER - LATAR BELAKANG DENGAN EFEK BLUR
           ========================================================================= */
        .content-wrapper {
            margin-left: 250px;
            flex-grow: 1;
            /* Latar belakang gambar sawit */
            background-image: url('{{ asset("images/sawit.png") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
        }

        /* --- OVERLAY HIJAU BLUR DENGAN GRADASI --- */
        .content-wrapper::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            /* Gradasi Hijau/Putih Transparan */
            background: linear-gradient(135deg, rgba(237, 247, 230, 0.95) 0%, rgba(220, 237, 200, 0.90) 100%);
            /* Efek buram pada latar depan */
            backdrop-filter: blur(1px); 
            -webkit-backdrop-filter: blur(1px);
            z-index: 1;
        }
        /* --- AKHIR KODE EFEK BLUR --- */


        .top-navbar, .content-area {
            position: relative;
            z-index: 2; /* Memastikan konten di atas overlay */
        }

        /* =========================================================================
           3. TOP NAVBAR - GLASSMORPHISM RINGAN
           ========================================================================= */
        .top-navbar {
            /* Latar belakang putih semi-transparan dengan blur ringan */
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            
            padding: 15px 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            color: #388E3C; /* Teks berwarna hijau tua */
            font-weight: 700;
            font-size: 16px;
            letter-spacing: 0.5px;
        }
        
        .content-area {
            padding: 30px;
        }
        
        /* SECTION TITLE DALAM SIDEBAR */
        .section-title {
            background-color: rgba(0, 0, 0, 0.1);
            color: #f0f0f0;
            padding: 8px 20px;
            margin-top: 20px;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 13px;
            letter-spacing: 0.5px;
        }
        
        /* LOGOUT BUTTON */
        .logout-form button {
            background: none;
            border: none;
            color: #ffcc80; /* Warna Orange lembut untuk logout */
            width: 100%;
            text-align: left;
            padding: 12px 20px;
            cursor: pointer;
            border-left: 4px solid transparent;
            font-size: 15px;
            font-weight: 500;
            transition: background-color 0.2s, color 0.2s, border-left-color 0.2s;
        }
        .logout-form button:hover {
            background-color: rgba(255, 160, 0, 0.2);
            border-left-color: #ffb74d;
            color: white;
            font-weight: 600;
        }

        /* Media Query untuk Responsif */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .content-wrapper {
                margin-left: 0;
            }
            .main-layout {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="main-layout">
        <div class="sidebar">
            <div class="sidebar-header">
                PETANI🧑‍🌾
            </div>
            <nav class="sidebar-nav">

                {{-- MENU UTAMA --}}
                <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="#">
                    Riwayat Hutang
                </a>

                <a href="#">
                    Data Klien / Petani
                </a>
                <a href="#">
                    Data Jual Beli
                </a>

                {{-- BAGIAN LAPORAN --}}
                <div class="section-title">LAPORAN</div>
                <a href="#">
                    Laporan Saldo
                </a>
                <a href="#">
                    Laporan Keuntungan
                </a>

                <div style="margin-top: 50px;">
                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf
                        <button type="submit">
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </div>

        <div class="content-wrapper">
            <div class="top-navbar">
                SISTEM MANAJEMEN TOKE MUSTHOFA
            </div>
            <div class="content-area">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
