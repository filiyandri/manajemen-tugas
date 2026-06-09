<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tugasku</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>

.login-input{
    background:rgba(255,255,255,.08);
    border:none;
    color:white;
    padding:12px;
}

.login-input:focus{
    background:rgba(255,255,255,.12);
    color:white;
    box-shadow:none;
    border:1px solid #7c3aed;
}

.login-input::placeholder{
    color:#bdbdbd;
}

.login-btn{
    background:linear-gradient(
        135deg,
        #6366f1,
        #8b5cf6
    );
    border:none;
    padding:12px;
    border-radius:12px;
    color:white;
    font-weight:600;
}

.login-btn:hover{
    opacity:.9;
    color:white;
}

</style>
</head>

<body class="bg-dark">

<div class="min-vh-100 d-flex justify-content-center align-items-center"
     style="background: linear-gradient(135deg,#0f172a,#1e1b4b,#312e81);">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="text-center mb-4">

                    <div style="
                        width:90px;
                        height:90px;
                        margin:auto;
                        border-radius:20px;
                        background:linear-gradient(135deg,#6366f1,#8b5cf6);
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        font-size:40px;
                    ">
                        📚
                    </div>

                    <h1 class="text-white fw-bold mt-3">
                        Tugasku
                    </h1>

                    <p class="text-light">
                        Kelola tugas kuliahmu dengan lebih terorganisir
                    </p>

                </div>

                <div class="card border-0 shadow-lg"
                     style="
                        border-radius:24px;
                        background:rgba(255,255,255,.08);
                        backdrop-filter:blur(15px);
                     ">

                    <div class="card-body p-5">

                        {{ $slot }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>