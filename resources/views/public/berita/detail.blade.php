@extends('layouts.public')
@section('title', $b->judul . ' - Protomulyo')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-success">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('berita') }}" class="text-success">Berita</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </nav>
            <h1 class="fw-bold mb-3">{{ $b->judul }}</h1>
            <div class="d-flex align-items-center mb-4 text-muted">
                <span class="me-3"><i class="bi bi-person-circle me-1"></i>{{ $b->nama_lengkap ?? 'Admin' }}</span>
                <span><i class="bi bi-calendar3 me-1"></i>{{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('d F Y') }}</span>
            </div>
            @if($b->gambar)
            <img src="{{ asset('storage/img/berita/'.$b->gambar) }}" class="img-fluid rounded-4 shadow-sm mb-5 w-100" style="max-height:500px;object-fit:cover;" alt="{{ $b->judul }}">
            @endif
            <article class="lh-lg text-dark" style="font-size:1.1rem;text-align:justify;">
                {!! nl2br(e($b->isi)) !!}
            </article>
            <hr class="my-5">
            <div class="text-center">
                <a href="{{ route('berita') }}" class="btn btn-outline-success px-4 rounded-pill">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Berita
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
