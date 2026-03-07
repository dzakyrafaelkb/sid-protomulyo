<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\Berita;
use App\Models\PerangkatDesa;

class HomeController extends Controller
{
    public function index()
    {
        $totalWarga    = Penduduk::count();
        $totalLaki     = Penduduk::where('jenis_kelamin', 'L')->count();
        $totalPerempuan= Penduduk::where('jenis_kelamin', 'P')->count();

        $pekerjaan = Penduduk::selectRaw('pekerjaan, COUNT(*) as jumlah')
            ->groupBy('pekerjaan')->orderByDesc('jumlah')->limit(5)->get();

        $beritaTerbaru = Berita::orderByDesc('tanggal')->limit(3)->get();

        $kades = PerangkatDesa::where('jabatan', 'like', '%Kepala Desa%')->first();

        return view('public.home', compact(
            'totalWarga', 'totalLaki', 'totalPerempuan',
            'pekerjaan', 'beritaTerbaru', 'kades'
        ));
    }
}
