<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;

class LayananController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::where('kategori', 'Layanan')->orderByDesc('id')->limit(5)->get();
        return view('public.layanan.index', compact('dokumen'));
    }
}
