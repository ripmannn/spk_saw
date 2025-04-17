<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">SAW</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kriteria.index') ? 'active' : '' }}" href="{{ route('kriteria.index') }}">Kriteria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('alternatif.index') ? 'active' : '' }}" href="{{ route('alternatif.index') }}">Alternatif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('nilai.index') ? 'active' : '' }}" href="{{ route('nilai.index') }}">Nilai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('hitung.index') ? 'active' : '' }}" href="{{ route('hitung.index') }}">Hitung</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="my-3">{{ $title }}</h1>
        @yield('content')
    </div>
</body>

</html>