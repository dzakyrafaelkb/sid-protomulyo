<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\Berita;
use App\Models\Dokumen;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPenduduk = Penduduk::count();
        $totalBerita = Berita::count();
        $totalDokumen = Dokumen::count();
        $pengaduanPending = Pengaduan::where('status', 'Pending')->count();

        $lakiLaki = Penduduk::where('jenis_kelamin', 'L')->count();
        $perempuan = Penduduk::where('jenis_kelamin', 'P')->count();

        $pekerjaan = Penduduk::selectRaw('pekerjaan, COUNT(*) as jumlah')
            ->groupBy('pekerjaan')
            ->orderByDesc('jumlah')
            ->limit(5)
            ->get();

        $pendudukTerbaru = Penduduk::orderByDesc('id')->limit(5)->get();

        return view('admin.dashboard', compact(
            'totalPenduduk', 'totalBerita', 'totalDokumen', 'pengaduanPending',
            'lakiLaki', 'perempuan', 'pekerjaan', 'pendudukTerbaru'
        ));
    }
}
