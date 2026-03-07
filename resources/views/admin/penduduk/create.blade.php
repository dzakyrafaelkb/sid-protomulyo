@extends('layouts.admin')
@section('title', 'Tambah Penduduk')
@section('page-title', 'Tambah Data Penduduk')

@section('content')
<div class="card border-0 shadow-sm" style="max-width:700px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.penduduk.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label fw-bold">NIK <span class="text-danger">*</span></label>
                    <input type="text" name="nik" value="{{ old('nik') }}" class="form-control @error('nik') is-invalid @enderror" maxlength="16" placeholder="16 digit NIK" required>
                    @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Jenis Kelamin <span class="text-danger">*</span></label>
                    <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                        <option value="">-- Pilih --</option>
                        <option value="L" {{ old('jenis_kelamin')=='L'?'selected':'' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin')=='P'?'selected':'' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">RT <span class="text-danger">*</span></label>
                    <input type="text" name="rt" value="{{ old('rt') }}" class="form-control @error('rt') is-invalid @enderror" maxlength="5" required>
                    @error('rt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">RW <span class="text-danger">*</span></label>
                    <input type="text" name="rw" value="{{ old('rw') }}" class="form-control @error('rw') is-invalid @enderror" maxlength="5" required>
                    @error('rw')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Pekerjaan</label>
                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" class="form-control">
                </div>
            </div>
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success rounded-pill px-4"><i class="bi bi-save me-1"></i> Simpan</button>
                <a href="{{ route('admin.penduduk.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
