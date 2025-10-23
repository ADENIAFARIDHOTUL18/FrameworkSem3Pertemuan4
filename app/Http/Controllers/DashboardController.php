<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Mengambil transaksi user yang login
        // Order by `transaction_date` dan `id` untuk memastikan urutan yang benar
        $transactions = $user->transactions()
                             ->orderBy('transaction_date', 'desc')
                             ->orderBy('id', 'desc')
                             ->get();

        // Menghitung Saldo
        // Saldo positif = HUTANG Petani
        $totalDebt = $transactions->where('type', 'DEBT')->sum('debt_amount');
        $totalPayment = $transactions->where('type', 'PAYMENT')->sum('payment_amount');
        $currentBalance = $totalDebt - $totalPayment; 

        // Definisikan Harga Sawit saat ini (BARIS BARU)
        // Jika Anda memiliki tabel setting, Anda bisa mengambil data dari sana.
        // Untuk saat ini, kita gunakan nilai default (placeholder) agar dashboard tidak error.
        $currentPrice = 2800; 
        
        return view('dashboard', [
            'user' => $user,
            'transactions' => $transactions,
            'currentBalance' => $currentBalance,
            'currentPrice' => $currentPrice, // VARIABEL BARU DIKIRIM KE VIEW
        ]);
    }
}