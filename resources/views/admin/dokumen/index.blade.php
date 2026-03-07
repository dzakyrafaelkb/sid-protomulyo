@extends('layouts.admin')
@section('title', 'Dokumen')
@section('page-title', 'Kelola Dokumen')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.dokumen.create') }}" class="btn btn-success btn-sm rounded-pill px-3">
                <i class="bi bi-upload me-1"></i> Upload Dokumen
            </a>
        </div>
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr><th>#</th><th>Nama Dokumen</th><th>Kategori</th><th>File</th><th>Tanggal Upload</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($dokumen as $i => $d)
                <tr>
                    <td>{{ $dokumen->firstItem() + $i }}</td>
                    <td><strong>{{ $d->nama_dokumen }}</strong></td>
                    <td><span class="badge bg-info text-dark">{{ $d->kategori }}</span></td>
                    <td>
                        <a href="{{ asset('storage/dokumen/' . $d->file) }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-download me-1"></i> Download
                        </a>
                    </td>
                    <td><small class="text-muted">-</small></td>
                    <td>
                        <form id="del-d-{{ $d->id }}" action="{{ route('admin.dokumen.destroy', $d->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="button" onclick="confirmDelete('del-d-{{ $d->id }}')" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">Belum ada dokumen yang diunggah.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-2">{{ $dokumen->links() }}</div>
    </div>
</div>
@endsection
