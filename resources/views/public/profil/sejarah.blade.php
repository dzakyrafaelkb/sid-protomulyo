@extends('layouts.public')
@section('title', 'Sejarah Desa - Protomulyo')
@section('content')
<section class="py-5 bg-success text-white text-center">
    <div class="container">
        <h1 class="fw-bold mt-2">Sejarah Desa Protomulyo</h1>
        <p class="lead">Asal usul dan perjalanan sejarah desa dari masa ke masa</p>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4">
                    <p>Nama <strong>Protomulyo</strong> berasal dari dua kata bahasa Jawa, yaitu <em>"Proto"</em> yang berarti awal atau pertama, dan <em>"Mulyo"</em> yang berarti kemuliaan atau kesejahteraan. Secara filosofis, Protomulyo mengandung harapan para leluhur agar desa ini menjadi tempat pertama yang memberikan kemuliaan bagi seluruh warganya.</p>
                    <h3 class="fw-bold text-success mt-4 mb-3">Perjalanan Masa ke Masa</h3>
                    <p>Desa Protomulyo yang terletak di wilayah Kaliwungu Selatan memiliki sejarah panjang sebagai wilayah agraris. Sejak jaman dahulu, wilayah ini dikenal subur dan menjadi lumbung pangan di daerah sekitarnya. Seiring berjalannya waktu, desa ini bertransformasi menjadi desa yang modern namun tetap memegang teguh nilai-nilai budaya Jawa dan gotong royong.</p>
                    <div class="p-4 bg-light rounded-4 border-start border-success border-4 my-4">
                        <h5 class="fw-bold fst-italic">"Memperingati sejarah bukan hanya tentang menatap masa lalu, tapi tentang mengambil hikmah untuk membangun Protomulyo yang lebih maju."</h5>
                    </div>
                    <h3 class="fw-bold text-success mt-4 mb-3">Tokoh Pendiri</h3>
                    <p>Masyarakat Protomulyo secara turun-temurun menghormati para tokoh pembabat alas yang telah berjasa membangun pemukiman awal. Hingga saat ini, nilai-nilai kepemimpinan yang amanah terus diteruskan oleh setiap Kepala Desa yang menjabat.</p>
                    <hr class="my-5">
                    <h3 class="fw-bold text-success text-center mb-4">Garis Waktu Sejarah</h3>
                    @foreach([['1950-an','Pembentukan Wilayah','Awal mula penggabungan beberapa pedukuhan menjadi satu administrasi Desa Protomulyo.'],['1980-an','Pembangunan Balai Desa','Pusat pemerintahan desa mulai dibangun secara permanen untuk meningkatkan pelayanan warga.'],['Sekarang','Era Digital','Transformasi Protomulyo menjadi desa digital dengan layanan mandiri online.']] as [$tahun,$judul,$ket])
                    <div class="d-flex mb-4">
                        <div class="me-3 text-success fw-bold" style="min-width:80px;">{{ $tahun }}</div>
                        <div class="border-start border-2 border-success ps-3">
                            <h6 class="fw-bold mb-1">{{ $judul }}</h6>
                            <p class="small text-muted mb-0">{{ $ket }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
