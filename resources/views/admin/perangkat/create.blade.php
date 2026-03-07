@extends('layouts.admin')
@section('title', 'Tambah Perangkat')
@section('page-title', 'Tambah Perangkat Desa')

@section('content')
<div class="card border-0 shadow-sm" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.perangkat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" required>
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jabatan <span class="text-danger">*</span></label>
                <input type="text" name="jabatan" value="{{ old('jabatan') }}" class="form-control @error('jabatan') is-invalid @enderror" required>
                @error('jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">NIP</label>
                <input type="text" name="nip" value="{{ old('nip') }}" class="form-control" maxlength="20">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Foto <span class="text-danger">*</span></label>
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*" required>
                <small class="text-muted">Format: JPG, PNG. Maks: 2MB</small>
                @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success rounded-pill px-4"><i class="bi bi-save me-1"></i> Simpan</button>
                <a href="{{ route('admin.perangkat.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
