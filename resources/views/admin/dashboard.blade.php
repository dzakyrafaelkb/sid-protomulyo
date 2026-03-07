@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Ringkasan Statistik')

@push('styles')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('content')
<div class="row g-3">
    <div class="col-md-3">
        <div class="card p-3 border-0 shadow-sm text-center h-100">
            <i class="bi bi-people-fill text-primary fs-1 mb-2"></i>
            <h6 class="text-muted">Total Penduduk</h6>
            <h3 class="fw-bold">{{ $totalPenduduk }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 border-0 shadow-sm text-center h-100 bg-warning bg-opacity-10">
            <i class="bi bi-exclamation-triangle-fill text-warning fs-1 mb-2"></i>
            <h6 class="text-muted">Laporan Pending</h6>
            <h3 class="fw-bold text-dark">{{ $pengaduanPending }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 border-0 shadow-sm text-center h-100">
            <i class="bi bi-newspaper text-success fs-1 mb-2"></i>
            <h6 class="text-muted">Total Berita</h6>
            <h3 class="fw-bold">{{ $totalBerita }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 border-0 shadow-sm text-center h-100">
            <i class="bi bi-file-earmark-text text-danger fs-1 mb-2"></i>
            <h6 class="text-muted">Total Dokumen</h6>
            <h3 class="fw-bold">{{ $totalDokumen }}</h3>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-4 h-100">
            <h6 class="fw-bold mb-3"><i class="bi bi-pie-chart me-2"></i>Proporsi Jenis Kelamin</h6>
            <canvas id="chartGender"></canvas>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card border-0 shadow-sm p-4 h-100">
            <h6 class="fw-bold mb-3"><i class="bi bi-bar-chart me-2"></i>Pekerjaan Terbanyak</h6>
            <canvas id="chartPekerjaan"></canvas>
        </div>
    </div>
</div>

<div class="mt-4 card p-4 border-0 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Penduduk yang Baru Ditambahkan</h5>
        <a href="{{ route('admin.penduduk.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
    </div>
    <table class="table table-hover">
        <thead class="table-light">
            <tr><th>NIK</th><th>Nama</th><th>RT/RW</th><th>Pekerjaan</th></tr>
        </thead>
        <tbody>
            @forelse($pendudukTerbaru as $p)
            <tr>
                <td>{{ $p->nik }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->rt }}/{{ $p->rw }}</td>
                <td><span class="badge bg-secondary">{{ $p->pekerjaan ?? '-' }}</span></td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center text-muted">Belum ada data penduduk.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    new Chart(document.getElementById('chartGender').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{ data: [{{ $lakiLaki }}, {{ $perempuan }}], backgroundColor: ['#0d6efd', '#fd7e14'], borderWidth: 0 }]
        },
        options: { plugins: { legend: { position: 'bottom' } } }
    });

    new Chart(document.getElementById('chartPekerjaan').getContext('2d'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($pekerjaan->pluck('pekerjaan')) !!},
            datasets: [{ label: 'Jumlah', data: {!! json_encode($pekerjaan->pluck('jumlah')) !!}, backgroundColor: '#10B981', borderRadius: 5 }]
        },
        options: { scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } }
    });
});
</script>
@endpush
