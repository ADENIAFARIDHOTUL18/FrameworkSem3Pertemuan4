@extends('app')

@section('content')
    <style>
        /* =========================================================================
           TAMBAHAN CSS UNTUK ANIMASI DAN EFEK TOMBOL
           ========================================================================= */
        
        /* Gaya Umum Tombol */
        .animated-btn {
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease-in-out;
            /* Tambahkan sedikit rounded corner untuk tombol */
            border-radius: 8px;
        }

        /* 1. Tombol WhatsApp (Hubungi Sekarang) - Orange */
        .btn-whatsapp {
            background-color: #ff8f00; 
            color: white; 
            padding: 10px 15px; 
            width: 100%; 
            font-size: 14px; 
            margin-top: 15px; 
            /* Box Shadow untuk efek kedalaman */
            box-shadow: 0 4px 10px rgba(255, 143, 0, 0.4);
        }

        .btn-whatsapp:hover {
            background-color: #ffb300; /* Warna lebih cerah saat hover */
            /* Efek Pulse/Denyut Ringan */
            transform: scale(1.02);
            box-shadow: 0 6px 15px rgba(255, 143, 0, 0.6);
        }
        
        .btn-whatsapp:active {
            transform: scale(0.98); /* Efek tekan */
            box-shadow: 0 2px 5px rgba(255, 143, 0, 0.8);
        }
        
        /* 2. Tombol Admin SET - Orange */
        .btn-admin-set {
            background-color: #ff9800; 
            color: white; 
            padding: 8px; 
            width: 70px;
            font-size: 14px; 
            font-weight: bold;
            border-radius: 4px; /* Lebih kotak dari tombol utama */
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .btn-admin-set:hover {
            background-color: #ffb74d; /* Warna lebih muda saat hover */
            box-shadow: 0 4px 8px rgba(255, 152, 0, 0.4);
        }
        
        .btn-admin-set:active {
            /* Efek tekan ke dalam (Press down) */
            transform: translateY(1px); 
            box-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }

        /* Styling Tabel yang Ditingkatkan */
        .transaction-table tbody tr:hover {
             background-color: #ecf0f1; /* Highlight baris saat dihover */
        }
        
        /* Styling Input Form Admin */
        .admin-form-input {
            flex-grow: 1; 
            padding: 10px; /* Padding ditingkatkan */
            border: 1px solid #ffcc80; 
            border-radius: 4px; 
            font-size: 14px; 
            background-color: white;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .admin-form-input:focus {
            border-color: #ff9800;
            box-shadow: 0 0 0 3px rgba(255, 152, 0, 0.2);
            outline: none;
        }
    </style>

    {{-- JUDUL UTAMA LEBIH RINGKAS --}}
    <h1 style="color: #34495e; margin-bottom: 5px; padding-bottom: 0px; font-weight: 600; font-size: 24px;">
        Selamat Datang, <span style="color: #4CAF50;">{{ $user->name }}</span>
    </h1>

    {{-- BARIS PEMISAH BARU YANG RAPI --}}
    <p style="color: #7f8c8d; margin-top: 0; margin-bottom: 25px; font-size: 14px;">
        Ringkasan Saldo dan Aktivitas Toke Sawit Musthofa.
    </p>

    <?php $isAdmin = ($user->email === 'admin@tokesawit.com' || $user->email === 'adenia@mahasiswa.pcr.ac.id'); ?>
    <?php $currentPrice = 2800; // Harga sawit placeholder ?>

    <div style="display: flex; gap: 15px; margin-bottom: 25px;">

        {{-- Card 1: TOTAL SALDO HUTANG (Fokus Utama) --}}
        <div style="flex: 1; background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 5px 10px rgba(0,0,0,0.05); border-left: 4px solid #2e7d32;">
            <h3 style="color: #388e3c; margin-top: 0; font-size: 14px; text-transform: uppercase;">Total Saldo Hutang</h3>
            <p style="font-size: 30px; font-weight: 700; color: {{ $currentBalance > 0 ? '#c62828' : '#2e7d32' }}; margin: 5px 0 10px 0;">
                Rp{{ number_format(abs($currentBalance), 0, ',', '.') }}
            </p>
            <p style="font-size: 12px; color: #7f8c8d;">
                Status: **{{ $currentBalance > 0 ? 'MEMILIKI HUTANG' : 'LUNAS' }}**
            </p>
        </div>

        {{-- Card 2: HARGA SAWIT HARI INI --}}
        <div style="flex: 1; background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 5px 10px rgba(0,0,0,0.05); border-left: 4px solid #ff8f00;">
            <h3 style="color: #fbc02d; margin-top: 0; font-size: 14px; text-transform: uppercase;">Harga Sawit Per KG</h3>
            <p style="font-size: 30px; font-weight: 700; color: #fbc02d; margin: 5px 0 10px 0;">
                Rp{{ number_format($currentPrice, 0, ',', '.') }}
            </p>
            <p style="font-size: 12px; color: #7f8c8d;">
                Berlaku per {{ date('d M Y') }}
            </p>
        </div>

        {{-- Card 3: KONTAK PENGELOLA TOKE (Diubah ke Orange) --}}
        <div style="flex: 1; background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 5px 10px rgba(0,0,0,0.05); border-left: 4px solid #ff8f00;">
            <h3 style="color: #fbc02d; margin-top: 0; font-size: 14px; text-transform: uppercase;">Kontak Pengelola Toke</h3>
            <p style="font-size: 12px; color: #7f8c8d; margin-top: 10px; margin-bottom: 20px;">
                Hubungi Toke Sawit Musthofa untuk pencatatan transaksi.
            </p>
            <p style="font-size: 13px; font-weight: 600; color: #34495e; line-height: 1.5;">
                WA: 0812-3456-7890<br>
                Email: toke.musthofa@email.com
            </p>

            <a href="https://wa.me/6281234567890" target="_blank" style="text-decoration: none;">
                <button class="animated-btn btn-whatsapp">
                    Hubungi Sekarang (WhatsApp)
                </button>
            </a>
        </div>
    </div>

    {{-- KONTROL HARGA (Hanya Admin) --}}
    @if ($isAdmin)
        <div style="background-color: #fff3e0; padding: 15px; border-radius: 8px; margin-bottom: 25px; border: 1px solid #ffe0b2;">
            <h4 style="color: #ff9800; margin: 0 0 10px 0; font-size: 14px;">Kontrol Admin: Ubah Harga Sawit</h4>
            <form action="#" method="POST" style="display: flex; gap: 5px;">
                <input type="number" name="new_price" placeholder="Set Harga Baru (Rp)"
                    class="admin-form-input">
                <button type="submit" class="animated-btn btn-admin-set">
                    SET
                </button>
            </form>
        </div>
    @endif

    <h2 style="color: #34495e; margin-bottom: 15px; font-weight: 600; font-size: 18px; border-bottom: 2px solid #4CAF50; padding-bottom: 5px;">
        Detail Transaksi & Riwayat Jual Sawit
    </h2>

    <table class="transaction-table" style="width: 100%; border-collapse: collapse; background-color: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background: linear-gradient(to right, #2e7d32, #4CAF50); color: white; border: none;">
                <th style="padding: 12px; text-align: left; font-weight: 600; font-size: 13px; width: 15%;">Tanggal</th>
                <th style="padding: 12px; text-align: left; font-weight: 600; font-size: 13px; width: 15%;">Jenis Transaksi</th>
                <th style="padding: 12px; text-align: left; font-weight: 600; font-size: 13px; width: 45%;">Keterangan</th>
                <th style="padding: 12px; text-align: right; font-weight: 600; font-size: 13px; width: 25%;">Jumlah (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr style="background-color: white; border-bottom: 1px solid #f7f7f7; transition: background-color 0.2s;">
                    <td style="padding: 10px; color: #555; font-size: 13px;">{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d-M-Y') }}</td>
                    <td style="padding: 10px; font-weight: 600; font-size: 13px; color: {{ $transaction->type == 'DEBT' ? '#c62828' : '#2e7d32' }};">
                        {{ $transaction->type == 'DEBT' ? 'PENJUALAN' : 'PEMBAYARAN' }}
                    </td>
                    <td style="padding: 10px; color: #555; font-size: 13px;">
                        {{ $transaction->description ?? 'Pencatatan Utang/Pembayaran Toke' }}
                    </td>
                    <td style="padding: 10px; text-align: right; font-weight: bold; font-size: 14px; color: #333;">
                        {{ number_format($transaction->type == 'DEBT' ? $transaction->debt_amount : $transaction->payment_amount, 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="padding: 20px; text-align: center; color: #7f8c8d; background-color: #fafafa; font-size: 13px; border-radius: 0 0 8px 8px;">🎉 Belum ada riwayat transaksi tercatat. Mulai catat sekarang!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
