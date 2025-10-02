<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // ... (metode lain dibiarkan kosong)

    /**
     * Display the specified resource.
     */
    public function show(string $param1)
    {
        // Logika untuk menampilkan view berdasarkan parameter URL
        if ($param1 == 'detail') {
            return view('halaman-mahasiswa-detail');
        } else if ($param1 == 'profil') {
            return view('halaman-mahasiswa-profil');
        }

        // Opsional: Jika parameter tidak cocok, bisa arahkan ke halaman 404
        abort(404);
    }

    // ... (metode lain dibiarkan kosong)
}