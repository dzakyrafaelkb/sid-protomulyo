@extends('layouts.public')
@section('title', 'Layanan - Protomulyo')
@section('content')
<div class="py-5 bg-success text-white text-center">
    <div class="container"><h1 class="fw-bold">Pusat Layanan Mandiri</h1>
    <p class="lead">Informasi Prosedur dan Administrasi Kependudukan Desa Protomulyo</p></div>
</div>
<section class="py-5">
    <div class="container text-center">
        <h3 class="fw-bold mb-5">Alur Pengajuan Surat</h3>
        <div class="row">
            @foreach([['1','Siapkan Berkas','Siapkan KTP/KK dan berkas pendukung dari RT/RW.'],['2','Datang Ke Balai','Serahkan berkas ke petugas pelayanan di Kantor Desa.'],['3','Verifikasi','Petugas akan mengecek validitas dan kelengkapan data.'],['4','Surat Selesai','Surat ditandatangani dan bisa langsung dibawa pulang.']] as [$no,$judul,$ket])
            <div class="col-md-3 mb-3">
                <div class="p-3 shadow-sm rounded-4 border h-100">
                    <h1 class="text-success fw-bold">{{ $no }}</h1>
                    <h6>{{ $judul }}</h6>
                    <small class="text-muted">{{ $ket }}</small>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4 class="fw-bold mb-4">Detail Persyaratan Administrasi</h4>
                <div class="accordion shadow-sm" id="accordionLayanan">
                    <div class="accordion-item border-0 mb-3 shadow-sm overflow-hidden rounded-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#ktp">
                                <i class="bi bi-person-badge me-3 text-success"></i> Pengantar KTP-el / Kartu Keluarga
                            </button>
                        </h2>
                        <div id="ktp" class="accordion-collapse collapse" data-bs-parent="#accordionLayanan">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="bi bi-check2-circle text-success me-2"></i>Surat Pengantar RT/RW setempat</li>
                                    <li class="list-group-item"><i class="bi bi-check2-circle text-success me-2"></i>Fotokopi Kartu Keluarga (KK) terbaru</li>
                                    <li class="list-group-item"><i class="bi bi-check2-circle text-success me-2"></i>Dokumen pendukung (Akta Lahir/Ijazah) jika ada perubahan data</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 mb-3 shadow-sm overflow-hidden rounded-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#sktm">
                                <i class="bi bi-file-earmark-medical me-3 text-success"></i> Surat Keterangan Tidak Mampu (SKTM)
                            </button>
                        </h2>
                        <div id="sktm" class="accordion-collapse collapse" data-bs-parent="#accordionLayanan">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="bi bi-check2-circle text-success me-2"></i>Fotokopi KTP & KK pemohon</li>
                                    <li class="list-group-item"><i class="bi bi-check2-circle text-success me-2"></i>Surat pernyataan tidak mampu bermaterai</li>
                                    <li class="list-group-item"><i class="bi bi-check2-circle text-success me-2"></i>Surat pengantar dari Ketua RT dan RW</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 mb-3 shadow-sm overflow-hidden rounded-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#domisili">
                                <i class="bi bi-house-door me-3 text-success"></i> Surat Keterangan Domisili
                            </button>
                        </h2>
                        <div id="domisili" class="accordion-collapse collapse" data-bs-parent="#accordionLayanan">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="bi bi-check2-circle text-success me-2"></i>Fotokopi KTP pemohon</li>
                                    <li class="list-group-item"><i class="bi bi-check2-circle text-success me-2"></i>Surat Pengantar RT/RW asli</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-4 mb-4 rounded-4">
                    <h5 class="fw-bold mb-3"><i class="bi bi-cloud-download me-2 text-success"></i>Download Formulir</h5>
                    <p class="small text-muted mb-3">Silakan unduh formulir berikut untuk dibawa ke balai desa.</p>
                    <div class="d-grid gap-2">
                        @forelse($dokumen as $d)
                        <a href="{{ asset('storage/dokumen/'.$d->file) }}" target="_blank" class="btn btn-outline-success btn-sm text-start py-2">
                            <i class="bi bi-file-earmark-arrow-down me-2"></i>{{ $d->nama_dokumen }}
                        </a>
                        @empty
                        <div class="alert alert-light small mb-0">Belum ada formulir tersedia.</div>
                        @endforelse
                    </div>
                </div>
                <div class="card bg-dark text-white p-4 rounded-4 border-0">
                    <h5 class="fw-bold mb-3">Butuh Bantuan?</h5>
                    <p class="small">Hubungi layanan pengaduan dan informasi desa via WhatsApp (Fast Response).</p>
                    <a href="https://wa.me/6281911490798" target="_blank" class="btn btn-success w-100 fw-bold py-2">
                        <i class="bi bi-whatsapp me-2"></i> Chat Admin Desa
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
