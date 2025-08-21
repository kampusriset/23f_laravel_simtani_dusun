<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SimTaniDusun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">SimTaniDusun</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                @auth
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('anggota.index') }}">Anggota</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('komoditas.index') }}">Komoditas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('jadwal-tanam.index') }}">Jadwal Tanam</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('hasil-panen.index') }}">Hasil Panen</a></li>
                </ul>
                <ul class="navbar-nav">
                    <a class="nav-link" href="{{ route('permintaan.index') }}">Permintaan Bantuan</a>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><form action="{{ route('logout') }}" method="POST">@csrf
                        <button class="btn btn-link nav-link" type="submit">Logout</button>
                    </form></li>
                </ul>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
