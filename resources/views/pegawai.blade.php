<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pegawai (Dark Card)</title>

    <style>
        /* Skema Warna Dark Card:
           - Background: #f4f7f9 (Abu-abu sangat terang)
           - Card Primary: #2c3e50 (Dark Blue/Grey)
           - Aksen: #1abc9c (Teal)
           - Teks Utama: #ecf0f1 (Putih/Terang)
        */

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px;
            background-color: #f4f7f9;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Kontainer Utama (Dark Card) */
        .container {
            max-width: 800px;
            width: 100%;
            background-color: #2c3e50; /* Warna utama Dark Grey */
            color: #ecf0f1; /* Teks default terang */
            border-radius: 12px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3); /* Shadow yang dalam */
            overflow: hidden;
            border: 1px solid #34495e;
        }

        /* Header Card */
        .header {
            background-color: #34495e; /* Header sedikit lebih gelap dari body card */
            padding: 30px 40px;
            text-align: center;
            border-bottom: 4px solid #1abc9c; /* Garis aksen Teal */
        }
        .header h1 {
            margin: 0;
            font-size: 2.5em;
            font-weight: 800;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 1.1em;
            color: #bdc3c7;
        }

        /* Konten Dalam Card */
        .content {
            padding: 40px;
        }

        /* Judul Seksi */
        .section-title {
            font-size: 1.4em;
            font-weight: 700;
            color: #1abc9c; /* Aksen Teal */
            margin-top: 30px;
            margin-bottom: 15px;
            border-bottom: 1px solid #34495e; /* Garis abu-abu gelap */
            padding-bottom: 5px;
        }
        .section-title:first-child {
            margin-top: 0;
        }

        /* Detail Data (Grid Layout) */
        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px 40px;
            margin-bottom: 25px;
        }
        .detail-item {
            padding: 10px 0;
            border-bottom: 1px dashed #34495e; /* Garis putus-putus */
        }

        .detail-label {
            color: #bdc3c7; /* Label terang */
            font-size: 0.85em;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 5px;
            display: block;
        }
        .detail-value {
            color: #ecf0f1; /* Nilai sangat terang */
            font-weight: 700;
            font-size: 1.15em;
        }

        /* Keahlian (Skills - Teal Tags) */
        .skills-list {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .skills-list li {
            background-color: #1abc9c; /* Teal solid */
            color: #ffffff;
            padding: 8px 15px;
            border-radius: 9999px;
            font-size: 0.9em;
            font-weight: 600;
        }

        /* Status Box */
        .status-box {
            font-size: 1.1em;
            font-weight: 700;
            padding: 15px 20px;
            border-radius: 8px;
            text-align: center;
            margin-top: 20px;
        }
        .status-new {
            background-color: #f39c12; /* Oranye/Amber solid */
            color: #ffffff;
        }
        .status-senior {
            background-color: #27ae60; /* Hijau solid */
            color: #ffffff;
        }

        /* Karir Goal */
        .career-goal-box {
            background-color: #34495e; /* Latar belakang sama dengan header */
            padding: 15px;
            border-radius: 8px;
            margin-top: 25px;
            border-left: 5px solid #1abc9c; /* Garis Teal */
        }
        .career-goal-box strong {
            display: block;
            margin-bottom: 5px;
            color: #1abc9c;
        }
        .career-goal-box p {
            margin: 0;
            font-style: italic;
            color: #bdc3c7;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="header">
            <h1>{{ $data_pegawai['employee_name'] }}</h1>
            <p>{{ $data_pegawai['position'] }}</p>
        </div>

        <div class="content">

            <span class="section-title">Detail Personal</span>
            <div class="detail-grid">
                <div class="detail-item">
                    <span class="detail-label">Usia</span>
                    <span class="detail-value">{{ floor($data_pegawai['age']) }} tahun</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Gaji Bulanan</span>
                    <span class="detail-value">Rp {{ number_format($data_pegawai['salary'], 0, ',', '.') }}</span>
                </div>
            </div>

            <span class="section-title">Kinerja & Masa Kerja</span>
            <div class="detail-grid">
                <div class="detail-item">
                    <span class="detail-label">Tanggal Mulai Bekerja</span>
                    <span class="detail-value">{{ $data_pegawai['join_date'] }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Lama Bekerja</span>
                    <span class="detail-value">{{ floor($data_pegawai['working_duration']) }} hari</span>
                </div>
            </div>

            <span class="section-title">Keahlian (Skills)</span>
            <ul class="skills-list">
                @foreach ($data_pegawai['skills'] as $skill)
                    <li>{{ $skill }}</li>
                @endforeach
            </ul>

            <span class="section-title">Status & Karir</span>

            {{-- Status Kondisional --}}
            <div class="status-box {{ floor($data_pegawai['working_duration']) < 730 ? 'status-new' : 'status-senior' }}">
                {{ $data_pegawai['status_info'] }}
            </div>

            <div class="career-goal-box">
                <strong>Visi Karir</strong>
                <p>{{ $data_pegawai['career_goal'] }}</p>
            </div>

        </div>
    </div>
</body>
</html>
