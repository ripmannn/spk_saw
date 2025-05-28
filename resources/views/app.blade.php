<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <div class="d-flex flex-column flex-md-row min-vh-100">
        <!-- Sidebar -->
        <!-- Sidebar untuk desktop (hidden di mobile) -->
        <nav id="sidebarMenu" class="bg-primary text-white p-3 flex-shrink-0 d-none d-md-block"
            style="width: 280px; height: 100vh; position: sticky; top: 0;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="/" class="d-flex align-items-center text-white text-decoration-none">
                    <span class="fs-4 fw-bold">SAW Admin</span>
                </a>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                        class="nav-link text-white {{ request()->routeIs('home') ? 'active bg-secondary text-primary' : '' }}">
                        <i class="bi bi-house-door me-2"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('kriteria.index') }}"
                        class="nav-link text-white {{ request()->routeIs('kriteria.index') || request()->routeIs('kriteria.create') || request()->routeIs('kriteria.edit') ? 'active bg-secondary text-primary' : '' }}">
                        <i class="bi bi-list-check me-2"></i>
                        Kriteria
                    </a>
                </li>
                <li>
                    <a href="{{ route('alternatif.index') }}"
                        class="nav-link text-white {{ request()->routeIs('alternatif.index') || request()->routeIs('alternatif.create') || request()->routeIs('alternatif.edit') ? 'active bg-secondary text-primary' : '' }}">
                        <i class="bi bi-table me-2"></i>
                        Alternatif
                    </a>
                </li>
                <li>
                    <a href="{{ route('nilai.index') }}"
                        class="nav-link text-white {{ request()->routeIs('nilai.index') || request()->routeIs('nilai.create') || request()->routeIs('nilai.edit') ? 'active bg-secondary text-primary' : '' }}">
                        <i class="bi bi-clipboard-data me-2"></i>
                        Nilai
                    </a>
                </li>
                <li>
                    <a href="{{ route('hitung.index') }}"
                        class="nav-link text-white {{ request()->routeIs('hitung.index') ? 'active bg-secondary text-primary' : '' }}">
                        <i class="bi bi-calculator me-2"></i>
                        Hitung
                    </a>
                </li>
            </ul>
            <hr>
            <form method="POST" action="{{ route('logout') }}"
                onsubmit="return confirm('Apakah Anda yakin ingin logout?');">
                @csrf
                <button type="submit" class="btn btn-danger w-100">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </nav>

        <!-- Offcanvas untuk mobile -->
        <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="offcanvasSidebar"
            aria-labelledby="offcanvasSidebarLabel" style="width: 100%;">
            <div class="offcanvas-header bg-primary text-white">
                <h5 class="offcanvas-title" id="offcanvasSidebarLabel">SAW Admin</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-primary text-white p-0">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}"
                            class="nav-link text-white {{ request()->routeIs('home') ? 'active bg-secondary text-primary' : '' }}">
                            <i class="bi bi-house-door me-2"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kriteria.index') }}"
                            class="nav-link text-white {{ request()->routeIs('kriteria.index') || request()->routeIs('kriteria.create') || request()->routeIs('kriteria.edit') ? 'active bg-secondary text-primary' : '' }}">
                            <i class="bi bi-list-check me-2"></i>
                            Kriteria
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('alternatif.index') }}"
                            class="nav-link text-white {{ request()->routeIs('alternatif.index') || request()->routeIs('alternatif.create') || request()->routeIs('alternatif.edit') ? 'active bg-secondary text-primary' : '' }}">
                            <i class="bi bi-table me-2"></i>
                            Alternatif
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('nilai.index') }}"
                            class="nav-link text-white {{ request()->routeIs('nilai.index') || request()->routeIs('nilai.create') || request()->routeIs('nilai.edit') ? 'active bg-secondary text-primary' : '' }}">
                            <i class="bi bi-clipboard-data me-2"></i>
                            Nilai
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('hitung.index') }}"
                            class="nav-link text-white {{ request()->routeIs('hitung.index') ? 'active bg-secondary text-primary' : '' }}">
                            <i class="bi bi-calculator me-2"></i>
                            Hitung
                        </a>
                    </li>
                </ul>
                <hr>
                <form class="p-3" method="POST" action="{{ route('logout') }}"
                    onsubmit="return confirm('Apakah Anda yakin ingin logout?');">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Tombol toggle untuk mobile -->
        <button class="btn btn-primary d-md-none position-fixed top-0 end-0 m-3" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar"
            style="z-index: 1051;">
            <i class="bi bi-list"></i>
        </button>

        <!-- Main Content -->
        <main class="flex-fill p-4" style="min-width:0;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="m-0">{{ $title }}</h1>
                <div class="d-none d-lg-block">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>

            </div>
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
</body>

</html>
