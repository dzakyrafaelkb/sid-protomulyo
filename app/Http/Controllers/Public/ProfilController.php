<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\PerangkatDesa;

class ProfilController extends Controller
{
    public function index()
    {
        $kades = PerangkatDesa::where('jabatan', 'like', '%Kepala Desa%')->first();
        $staff = PerangkatDesa::where('jabatan', 'not like', '%Kepala Desa%')->orderBy('id')->get();
        return view('public.profil.index', compact('kades', 'staff'));
    }

    public function sejarah()
    {
        return view('public.profil.sejarah');
    }
}
