<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatController extends Controller
{
    public function index()
    {
        $perangkat = PerangkatDesa::all();
        return view('admin.perangkat.index', compact('perangkat'));
    }

    public function create()
    {
        return view('admin.perangkat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'nip'     => 'nullable|string|max:20',
            'foto'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoName = 'perangkat_' . date('YmdHis') . '.' . $request->file('foto')->getClientOriginalExtension();
        $request->file('foto')->storeAs('public/img/perangkat', $fotoName);

        PerangkatDesa::create([
            'nama'    => $request->nama,
            'jabatan' => $request->jabatan,
            'nip'     => $request->nip,
            'foto'    => $fotoName,
        ]);

        return redirect()->route('admin.perangkat.index')->with('success', 'Data perangkat desa berhasil ditambahkan.');
    }

    public function edit(PerangkatDesa $perangkat)
    {
        return view('admin.perangkat.edit', compact('perangkat'));
    }

    public function update(Request $request, PerangkatDesa $perangkat)
    {
        $request->validate([
            'nama'    => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'nip'     => 'nullable|string|max:20',
            'foto'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama', 'jabatan', 'nip']);

        if ($request->hasFile('foto')) {
            if ($perangkat->foto) {
                Storage::delete('public/img/perangkat/' . $perangkat->foto);
            }
            $fotoName = 'perangkat_' . date('YmdHis') . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move(public_path('storage/img/perangkat'), $fotoName);
            $data['foto'] = $fotoName;
        }

        $perangkat->update($data);
        return redirect()->route('admin.perangkat.index')->with('success', 'Data perangkat desa berhasil diperbarui.');
    }

    public function destroy(PerangkatDesa $perangkat)
    {
        if ($perangkat->foto) {
            Storage::delete('public/img/perangkat/' . $perangkat->foto);
        }
        $perangkat->delete();
        return redirect()->route('admin.perangkat.index')->with('success', 'Data perangkat desa berhasil dihapus.');
    }
}
