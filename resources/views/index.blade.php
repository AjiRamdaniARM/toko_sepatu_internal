<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Aplikasi</title>

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="login-box text-center">
    <div class="mb-3">
        <img src="{{ asset('assets/img/ikon sepatu.jpeg')}}" alt="Logo Sepatu" class="brand-icon">
        <div class="brand-title">Toko Sepatu</div>
        <p class="text-muted">Silakan pilih login sebagai:</p>
    </div>
    <div class="role-selection">
        <div class="role-card active" data-role="admin">Admin</div>
        <div class="role-card" data-role="karyawan">Karyawan</div>
    </div>
    <div  class="form-section active">
        <form action="{{ route('login.admin')}}" method="POST">
            @csrf
        <div class="mb-3 text-start">
            <label for="adminEmail" class="form-label">Email Admin</label>
            <input type="email" name="email" class="form-control" id="adminEmail" placeholder="admin@gmail.com">
        </div>
        <div class="mb-3 text-start">
            <label for="adminPassword" class="form-label">Kata Sandi</label>
            <input type="password" name="password" class="form-control" id="adminPassword" placeholder="********">
        </div>
        <button type="submit" class="btn btn-login w-100">Masuk sebagai Admin</button>
        </form>
    </div>
    <div class="form-section">
        <form action="{{ route('login.karyawan')}}" method="POST">
            @csrf
        <div class="mb-3 text-start">
            <label for="karyawanEmail" class="form-label">Email Karyawan</label>
            <input type="email" name="email" class="form-control" id="karyawanEmail" placeholder="karyawan@gmail.com">
        </div>
        <div class="mb-3 text-start">
            <label for="karyawanPassword" class="form-label">Kata Sandi</label>
            <input type="password" name="password" class="form-control" id="karyawanPassword" placeholder="********">
        </div>
        <button type="submit" class="btn btn-login w-100">Masuk sebagai Karyawan</button>
        </form>
    </div>
    </div>
</body>
<script src="{{asset('assets/js/login.js')}}"></script>
</html>
