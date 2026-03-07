@extends('layouts.public')
@section('title', 'Beranda - Desa Protomulyo')

@push('styles')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('content')

{{-- Hero Section --}}
<section class="text-center py-5"
    style="background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url('{{ asset('storage/img/icon/balaidesa2.jpg') }}') center/cover fixed; color:white; min-height:85vh; display:flex; align-items:center;">
    <div class="container py-5">
        <h1 class="display-3 fw-bold mb-3" style="text-shadow:2px 2px 10px rgba(0,0,0,0.5)">Selamat Datang di Desa Protomulyo</h1>
        <p class="lead fs-4 mb-4" style="text-shadow:1px 1px 5px rgba(0,0,0,0.5)">Membangun Desa Digital yang Mandiri, Sejahtera, dan Berbudaya</p>
        <a href="#layanan" class="btn btn-success btn-lg rounded-pill px-5 shadow fw-bold">Layanan Online</a>
    </div>
</section>

{{-- Clock & Info Bar --}}
<section class="py-3 bg-white border-bottom shadow-sm">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                <h5 class="mb-0 fw-bold"><i class="bi bi-clock me-2 text-success"></i><span id="clock"></span> WIB</h5>
                <small class="text-muted">{{ now()->translatedFormat('d F Y') }} | Kaliwungu Selatan, Kendal</small>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="d-inline-flex align-items-center bg-light p-2 rounded-pill px-4">
                    <i class="bi bi-sun-fill text-warning fs-4 me-3"></i>
                    <div class="text-start">
                        <p class="mb-0 fw-bold small">Cerah Berawan</p>
                        <p class="mb-0 text-muted" style="font-size:11px">Suhu: 31°C | Kelembapan: 70%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Layanan --}}
<section id="layanan" class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-md-3 col-6 text-center">
                <a href="{{ route('cek.nik') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm p-4 rounded-4 hover-top">
                        <i class="bi bi-person-vcard text-success display-5 mb-3"></i>
                        <h6 class="fw-bold">Cek NIK</h6>
                        <small class="text-muted">Cek status penduduk</small>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6 text-center">
                <a href="{{ route('layanan') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm p-4 rounded-4 hover-top">
                        <i class="bi bi-file-earmark-text text-primary display-5 mb-3"></i>
                        <h6 class="fw-bold">Formulir</h6>
                        <small class="text-muted">Unduh surat desa</small>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6 text-center">
                <a href="{{ route('berita') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm p-4 rounded-4 hover-top">
                        <i class="bi bi-megaphone text-warning display-5 mb-3"></i>
                        <h6 class="fw-bold">Pengumuman</h6>
                        <small class="text-muted">Info kegiatan desa</small>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6 text-center">
                <a href="{{ route('profil') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm p-4 rounded-4 hover-top">
                        <i class="bi bi-geo-alt text-danger display-5 mb-3"></i>
                        <h6 class="fw-bold">Profil Desa</h6>
                        <small class="text-muted">Sejarah & Wilayah</small>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Statistik --}}
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Statistik Kependudukan</h2>
            <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
        </div>
        <div class="row text-center">
            <div class="col-md-4 mb-3">
                <div class="card p-4 border-0 shadow-sm rounded-4 bg-success text-white">
                    <i class="bi bi-people fs-1 mb-2"></i>
                    <h3 class="fw-bold mb-0">{{ $totalWarga }}</h3>
                    <p class="mb-0 small opacity-75">Total Penduduk</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card p-4 border-0 shadow-sm rounded-4 border-bottom border-primary border-4">
                    <i class="bi bi-gender-male text-primary fs-1 mb-2"></i>
                    <h3 class="text-primary fw-bold mb-0">{{ $totalLaki }}</h3>
                    <p class="text-muted mb-0 small">Laki-laki</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card p-4 border-0 shadow-sm rounded-4 border-bottom border-danger border-4">
                    <i class="bi bi-gender-female text-danger fs-1 mb-2"></i>
                    <h3 class="text-danger fw-bold mb-0">{{ $totalPerempuan }}</h3>
                    <p class="text-muted mb-0 small">Perempuan</p>
                </div>
            </div>
        </div>
        <div class="row g-4 mt-2">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-4 h-100 rounded-4">
                    <h6 class="fw-bold mb-3 text-center text-muted">Perbandingan Jenis Kelamin</h6>
                    <canvas id="chartGender" style="max-height:250px;"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-4 h-100 rounded-4">
                    <h6 class="fw-bold mb-3 text-center text-muted">5 Pekerjaan Terbanyak</h6>
                    <canvas id="chartPekerjaan" style="max-height:250px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Berita Terbaru --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Berita & Kegiatan Desa</h2>
            <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
        </div>
        <div class="row">
            @forelse($beritaTerbaru as $b)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    @if($b->gambar)
                    <img src="{{ asset('storage/img/berita/'.$b->gambar) }}" class="card-img-top" style="height:220px;object-fit:cover;" alt="{{ $b->judul }}">
                    @endif
                    <div class="card-body">
                        <small class="text-success fw-bold">{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</small>
                        <h5 class="card-title mt-2 fw-bold">{{ $b->judul }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit(strip_tags($b->isi), 100) }}...</p>
                        <a href="{{ route('berita.show', $b->id) }}" class="btn btn-link p-0 text-success fw-bold text-decoration-none">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center text-muted">Belum ada berita.</p>
            @endforelse
        </div>
        <div class="text-center mt-2">
            <a href="{{ route('berita') }}" class="btn btn-outline-success rounded-pill px-4">Lihat Semua Berita</a>
        </div>
    </div>
</section>

{{-- Perangkat Desa --}}
@if($kades)
<section class="py-5 bg-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-2">Perangkat Desa</h2>
        <p class="text-muted mb-5">Kenali lebih dekat perangkat Desa Protomulyo.</p>
        <div class="row justify-content-center">
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm p-3 rounded-4 border-top border-success border-4">
                    <div class="mx-auto mb-3 overflow-hidden rounded-circle shadow-sm" style="width:140px;height:140px;">
                        <img src="{{ asset('storage/img/perangkat/'.$kades->foto) }}" class="w-100 h-100" style="object-fit:cover;">
                    </div>
                    <h6 class="fw-bold mb-1">{{ $kades->nama }}</h6>
                    <p class="text-success small fw-bold mb-0">{{ $kades->jabatan }}</p>
                </div>
            </div>
        </div>
        <a href="{{ route('profil') }}" class="btn btn-outline-success rounded-pill px-4">Lihat Semua Perangkat</a>
    </div>
</section>
@endif

{{-- Peta --}}
<section class="py-5 bg-light">
    <div class="container text-center">
        <h3 class="fw-bold mb-4">Lokasi Desa Protomulyo</h3>
        <div class="rounded-4 overflow-hidden shadow-sm">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15841.04258296245!2d110.252329!3d-6.978508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e705f93532c5f11%3A0x5027a7636557160!2sProtomulyo%2C%20Kec.%20Kaliwungu%20Sel.%2C%20Kabupaten%20Kendal%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
function updateClock() {
    const now = new Date();
    const h = String(now.getHours()).padStart(2,'0');
    const m = String(now.getMinutes()).padStart(2,'0');
    const s = String(now.getSeconds()).padStart(2,'0');
    document.getElementById('clock').textContent = `${h}:${m}:${s}`;
}
setInterval(updateClock, 1000); updateClock();

document.addEventListener("DOMContentLoaded", function() {
    new Chart(document.getElementById('chartGender'), {
        type: 'pie',
        data: {
            labels: ['Laki-laki','Perempuan'],
            datasets: [{ data: [{{ $totalLaki }}, {{ $totalPerempuan }}], backgroundColor: ['#0d6efd','#dc3545'] }]
        },
        options: { plugins: { legend: { position: 'bottom' } } }
    });
    new Chart(document.getElementById('chartPekerjaan'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($pekerjaan->pluck('pekerjaan')) !!},
            datasets: [{ label: 'Jumlah Warga', data: {!! json_encode($pekerjaan->pluck('jumlah')) !!}, backgroundColor: '#198754' }]
        },
        options: { indexAxis: 'y', plugins: { legend: { display: false } } }
    });
});
</script>
@endpush
