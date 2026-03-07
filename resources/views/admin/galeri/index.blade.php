@extends('layouts.admin')
@section('title', 'Galeri')
@section('page-title', 'Kelola Galeri')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.galeri.create') }}" class="btn btn-success btn-sm rounded-pill px-3">
                <i class="bi bi-plus-circle me-1"></i> Tambah Foto
            </a>
        </div>
        <div class="row g-3">
            @forelse($galeri as $g)
            <div class="col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('storage/img/galeri/' . $g->foto) }}" class="card-img-top" style="height:160px;object-fit:cover;" alt="{{ $g->judul }}">
                    <div class="card-body p-2">
                        <p class="small fw-bold mb-0">{{ $g->judul }}</p>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($g->tanggal)->format('d M Y') }}</small>
                        <div class="mt-2 d-flex gap-1">
                            <a href="{{ route('admin.galeri.edit', $g->id) }}" class="btn btn-outline-primary btn-sm flex-fill"><i class="bi bi-pencil"></i></a>
                            <form id="del-g-{{ $g->id }}" action="{{ route('admin.galeri.destroy', $g->id) }}" method="POST" class="flex-fill">
                                @csrf @method('DELETE')
                                <button type="button" onclick="confirmDelete('del-g-{{ $g->id }}')" class="btn btn-outline-danger btn-sm w-100"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5 text-muted"><i class="bi bi-images fs-1 d-block mb-2"></i>Belum ada foto di galeri.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
