<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manajemen Tugas</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

   <style>

    body{
        background: #071120;
        color: white;
        font-family: 'Segoe UI', sans-serif;
    }

    .sidebar{
        width: 250px;
        height: 100vh;
        background: rgba(11, 23, 48, 0.95);
        position: fixed;
        padding: 25px;
        border-right: 1px solid #1e293b;
    }

    .sidebar h2{
        margin-bottom: 40px;
        font-weight: bold;
    }

    .sidebar a{
        display: block;
        color: #cbd5e1;
        text-decoration: none;
        padding: 14px;
        margin-bottom: 12px;
        border-radius: 14px;
        transition: 0.3s;
    }

    .sidebar a:hover{
        background: linear-gradient(90deg,#4f46e5,#7c3aed);
        color: white;
        transform: translateX(5px);
    }

    .main-content{
        margin-left: 270px;
        padding: 35px;
    }

    .card-dark{
        background: rgba(15, 28, 53, 0.9);
        border-radius: 24px;
        padding: 25px;
        border: 1px solid rgba(255,255,255,0.05);

        box-shadow:
        0 0 25px rgba(59,130,246,0.08);

        transition: 0.3s;
    }

    .card-dark:hover{
        transform: translateY(-5px);

        box-shadow:
        0 0 35px rgba(99,102,241,0.25);
    }

    table{
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .table-dark{
        --bs-table-bg: transparent;
    }

    .table tbody tr{
        background: rgba(255,255,255,0.03);
        border-radius: 15px;
    }

    .table tbody tr:hover{
        background: rgba(255,255,255,0.06);
    }

    .btn-primary{
        background: linear-gradient(90deg,#4f46e5,#7c3aed);
        border: none;
        border-radius: 12px;
        padding: 10px 20px;
    }

    .btn-primary:hover{
        opacity: 0.9;
    }

    .badge{
        padding: 10px;
        border-radius: 10px;
    }

    ::-webkit-scrollbar{
        width: 8px;
    }

    ::-webkit-scrollbar-thumb{
        background: #4f46e5;
        border-radius: 20px;
    }

</style>

</head>
<body>

    <div class="sidebar">

        <h2>📚 Tugasku</h2>

        <a href="/tasks">Dashboard</a>

        <a href="/tasks/create">Tambah Tugas</a>

        <form action="/logout" method="POST">
            @csrf

            <button class="btn btn-danger w-100 mt-3">
                Logout
            </button>
        </form>

    </div>

    <div class="main-content">

        @yield('content')

    </div>

</body>
</html>