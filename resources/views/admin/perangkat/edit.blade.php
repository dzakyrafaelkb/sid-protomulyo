@extends('layouts.admin')
@section('title', 'Edit Perangkat')
@section('page-title', 'Edit Perangkat Desa')

@section('content')
<div class="card border-0 shadow-sm" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.perangkat.update', $perangkat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="nama" value="{{ old('nama', $perangkat->nama) }}" class="form-control @error('nama') is-invalid @enderror" required>
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jabatan <span class="text-danger">*</span></label>
                <input type="text" name="jabatan" value="{{ old('jabatan', $perangkat->jabatan) }}" class="form-control @error('jabatan') is-invalid @enderror" required>
                @error('jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">NIP</label>
                <input type="text" name="nip" value="{{ old('nip', $perangkat->nip) }}" class="form-control" maxlength="20">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Ganti Foto (opsional)</label>
                @if($perangkat->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/img/perangkat/' . $perangkat->foto) }}" class="rounded-circle" width="70" height="70" style="object-fit:cover;">
                        <small class="text-muted d-block mt-1">Foto saat ini</small>
                    </div>
                @endif
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="bi bi-save me-1"></i> Simpan Perubahan</button>
                <a href="{{ route('admin.perangkat.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
