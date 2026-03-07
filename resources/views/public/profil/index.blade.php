@extends('layouts.public')
@section('title', 'Profil Desa - Protomulyo')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Struktur Organisasi</h2>
            <p class="text-muted">Daftar lengkap perangkat desa yang melayani masyarakat Desa Protomulyo.</p>
            <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
        </div>
        @if($kades)
        <div class="row justify-content-center mb-5">
            <div class="col-md-4 text-center">
                <div class="card border-0 shadow-lg p-3 rounded-4">
                    <div class="overflow-hidden rounded-4 mb-3" style="height:400px;">
                        <img src="{{ asset('storage/img/perangkat/'.$kades->foto) }}" class="w-100 h-100" style="object-fit:cover;object-position:top;">
                    </div>
                    <h4 class="fw-bold mb-1">{{ $kades->nama }}</h4>
                    <p class="text-success fw-bold text-uppercase">{{ $kades->jabatan }}</p>
                    <div class="bg-light p-2 rounded"><small class="text-muted">NIP: {{ $kades->nip ?? '-' }}</small></div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            @forelse($staff as $s)
            <div class="col-md-3 mb-4 text-center">
                <div class="card border-0 shadow-sm p-3 rounded-4 h-100" style="transition:all 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform=''">
                    <div class="overflow-hidden rounded-circle mx-auto mb-3 shadow-sm" style="width:160px;height:160px;border:5px solid #fff;">
                        <img src="{{ asset('storage/img/perangkat/'.$s->foto) }}" class="w-100 h-100" style="object-fit:cover;">
                    </div>
                    <h6 class="fw-bold mb-1">{{ $s->nama }}</h6>
                    <p class="text-success small mb-2">{{ $s->jabatan }}</p>
                    <small class="text-muted" style="font-size:11px;">NIP: {{ $s->nip ?? '-' }}</small>
                </div>
            </div>
            @empty
            <p class="text-center text-muted">Data perangkat lainnya belum diinput.</p>
            @endforelse
        </div>
    </div>
</section>
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold mb-4">Profil Desa Protomulyo</h2>
                <p class="lead text-success fw-bold">Kecamatan Kaliwungu Selatan, Kabupaten Kendal.</p>
                <p class="text-muted" style="line-height:1.8;">Desa Protomulyo merupakan salah satu desa yang strategis di Kabupaten Kendal. Dengan masyarakat yang agamis dan menjunjung tinggi gotong royong, kami terus berinovasi untuk memajukan ekonomi desa melalui potensi UMKM dan pertanian.</p>
                <div class="row mt-4">
                    <div class="col-6">
                        <h4 class="fw-bold text-success">Visi</h4>
                        <p class="small text-muted">"Terwujudnya Desa Protomulyo yang Aman, Sehat, Cerdas, Berdaya Saing, Berbudaya, dan Berakhlaq Mulia."</p>
                    </div>
                    <div class="col-6">
                        <h4 class="fw-bold text-success">Misi</h4>
                        <ul class="small text-muted ps-3">
                            <li>Mewujudkan keamanan dan ketertiban lingkungan</li>
                            <li>Meningkatkan kesehatan dan kebersihan desa</li>
                            <li>Mewujudkan tata kelola pemerintahan yang baik</li>
                            <li>Meningkatkan kesejahteraan masyarakat</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('storage/img/icon/balaidesa.jpg') }}" class="img-fluid rounded-4 shadow" alt="Kantor Desa">
            </div>
        </div>
    </div>
</section>
@endsection
