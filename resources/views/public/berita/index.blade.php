@extends('layouts.public')
@section('title', 'Berita Desa - Protomulyo')
@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Berita & Kegiatan Desa</h2>
        <p class="text-muted">Ikuti perkembangan terbaru dan kegiatan masyarakat Desa Protomulyo.</p>
        <hr class="mx-auto" style="width:80px;height:3px;background:#10B981;">
    </div>
    <div class="row">
        @forelse($berita as $b)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                @if($b->gambar)
                <img src="{{ asset('storage/img/berita/'.$b->gambar) }}" class="card-img-top" style="height:200px;object-fit:cover;" alt="{{ $b->judul }}">
                @endif
                <div class="card-body">
                    <small class="text-success fw-bold">{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</small>
                    <h5 class="card-title mt-2 fw-bold">{{ $b->judul }}</h5>
                    <p class="card-text text-muted small">{{ Str::limit(strip_tags($b->isi), 100) }}...</p>
                    <a href="{{ route('berita.show', $b->id) }}" class="btn btn-outline-success btn-sm rounded-pill">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted py-5">Belum ada berita yang diterbitkan.</div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-3">{{ $berita->links() }}</div>
</div>
@endsection
