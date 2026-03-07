@extends('layouts.admin')
@section('title', 'Edit Penduduk')
@section('page-title', 'Edit Data Penduduk')

@section('content')
<div class="card border-0 shadow-sm" style="max-width:700px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.penduduk.update', $penduduk->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label fw-bold">NIK <span class="text-danger">*</span></label>
                    <input type="text" name="nik" value="{{ old('nik', $penduduk->nik) }}" class="form-control @error('nik') is-invalid @enderror" maxlength="16" required>
                    @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama', $penduduk->nama) }}" class="form-control @error('nama') is-invalid @enderror" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Jenis Kelamin <span class="text-danger">*</span></label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="L" {{ $penduduk->jenis_kelamin=='L'?'selected':'' }}>Laki-laki</option>
                        <option value="P" {{ $penduduk->jenis_kelamin=='P'?'selected':'' }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">RT <span class="text-danger">*</span></label>
                    <input type="text" name="rt" value="{{ old('rt', $penduduk->rt) }}" class="form-control" maxlength="5" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">RW <span class="text-danger">*</span></label>
                    <input type="text" name="rw" value="{{ old('rw', $penduduk->rw) }}" class="form-control" maxlength="5" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Pekerjaan</label>
                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}" class="form-control">
                </div>
            </div>
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="bi bi-save me-1"></i> Simpan Perubahan</button>
                <a href="{{ route('admin.penduduk.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
