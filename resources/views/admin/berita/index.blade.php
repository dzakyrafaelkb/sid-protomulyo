@extends('layouts.admin')
@section('title', 'Berita Desa')
@section('page-title', 'Berita Desa')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.berita.create') }}" class="btn btn-success btn-sm rounded-pill px-3">
                <i class="bi bi-plus-circle me-1"></i> Tulis Berita
            </a>
        </div>
        <div class="row g-3">
            @forelse($berita as $b)
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    @if($b->gambar)
                        <img src="{{ asset('storage/img/berita/' . $b->gambar) }}" class="card-img-top" style="height:180px;object-fit:cover;" alt="{{ $b->judul }}">
                    @endif
                    <div class="card-body">
                        <h6 class="fw-bold">{{ $b->judul }}</h6>
                        <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</small>
                        <p class="text-muted small mt-2 mb-3">{{ Str::limit(strip_tags($b->isi), 100) }}</p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.berita.edit', $b->id) }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil me-1"></i>Edit</a>
                            <form id="del-b-{{ $b->id }}" action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="button" onclick="confirmDelete('del-b-{{ $b->id }}')" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash me-1"></i>Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5 text-muted"><i class="bi bi-newspaper fs-1 d-block mb-2"></i>Belum ada berita.</div>
            @endforelse
        </div>
        <div class="mt-3">{{ $berita->links() }}</div>
    </div>
</div>
@endsection
