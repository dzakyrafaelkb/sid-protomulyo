@extends('layouts.admin')
@section('title', 'Tambah Galeri')
@section('page-title', 'Tambah Foto Galeri')

@section('content')
<div class="card border-0 shadow-sm" style="max-width:500px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Judul Kegiatan <span class="text-danger">*</span></label>
                <input type="text" name="judul" value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror" placeholder="Contoh: Kerja Bakti Dusun 01" required>
                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal Kegiatan <span class="text-danger">*</span></label>
                <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror" required>
                @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Foto <span class="text-danger">*</span></label>
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*" required>
                <small class="text-muted">Format: JPG, PNG. Maks: 3MB</small>
                @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success rounded-pill px-4"><i class="bi bi-cloud-upload me-1"></i> Simpan</button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
