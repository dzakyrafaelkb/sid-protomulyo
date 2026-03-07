@extends('layouts.admin')
@section('title', 'Upload Dokumen')
@section('page-title', 'Upload Dokumen Baru')

@section('content')
<div class="card border-0 shadow-sm" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.dokumen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Dokumen <span class="text-danger">*</span></label>
                <input type="text" name="nama_dokumen" value="{{ old('nama_dokumen') }}" class="form-control @error('nama_dokumen') is-invalid @enderror" placeholder="Contoh: Formulir Keterangan Domisili" required>
                @error('nama_dokumen')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Formulir" {{ old('kategori')=='Formulir'?'selected':'' }}>Formulir</option>
                    <option value="Peraturan" {{ old('kategori')=='Peraturan'?'selected':'' }}>Peraturan</option>
                    <option value="Laporan" {{ old('kategori')=='Laporan'?'selected':'' }}>Laporan</option>
                    <option value="Surat" {{ old('kategori')=='Surat'?'selected':'' }}>Surat</option>
                    <option value="Lainnya" {{ old('kategori')=='Lainnya'?'selected':'' }}>Lainnya</option>
                </select>
                @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">File Dokumen <span class="text-danger">*</span></label>
                <input type="file" name="file_dokumen" class="form-control @error('file_dokumen') is-invalid @enderror" accept=".pdf,.doc,.docx,.xls,.xlsx" required>
                <small class="text-muted">Format: PDF, DOC, DOCX, XLS, XLSX. Maks: 5MB</small>
                @error('file_dokumen')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success rounded-pill px-4"><i class="bi bi-cloud-upload me-1"></i> Upload</button>
                <a href="{{ route('admin.dokumen.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
