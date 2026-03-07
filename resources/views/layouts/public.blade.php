<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Protomulyo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @stack('styles')
    <style>
        body { font-family: 'Inter', sans-serif; }
        .navbar-brand { font-weight: 700; color: #10B981 !important; }
        .nav-link { font-weight: 500; color: #334155 !important; transition: color 0.2s; }
        .nav-link:hover, .nav-link.active { color: #10B981 !important; }
        footer { background: #1e293b; color: #94a3b8; }
        footer a { color: #94a3b8; text-decoration: none; }
        footer a:hover { color: #10B981; }
        .hover-top { transition: all 0.3s; }
        .hover-top:hover { transform: translateY(-10px); }
    </style>
</head>
<body>

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <div style="width:36px;height:36px;background:#10B981;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                <i class="bi bi-tree-fill text-white"></i>
            </div>
            Desa Protomulyo
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-1">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('profil','sejarah') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profil') }}">Perangkat Desa</a></li>
                        <li><a class="dropdown-item" href="{{ route('sejarah') }}">Sejarah Desa</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('berita*') ? 'active' : '' }}" href="{{ route('berita') }}">Berita</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ route('galeri') }}">Galeri</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('layanan') ? 'active' : '' }}" href="{{ route('layanan') }}">Layanan</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('cek-nik') ? 'active' : '' }}" href="{{ route('cek.nik') }}">Cek NIK</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('pengaduan') ? 'active' : '' }}" href="{{ route('pengaduan') }}">Pengaduan</a></li>
            </ul>
        </div>
    </div>
</nav>

{{-- Content --}}
@yield('content')

{{-- Footer --}}
<footer class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="fw-bold text-white mb-3">Desa Protomulyo</h5>
                <p class="small">Kecamatan Kaliwungu Selatan, Kabupaten Kendal, Jawa Tengah.</p>
                <p class="small"><i class="bi bi-clock me-1"></i> Jam Pelayanan: Senin–Jumat, 08.00–15.00 WIB</p>
            </div>
            <div class="col-md-3">
                <h6 class="fw-bold text-white mb-3">Menu</h6>
                <ul class="list-unstyled small">
                    <li class="mb-1"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="mb-1"><a href="{{ route('berita') }}">Berita Desa</a></li>
                    <li class="mb-1"><a href="{{ route('galeri') }}">Galeri</a></li>
                    <li class="mb-1"><a href="{{ route('layanan') }}">Layanan</a></li>
                    <li class="mb-1"><a href="{{ route('pengaduan') }}">Pengaduan</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="fw-bold text-white mb-3">Layanan Cepat</h6>
                <ul class="list-unstyled small">
                    <li class="mb-1"><a href="{{ route('cek.nik') }}">Cek NIK</a></li>
                    <li class="mb-1"><a href="{{ route('profil') }}">Perangkat Desa</a></li>
                    <li class="mb-1"><a href="{{ route('sejarah') }}">Sejarah Desa</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h6 class="fw-bold text-white mb-3">Kontak</h6>
                <a href="https://wa.me/6281911490798" target="_blank" class="btn btn-success btn-sm w-100">
                    <i class="bi bi-whatsapp me-1"></i> WhatsApp
                </a>
            </div>
        </div>
        <hr class="border-secondary mt-4">
        <p class="text-center small mb-0">© {{ date('Y') }} Desa Protomulyo. Semua hak dilindungi.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
