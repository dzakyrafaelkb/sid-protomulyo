<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;

class BeritaPublicController extends Controller
{
    public function index()
    {
        $berita = Berita::orderByDesc('tanggal')->paginate(9);
        return view('public.berita.index', compact('berita'));
    }

    public function show($id)
    {
        $b = DB::table('berita')
            ->leftJoin('users', 'berita.penulis_id', '=', 'users.id')
            ->select('berita.*', 'users.nama_lengkap')
            ->where('berita.id', $id)
            ->first();

        if (!$b) return redirect()->route('berita');

        return view('public.berita.detail', compact('b'));
    }
}
