<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Galeri;

class GaleriPublicController extends Controller
{
    public function index()
    {
        $galeri = Galeri::orderByDesc('id')->get();
        return view('public.galeri.index', compact('galeri'));
    }
}
