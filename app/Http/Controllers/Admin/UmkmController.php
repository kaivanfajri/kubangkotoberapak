<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::latest()->paginate(10);
        return view('admin.umkm.index', compact('umkms'));
    }

    public function create()
    {
        return view('admin.umkm.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_usaha' => 'required|max:150',
            'pemilik' => 'required|max:100',
            'kategori' => 'required|max:50',
            'alamat' => 'required|max:200',
            'nomor_wa' => 'required|max:20',
            'jam_operasional' => 'nullable|max:100',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|max:2048',
            'produk_utama' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('umkm', 'public');
        }

        // Convert comma-separated products to JSON array
        if (!empty($validated['produk_utama'])) {
            $validated['produk_utama'] = json_encode(array_map('trim', explode(',', $validated['produk_utama'])));
        }

        Umkm::create($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil ditambahkan!');
    }

    public function edit(Umkm $umkm)
    {
        return view('admin.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $validated = $request->validate([
            'nama_usaha' => 'required|max:150',
            'pemilik' => 'required|max:100',
            'kategori' => 'required|max:50',
            'alamat' => 'required|max:200',
            'nomor_wa' => 'required|max:20',
            'jam_operasional' => 'nullable|max:100',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|max:2048',
            'produk_utama' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('umkm', 'public');
        }

        if (!empty($validated['produk_utama'])) {
            $validated['produk_utama'] = json_encode(array_map('trim', explode(',', $validated['produk_utama'])));
        }

        $umkm->update($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil diperbarui!');
    }

    public function destroy(Umkm $umkm)
    {
        $umkm->delete();
        return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil dihapus!');
    }
}
