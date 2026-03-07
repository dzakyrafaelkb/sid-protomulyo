@extends('layouts.admin')
@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Judul Berita <span class="text-danger">*</span></label>
                <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" class="form-control @error('judul') is-invalid @enderror" required>
                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Isi Berita <span class="text-danger">*</span></label>
                <textarea name="isi" rows="10" class="form-control @error('isi') is-invalid @enderror" required>{{ old('isi', $berita->isi) }}</textarea>
                @error('isi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Ganti Gambar (opsional)</label>
                @if($berita->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/img/berita/' . $berita->gambar) }}" height="100" class="rounded">
                        <small class="text-muted d-block">Gambar saat ini</small>
                    </div>
                @endif
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
                @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="bi bi-save me-1"></i> Simpan Perubahan</button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
