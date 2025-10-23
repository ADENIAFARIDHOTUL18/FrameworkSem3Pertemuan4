<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Toke Sawit - Login</title>
    <style>
        body {
            /* Latar Belakang Gambar Sawit */
            background-image: url('{{ asset("./images/sawit.png") }}'); /* PASTIKAN PATH GAMBAR BENAR */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
        }

        /* Overlay Hijau Transparan */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            /* Gradient atau warna solid transparan */
            background: linear-gradient(to bottom right, rgba(47, 95, 75, 0.85), rgba(96, 157, 147, 0.85));
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2; /* Pastikan form di atas overlay */
            width: 90%;
            max-width: 400px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            text-align: center;
        }

        .header-gradient {
            background: linear-gradient(to right, #2f5f4b, #609d93);
            color: white;
            padding: 30px 20px 20px 20px;
            margin-bottom: -20px;
            border-bottom-left-radius: 50% 10%;
            border-bottom-right-radius: 50% 10%;
        }
        .header-gradient h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .header-gradient p {
            font-size: 14px;
            margin-top: 5px;
            opacity: 0.9;
        }

        .form-content {
            padding: 20px 30px 40px 30px;
        }
        .form-content h2 {
            font-size: 18px;
            color: #2f5f4b;
            margin-top: 0;
            margin-bottom: 25px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .input-group {
            margin-bottom: 15px;
        }
        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 15px;
            transition: border-color 0.3s;
        }
        .input-group input:focus {
            border-color: #609d93;
            outline: none;
            box-shadow: 0 0 0 3px rgba(96, 157, 147, 0.2);
        }

        .error {
            background-color: #fce4e4;
            color: #c62828;
            border: 1px solid #c62828;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .link {
            margin-top: 5px;
            margin-bottom: 20px;
            text-align: right;
        }
        .link a {
            color: #609d93;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s;
        }
        .link a:hover {
            color: #2f5f4b;
            text-decoration: underline;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        button[type="submit"]:hover {
            background-color: #388E3C;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
