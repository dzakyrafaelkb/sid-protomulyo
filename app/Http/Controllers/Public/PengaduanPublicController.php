<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanPublicController extends Controller
{
    public function index()
    {
        return view('public.pengaduan.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required|string|max:100',
            'no_wa'       => 'required|string|max:20',
            'judul'       => 'required|string|max:200',
            'isi_laporan' => 'required|string',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
    'nama'        => $request->nama,
    'no_wa'       => $request->no_wa,
    'judul'       => $request->judul,      // ← tambahkan baris ini
    'isi_laporan' => $request->isi_laporan,
    'status'      => 'Pending',
    'tanggal'     => now(),
];

        if ($request->hasFile('foto')) {
    $fotoName = time() . '_' . str_replace(' ', '_', $request->file('foto')->getClientOriginalName());
    $request->file('foto')->move(public_path('storage/img/pengaduan'), $fotoName);
    $data['foto'] = $fotoName;
}
        Pengaduan::create($data);

        return redirect()->route('pengaduan')->with('success', 'Laporan berhasil dikirim! Kami akan menghubungi Anda melalui WhatsApp.');
    }
}
