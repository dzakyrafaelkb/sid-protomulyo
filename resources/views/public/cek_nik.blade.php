@extends('layouts.public')
@section('title', 'Cek NIK - Protomulyo')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="card border-0 shadow-lg rounded-4 p-4">
                <i class="bi bi-person-vcard text-success display-1 mb-3"></i>
                <h3 class="fw-bold">Cek Data Kependudukan</h3>
                <p class="text-muted small">Masukkan 16 digit NIK untuk verifikasi data warga.</p>
                <form action="{{ route('cek.nik.post') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="input-group mb-3 shadow-sm rounded-pill overflow-hidden">
                        <input type="number" name="nik" class="form-control border-0 ps-4 @error('nik') is-invalid @enderror"
                               placeholder="Contoh: 3324xxxxxxxxxxxx" value="{{ old('nik') }}" required>
                        <button class="btn btn-success px-4" type="submit">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                    @error('nik')<div class="text-danger small mb-2">{{ $message }}</div>@enderror
                </form>

                @if(isset($sudahCek))
                    @if(isset($data) && $data)
                    <div class="alert alert-success mt-4 border-0 rounded-4 text-start p-3">
                        <table class="table table-sm table-borderless mb-0 small">
                            <tr><td width="40%">Nama</td><td>: <strong>{{ strtoupper($data->nama) }}</strong></td></tr>
                            <tr><td>NIK</td><td>: {{ $data->nik }}</td></tr>
                            <tr><td>Gender</td><td>: {{ $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td></tr>
                            <tr><td>Alamat</td><td>: RT {{ $data->rt }} / RW {{ $data->rw }}</td></tr>
                            <tr><td>Pekerjaan</td><td>: {{ $data->pekerjaan ?? '-' }}</td></tr>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-danger mt-4 border-0 rounded-4 p-3">
                        <small><i class="bi bi-exclamation-circle me-1"></i> NIK tidak terdaftar di database desa.</small>
                    </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
