<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::orderByDesc('tanggal')->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required|string|max:200',
            'isi'    => 'required|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarName = date('YmdHis') . '.' . $request->file('gambar')->getClientOriginalExtension();
        $request->file('gambar')->storeAs('public/img/berita', $gambarName);

        Berita::create([
            'judul'      => $request->judul,
            'isi'        => $request->isi,
            'gambar'     => $gambarName,
            'penulis_id' => session('admin')['id'],
            'tanggal'    => now(),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diterbitkan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul'  => 'required|string|max:200',
            'isi'    => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['judul', 'isi']);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($berita->gambar) {
                Storage::delete('public/img/berita/' . $berita->gambar);
            }
            $gambarName = date('YmdHis') . '.' . $request->file('gambar')->getClientOriginalExtension();
           $request->file('gambar')->move(public_path('storage/img/berita'), $gambarName);
            $data['gambar'] = $gambarName;
        }

        $berita->update($data);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::delete('public/img/berita/' . $berita->gambar);
        }
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
