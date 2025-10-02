<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; // Digunakan untuk memudahkan perhitungan tanggal

class PegawaiController extends Controller
{
    public function index()
    {
        // Tanggal lahir dan tanggal mulai bekerja (Join Date) untuk data dummy
        $birth_date = Carbon::create(2005, 11, 19);
        $join_date = Carbon::create(2022, 9, 26);
        $today = Carbon::now();

        // 1. Hitung Usia (Age)
        $age = $birth_date->diffInYears($today);

        // 2. Hitung Durasi Kerja (Working Duration) dalam hari
        $working_duration_days = $join_date->diffInDays($today);

        // 3. Tentukan Status Pegawai
        $status_info = '';
        if ($working_duration_days < 730) { // 730 hari = kurang dari 2 tahun
            $status_info = "Masih pegawai baru, tingkatkan pengalaman kerja!";
        } else {
            $status_info = "Sudah senior, jadilah teladan bagi rekan kerja!";
        }

        // Siapkan Data Pegawai
        $data_pegawai = [
            'employee_name'     => 'Adenia Faridhotul Musthofa',
            'age'               => $age, // Usia (tahun)
            'position'          => 'Software Developer',
            'skills'            => [
                'PHP (Laravel)',
                'JavaScript (Vue.js)',
                'Database (MySQL)',
                'Cloud Services (AWS)',
                'Agile Methodology'
            ],
            'join_date'         => $join_date->format('d F Y'), // Format tanggal mulai kerja
            'working_duration'  => $working_duration_days, // Lama bekerja (hari)
            'salary'            => 12500000, // Gaji bulanan
            'status_info'       => $status_info, // Informasi status
            'career_goal'       => 'Menjadi Lead Developer dalam 3 tahun ke depan.'
        ];

        // Tampilkan View dan kirimkan data pegawai
       return view('pegawai', compact('data_pegawai'));
    }
}

