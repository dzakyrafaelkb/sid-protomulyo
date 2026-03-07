@extends('layouts.admin')
@section('title', 'Tambah Berita')
@section('page-title', 'Tulis Berita Baru')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Judul Berita <span class="text-danger">*</span></label>
                <input type="text" name="judul" value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror" required>
                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Isi Berita <span class="text-danger">*</span></label>
                <textarea name="isi" rows="10" class="form-control @error('isi') is-invalid @enderror" required>{{ old('isi') }}</textarea>
                @error('isi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Gambar Utama <span class="text-danger">*</span></label>
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" required>
                <small class="text-muted">Format: JPG, JPEG, PNG. Maks: 2MB</small>
                @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success rounded-pill px-4"><i class="bi bi-send me-1"></i> Terbitkan</button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
