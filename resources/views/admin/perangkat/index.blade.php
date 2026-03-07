@extends('layouts.admin')
@section('title', 'Perangkat Desa')
@section('page-title', 'Perangkat Desa')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.perangkat.create') }}" class="btn btn-success btn-sm rounded-pill px-3">
                <i class="bi bi-plus-circle me-1"></i> Tambah Perangkat
            </a>
        </div>
        <div class="row g-3">
            @forelse($perangkat as $p)
            <div class="col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm text-center p-3 h-100">
                    @if($p->foto)
                        <img src="{{ asset('storage/img/perangkat/' . $p->foto) }}" class="rounded-circle mx-auto mb-3" width="90" height="90" style="object-fit:cover;" alt="{{ $p->nama }}">
                    @else
                        <div class="rounded-circle bg-secondary mx-auto mb-3 d-flex align-items-center justify-content-center" style="width:90px;height:90px;">
                            <i class="bi bi-person-fill text-white fs-2"></i>
                        </div>
                    @endif
                    <h6 class="fw-bold mb-0">{{ $p->nama }}</h6>
                    <span class="badge bg-success mt-1">{{ $p->jabatan }}</span>
                    @if($p->nip)<small class="text-muted d-block mt-1">NIP: {{ $p->nip }}</small>@endif
                    <div class="mt-3 d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.perangkat.edit', $p->id) }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></a>
                        <form id="del-p-{{ $p->id }}" action="{{ route('admin.perangkat.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="button" onclick="confirmDelete('del-p-{{ $p->id }}')" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5 text-muted"><i class="bi bi-person-badge fs-1 d-block mb-2"></i>Belum ada data perangkat desa.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
