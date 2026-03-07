<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::orderByDesc('tanggal')->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:200',
            'tanggal' => 'required|date',
            'foto'    => 'required|image|mimes:jpg,jpeg,png|max:3072',
        ]);

        $fotoName = date('YmdHis') . '_' . $request->file('foto')->getClientOriginalName();
       $request->file('foto')->move(public_path('storage/img/galeri'), $fotoName);

        Galeri::create([
            'judul'   => $request->judul,
            'foto'    => $fotoName,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul'   => 'required|string|max:200',
            'tanggal' => 'required|date',
            'foto'    => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
        ]);

        $data = $request->only(['judul', 'tanggal']);

        if ($request->hasFile('foto')) {
            if ($galeri->foto) {
                Storage::delete('public/img/galeri/' . $galeri->foto);
            }
            $fotoName = date('YmdHis') . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->storeAs('public/img/galeri', $fotoName);
            $data['foto'] = $fotoName;
        }

        $galeri->update($data);
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->foto) {
            Storage::delete('public/img/galeri/' . $galeri->foto);
        }
        $galeri->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}
