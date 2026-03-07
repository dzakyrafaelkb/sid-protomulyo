@extends('layouts.admin')
@section('title', 'Edit Galeri')
@section('page-title', 'Edit Foto Galeri')

@section('content')
<div class="card border-0 shadow-sm" style="max-width:500px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Judul Kegiatan <span class="text-danger">*</span></label>
                <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}" class="form-control @error('judul') is-invalid @enderror" required>
                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal Kegiatan <span class="text-danger">*</span></label>
                <input type="date" name="tanggal" value="{{ old('tanggal', $galeri->tanggal) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Ganti Foto (opsional)</label>
                @if($galeri->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/img/galeri/' . $galeri->foto) }}" height="100" class="rounded">
                    </div>
                @endif
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="bi bi-save me-1"></i> Simpan Perubahan</button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
