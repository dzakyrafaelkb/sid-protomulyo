@extends('layouts.public')
@section('title', 'Pengaduan - Protomulyo')
@section('content')
<div class="py-5 bg-light" style="min-height:80vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <div class="text-center mb-4">
                        <i class="bi bi-chat-left-dots text-success display-4"></i>
                        <h2 class="fw-bold mt-2">Layanan Pengaduan Warga</h2>
                        <p class="text-muted">Gunakan nomor WhatsApp aktif agar kami dapat memberikan tindak lanjut laporan Anda.</p>
                    </div>
                    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control rounded-3 @error('nama') is-invalid @enderror" placeholder="Sesuai KTP" value="{{ old('nama') }}" required>
                                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Nomor WhatsApp</label>
                                <input type="text" name="no_wa" class="form-control rounded-3 @error('no_wa') is-invalid @enderror" placeholder="Contoh: 0812xxx" value="{{ old('no_wa') }}" required>
                                @error('no_wa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Judul Laporan</label>
                                <input type="text" name="judul" class="form-control rounded-3 @error('judul') is-invalid @enderror" placeholder="Apa yang ingin dilaporkan?" value="{{ old('judul') }}" required>
                                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Isi Laporan / Keluhan</label>
                                <textarea name="isi_laporan" class="form-control rounded-3 @error('isi_laporan') is-invalid @enderror" rows="5" placeholder="Jelaskan secara detail..." required>{{ old('isi_laporan') }}</textarea>
                                @error('isi_laporan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Unggah Foto Bukti <span class="text-muted fw-normal">(Opsional)</span></label>
                                <input type="file" name="foto" class="form-control rounded-3" accept="image/*">
                                <div class="form-text">Format: JPG/PNG, Maksimal 2MB</div>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-success w-100 py-2 fw-bold rounded-pill">
                                    <i class="bi bi-send me-2"></i> Kirim Laporan Sekarang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
