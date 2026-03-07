<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index(Request $request)
    {
        $query = Penduduk::query();
        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('nama', 'like', "%$cari%")
                  ->orWhere('nik', 'like', "%$cari%");
            });
        }
        $penduduk = $query->orderByDesc('id')->paginate(15)->withQueryString();
        return view('admin.penduduk.index', compact('penduduk'));
    }

    public function create()
    {
        return view('admin.penduduk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik'          => 'required|digits:16|unique:penduduk,nik',
            'nama'         => 'required|string|max:100',
            'jenis_kelamin'=> 'required|in:L,P',
            'rt'           => 'required|string|max:5',
            'rw'           => 'required|string|max:5',
            'pekerjaan'    => 'nullable|string|max:100',
        ]);

        Penduduk::create($request->only(['nik', 'nama', 'jenis_kelamin', 'rt', 'rw', 'pekerjaan']));
        return redirect()->route('admin.penduduk.index')->with('success', 'Data penduduk berhasil ditambahkan.');
    }

    public function edit(Penduduk $penduduk)
    {
        return view('admin.penduduk.edit', compact('penduduk'));
    }

    public function update(Request $request, Penduduk $penduduk)
    {
        $request->validate([
            'nik'          => 'required|digits:16|unique:penduduk,nik,' . $penduduk->id,
            'nama'         => 'required|string|max:100',
            'jenis_kelamin'=> 'required|in:L,P',
            'rt'           => 'required|string|max:5',
            'rw'           => 'required|string|max:5',
            'pekerjaan'    => 'nullable|string|max:100',
        ]);

        $penduduk->update($request->only(['nik', 'nama', 'jenis_kelamin', 'rt', 'rw', 'pekerjaan']));
        return redirect()->route('admin.penduduk.index')->with('success', 'Data penduduk berhasil diperbarui.');
    }

    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();
        return redirect()->route('admin.penduduk.index')->with('success', 'Data penduduk berhasil dihapus.');
    }
}
