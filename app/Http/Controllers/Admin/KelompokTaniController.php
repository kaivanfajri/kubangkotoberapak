<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KelompokTani;
use Illuminate\Http\Request;

class KelompokTaniController extends Controller
{
    public function index()
    {
        $kelompokTanis = KelompokTani::latest()->paginate(10);
        return view('admin.kelompok-tani.index', compact('kelompokTanis'));
    }

    public function create()
    {
        return view('admin.kelompok-tani.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelompok' => 'required|max:100',
            'ketua' => 'required|max:100',
            'jorong' => 'required|max:100',
            'jumlah_anggota' => 'required|integer|min:1',
            'luas_lahan' => 'required|max:50',
            'komoditas_utama' => 'required|max:100',
            'produktivitas' => 'required|max:50',
            'status' => 'required|in:Aktif,Non-Aktif',
        ]);

        KelompokTani::create($validated);

        return redirect()->route('admin.kelompok-tani.index')->with('success', 'Data kelompok tani berhasil ditambahkan!');
    }

    public function edit(KelompokTani $kelompokTani)
    {
        return view('admin.kelompok-tani.edit', compact('kelompokTani'));
    }

    public function update(Request $request, KelompokTani $kelompokTani)
    {
        $validated = $request->validate([
            'nama_kelompok' => 'required|max:100',
            'ketua' => 'required|max:100',
            'jorong' => 'required|max:100',
            'jumlah_anggota' => 'required|integer|min:1',
            'luas_lahan' => 'required|max:50',
            'komoditas_utama' => 'required|max:100',
            'produktivitas' => 'required|max:50',
            'status' => 'required|in:Aktif,Non-Aktif',
        ]);

        $kelompokTani->update($validated);

        return redirect()->route('admin.kelompok-tani.index')->with('success', 'Data kelompok tani berhasil diperbarui!');
    }

    public function destroy(KelompokTani $kelompokTani)
    {
        $kelompokTani->delete();
        return redirect()->route('admin.kelompok-tani.index')->with('success', 'Data kelompok tani berhasil dihapus!');
    }
}
