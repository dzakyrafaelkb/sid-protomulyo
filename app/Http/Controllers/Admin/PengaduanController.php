<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::orderByDesc('tanggal')->paginate(10);
        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Proses,Selesai',
        ]);

        Pengaduan::findOrFail($id)->update(['status' => $request->status]);
        return redirect()->route('admin.pengaduan.index')->with('success', 'Status pengaduan berhasil diperbarui.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->foto) {
            Storage::delete('public/img/pengaduan/' . $pengaduan->foto);
        }
        $pengaduan->delete();
        return redirect()->route('admin.pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
