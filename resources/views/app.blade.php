<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Google Font for Brutalism - typically monospace or sans-serif fonts work well -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    @stack('styles')
</head>

<body>
    <div class="d-flex flex-column flex-md-row min-vh-100">
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="brutalist-sidebar text-white p-4 flex-shrink-0 d-none d-md-block brutalist-shadow"
            style="width: 300px; height: 100vh; position: sticky; top: 0;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="/" class="d-flex align-items-center text-white text-decoration-none">
                    <span class="fs-2 fw-bold" style="transform: rotate(-2deg); display: inline-block;">SAW ADMIN</span>
                </a>
            </div>
            <hr class="border-dark border-3">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item brutalist-nav-item">
                    <a href="{{ route('home') }}"
                        class="nav-link text-white brutalist-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="bi bi-house-door me-2"></i>
                        Home
                    </a>
                </li>
                <li class="brutalist-nav-item">
                    <a href="{{ route('kriteria.index') }}"
                        class="nav-link text-white brutalist-nav-link {{ request()->routeIs('kriteria.index') || request()->routeIs('kriteria.create') || request()->routeIs('kriteria.edit') ? 'active' : '' }}">
                        <i class="bi bi-list-check me-2"></i>
                        Kriteria
                    </a>
                </li>
                <li class="brutalist-nav-item">
                    <a href="{{ route('alternatif.index') }}"
                        class="nav-link text-white brutalist-nav-link {{ request()->routeIs('alternatif.index') || request()->routeIs('alternatif.create') || request()->routeIs('alternatif.edit') ? 'active' : '' }}">
                        <i class="bi bi-table me-2"></i>
                        Alternatif
                    </a>
                </li>
                <li class="brutalist-nav-item">
                    <a href="{{ route('nilai.index') }}"
                        class="nav-link text-white brutalist-nav-link {{ request()->routeIs('nilai.index') || request()->routeIs('nilai.create') || request()->routeIs('nilai.edit') ? 'active' : '' }}">
                        <i class="bi bi-clipboard-data me-2"></i>
                        Nilai
                    </a>
                </li>
                <li class="brutalist-nav-item">
                    <a href="{{ route('hitung.index') }}"
                        class="nav-link text-white brutalist-nav-link {{ request()->routeIs('hitung.index') ? 'active' : '' }}">
                        <i class="bi bi-calculator me-2"></i>
                        Hitung
                    </a>
                </li>
            </ul>
            <hr class="border-dark border-3">
            <form method="POST" class="form-logout" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="brutalist-button w-100">
                    <i class="bi bi-box-arrow-right me-2"></i> LOGOUT
                </button>
            </form>
        </nav>

        <!-- Offcanvas untuk mobile -->
        <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="offcanvasSidebar"
            aria-labelledby="offcanvasSidebarLabel" style="width: 100%;">
            <div class="offcanvas-header brutalist-sidebar text-white">
                <h5 class="offcanvas-title fw-bold fs-2" id="offcanvasSidebarLabel">SAW ADMIN</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body brutalist-sidebar text-white p-3">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item brutalist-nav-item">
                        <a href="{{ route('home') }}"
                            class="nav-link text-white brutalist-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                            <i class="bi bi-house-door me-2"></i>
                            Home
                        </a>
                    </li>
                    <li class="brutalist-nav-item">
                        <a href="{{ route('kriteria.index') }}"
                            class="nav-link text-white brutalist-nav-link {{ request()->routeIs('kriteria.index') || request()->routeIs('kriteria.create') || request()->routeIs('kriteria.edit') ? 'active' : '' }}">
                            <i class="bi bi-list-check me-2"></i>
                            Kriteria
                        </a>
                    </li>
                    <li class="brutalist-nav-item">
                        <a href="{{ route('alternatif.index') }}"
                            class="nav-link text-white brutalist-nav-link {{ request()->routeIs('alternatif.index') || request()->routeIs('alternatif.create') || request()->routeIs('alternatif.edit') ? 'active' : '' }}">
                            <i class="bi bi-table me-2"></i>
                            Alternatif
                        </a>
                    </li>
                    <li class="brutalist-nav-item">
                        <a href="{{ route('nilai.index') }}"
                            class="nav-link text-white brutalist-nav-link {{ request()->routeIs('nilai.index') || request()->routeIs('nilai.create') || request()->routeIs('nilai.edit') ? 'active' : '' }}">
                            <i class="bi bi-clipboard-data me-2"></i>
                            Nilai
                        </a>
                    </li>
                    <li class="brutalist-nav-item">
                        <a href="{{ route('hitung.index') }}"
                            class="nav-link text-white brutalist-nav-link {{ request()->routeIs('hitung.index') ? 'active' : '' }}">
                            <i class="bi bi-calculator me-2"></i>
                            Hitung
                        </a>
                    </li>
                </ul>
                <hr class="border-dark border-3">
                <form class="p-3 form-logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="brutalist-button w-100">
                        <i class="bi bi-box-arrow-right me-2"></i> LOGOUT
                    </button>
                </form>
            </div>
        </div>

        <!-- Tombol toggle untuk mobile -->
        <button class="brutalist-button d-md-none position-fixed top-0 end-0 m-3" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar"
            style="z-index: 1051;">
            <i class="bi bi-list"></i>
        </button>

        <!-- Main Content -->
        <main class="flex-fill p-4 pt-5" style="min-width:0;">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h1 class="brutalist-heading m-0 pb-2">{{ $title }}</h1>
                <div class="d-none d-lg-block">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white p-3 brutalist-border">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-dark fw-bold">HOME</a></li>
                            <li class="breadcrumb-item active fw-bold" style="color: var(--brutalist-blue);" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="brutalist-card p-4 mb-4">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Tambahkan SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Panggil file eksternal -->
    <script src="{{ asset('js/sweetalert-confirm.js') }}"></script>
    @stack('scripts')
</body>

</html>
