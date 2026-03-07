@extends('layouts.public')
@section('title', 'Galeri - Protomulyo')
@section('content')
<section class="py-5 bg-success text-white text-center">
    <div class="container"><h1 class="fw-bold mt-2">Galeri Desa</h1>
    <p class="lead">Dokumentasi kegiatan dan pesona Desa Protomulyo</p></div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($galeri as $g)
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <img src="{{ asset('storage/img/galeri/'.$g->foto) }}" class="card-img-top" style="height:250px;object-fit:cover;" alt="{{ $g->judul }}">
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">{{ $g->judul }}</h6>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($g->tanggal)->format('d M Y') }}</small>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted py-5">Belum ada foto di galeri.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection
