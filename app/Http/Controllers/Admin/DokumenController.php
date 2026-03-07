<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::orderByDesc('id')->paginate(10);
        return view('admin.dokumen.index', compact('dokumen'));
    }

    public function create()
    {
        return view('admin.dokumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokumen'  => 'required|string|max:200',
            'kategori'      => 'required|string|max:100',
            'file_dokumen'  => 'required|mimes:pdf,doc,docx,xls,xlsx|max:5120',
        ]);

        $ext = $request->file('file_dokumen')->getClientOriginalExtension();
        $namaFile = 'DOC_' . time() . '.' . $ext;
       $request->file('file_dokumen')->move(public_path('storage/dokumen'), $namaFile);

        Dokumen::create([
            'nama_dokumen' => $request->nama_dokumen,
            'kategori'     => $request->kategori,
            'file'         => $namaFile,
        ]);

        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen berhasil diunggah.');
    }

    public function destroy(Dokumen $dokumen)
    {
        if ($dokumen->file) {
            Storage::delete('public/dokumen/' . $dokumen->file);
        }
        $dokumen->delete();
        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}
