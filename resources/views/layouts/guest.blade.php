<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tugasku</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body{
            background: linear-gradient(135deg,#020617,#0f172a,#1e1b4b);
            min-height:100vh;
        }

        .login-card{
            background: rgba(15,23,42,.85);
            backdrop-filter: blur(15px);
            border:1px solid rgba(255,255,255,.08);
            border-radius:24px;
            box-shadow:0 0 40px rgba(124,58,237,.25);
        }

        .logo-box{
            width:80px;
            height:80px;
            border-radius:20px;
            background:linear-gradient(135deg,#7c3aed,#4f46e5);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:32px;
        }
    </style>
</head>

<body class="font-sans antialiased text-white">

<div class="min-h-screen d-flex align-items-center justify-content-center">

    <div class="w-full max-w-md">

        <div class="text-center mb-4">

            <div class="logo-box mx-auto mb-3">
                📚
            </div>

            <h1 class="fw-bold fs-1">
                Tugasku
            </h1>

            <p class="text-secondary">
                Kelola tugas kuliahmu dengan lebih terorganisir
            </p>

        </div>

        <div class="login-card p-5">

            {{ $slot }}

        </div>

    </div>

</div>

</body>
</html>