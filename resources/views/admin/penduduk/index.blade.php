@extends('layouts.admin')
@section('title', 'Data Penduduk')
@section('page-title', 'Data Penduduk')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="" method="GET" class="d-flex gap-2">
                <input type="text" name="cari" value="{{ request('cari') }}" class="form-control form-control-sm" placeholder="Cari nama / NIK..." style="width:220px;">
                <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-search"></i></button>
                @if(request('cari'))<a href="{{ route('admin.penduduk.index') }}" class="btn btn-sm btn-outline-danger">Reset</a>@endif
            </form>
            <a href="{{ route('admin.penduduk.create') }}" class="btn btn-success btn-sm rounded-pill px-3">
                <i class="bi bi-plus-circle me-1"></i> Tambah Penduduk
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th><th>NIK</th><th>Nama</th><th>Jenis Kelamin</th>
                        <th>RT/RW</th><th>Pekerjaan</th><th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penduduk as $i => $p)
                    <tr>
                        <td>{{ $penduduk->firstItem() + $i }}</td>
                        <td>{{ $p->nik }}</td>
                        <td><strong>{{ $p->nama }}</strong></td>
                        <td>
                            @if($p->jenis_kelamin == 'L')
                                <span class="badge bg-primary">Laki-laki</span>
                            @else
                                <span class="badge bg-danger">Perempuan</span>
                            @endif
                        </td>
                        <td>{{ $p->rt }}/{{ $p->rw }}</td>
                        <td>{{ $p->pekerjaan ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.penduduk.edit', $p->id) }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></a>
                            <form id="del-{{ $p->id }}" action="{{ route('admin.penduduk.destroy', $p->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="button" onclick="confirmDelete('del-{{ $p->id }}')" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">Tidak ada data penduduk.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-2">
            <small class="text-muted">Menampilkan {{ $penduduk->firstItem() }}-{{ $penduduk->lastItem() }} dari {{ $penduduk->total() }} data</small>
            {{ $penduduk->links() }}
        </div>
    </div>
</div>
@endsection
