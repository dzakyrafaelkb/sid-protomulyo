<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class CekNikController extends Controller
{
    public function index()
    {
        return view('public.cek_nik');
    }

    public function cek(Request $request)
    {
        $request->validate(['nik' => 'required|digits:16']);

        $data = Penduduk::where('nik', $request->nik)->first();

        return view('public.cek_nik', compact('data'))->with('sudahCek', true);
    }
}
