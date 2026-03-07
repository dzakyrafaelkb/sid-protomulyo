<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - Desa Protomulyo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @stack('styles')
    <style>
        body { background-color: #f8f9fa; font-family: 'Inter', sans-serif; }
        .sidebar { min-height: 100vh; background: #1e293b; color: white; position: sticky; top: 0; }
        .sidebar a { color: #cbd5e1; text-decoration: none; padding: 12px 20px; display: flex; align-items: center; gap: 8px; transition: 0.2s; }
        .sidebar a:hover, .sidebar a.active { background: #334155; color: #10B981; border-left: 4px solid #10B981; }
        .sidebar a:not(.active) { border-left: 4px solid transparent; }
        .main-content { background: #f8f9fa; min-height: 100vh; padding: 30px; }
        .badge-notif { font-size: 10px; padding: 3px 6px; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        {{-- Sidebar --}}
        <div class="col-md-2 p-0 sidebar">
            <div class="p-4 text-center border-bottom border-slate-700">
                <h5 class="fw-bold text-success mb-0">Desa Protomulyo</h5>
                <small class="text-muted text-uppercase" style="font-size:11px;">Administrator</small>
            </div>

            @php $pendingCount = \App\Models\Pengaduan::where('status','Pending')->count(); @endphp

            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="{{ route('admin.penduduk.index') }}" class="{{ request()->routeIs('admin.penduduk.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Data Penduduk
            </a>
            <a href="{{ route('admin.pengaduan.index') }}" class="{{ request()->routeIs('admin.pengaduan.*') ? 'active' : '' }} d-flex justify-content-between">
                <span><i class="bi bi-chat-left-text text-warning"></i> Pengaduan</span>
                @if($pendingCount > 0)
                    <span class="badge bg-danger rounded-pill badge-notif">{{ $pendingCount }} Baru</span>
                @endif
            </a>
            <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i> Berita Desa
            </a>
            <a href="{{ route('admin.perangkat.index') }}" class="{{ request()->routeIs('admin.perangkat.*') ? 'active' : '' }}">
                <i class="bi bi-person-badge"></i> Perangkat Desa
            </a>
            <a href="{{ route('admin.dokumen.index') }}" class="{{ request()->routeIs('admin.dokumen.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-arrow-down"></i> Dokumen
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="{{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                <i class="bi bi-images text-success"></i> Kelola Galeri
            </a>

            <div class="mt-auto p-2" style="position:absolute; bottom:0; width:100%;">
                <form action="{{ route('admin.logout') }}" method="POST" id="logoutForm">
                    @csrf
                    <a href="#" onclick="confirmLogout()" class="text-danger">
                        <i class="bi bi-box-arrow-right"></i> Keluar
                    </a>
                </form>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="col-md-10 main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0">@yield('page-title')</h4>
                <span class="text-muted small">Selamat datang, <strong>{{ session('admin')['nama_lengkap'] ?? 'Admin' }}</strong></span>
            </div>

            {{-- Alert Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmLogout() {
    Swal.fire({
        title: 'Yakin ingin keluar?',
        text: "Sesi admin Anda akan diakhiri.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Ya, Keluar!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) { document.getElementById('logoutForm').submit(); }
    });
}
function confirmDelete(formId) {
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) { document.getElementById(formId).submit(); }
    });
}
</script>
@stack('scripts')
</body>
</html>
