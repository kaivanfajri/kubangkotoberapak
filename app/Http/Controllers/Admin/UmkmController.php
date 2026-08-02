<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'nomor_wa' => 'nullable|max:20',
            'jam_operasional' => 'nullable|max:100',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|max:3072',
            'galeri_foto.*' => 'nullable|image|max:3072',
            'produk_utama' => 'nullable|string',
        ]);

        $photos = [];

        // Handle cover photo
        if ($request->hasFile('foto')) {
            $coverPath = $request->file('foto')->store('umkm', 'public');
            $validated['foto'] = $coverPath;
            $photos[] = $coverPath;
        }

        // Handle multiple gallery photos
        if ($request->hasFile('galeri_foto')) {
            foreach ($request->file('galeri_foto') as $file) {
                if ($file->isValid()) {
                    $photos[] = $file->store('umkm', 'public');
                }
            }
        }

        if (empty($validated['foto']) && count($photos) > 0) {
            $validated['foto'] = $photos[0];
        }

        $validated['galeri_foto'] = array_values(array_unique($photos));

        if (!empty($validated['produk_utama'])) {
            $validated['produk_utama'] = array_map('trim', explode(',', $validated['produk_utama']));
        } else {
            $validated['produk_utama'] = [];
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
            'nomor_wa' => 'nullable|max:20',
            'jam_operasional' => 'nullable|max:100',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|max:3072',
            'galeri_foto.*' => 'nullable|image|max:3072',
            'produk_utama' => 'nullable|string',
        ]);

        $existingPhotos = is_array($umkm->galeri_foto) ? $umkm->galeri_foto : [];
        if ($umkm->foto && !in_array($umkm->foto, $existingPhotos)) {
            $existingPhotos[] = $umkm->foto;
        }

        if ($request->hasFile('foto')) {
            $coverPath = $request->file('foto')->store('umkm', 'public');
            $validated['foto'] = $coverPath;
            if (!in_array($coverPath, $existingPhotos)) {
                array_unshift($existingPhotos, $coverPath);
            }
        }

        if ($request->hasFile('galeri_foto')) {
            foreach ($request->file('galeri_foto') as $file) {
                if ($file->isValid()) {
                    $existingPhotos[] = $file->store('umkm', 'public');
                }
            }
        }

        if (empty($validated['foto']) && count($existingPhotos) > 0) {
            $validated['foto'] = $existingPhotos[0];
        }

        $validated['galeri_foto'] = array_values(array_unique($existingPhotos));

        if (!empty($validated['produk_utama'])) {
            $validated['produk_utama'] = array_map('trim', explode(',', $validated['produk_utama']));
        } else {
            $validated['produk_utama'] = [];
        }

        $umkm->update($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil diperbarui!');
    }

    public function destroy(Umkm $umkm)
    {
        $allPhotos = is_array($umkm->galeri_foto) ? $umkm->galeri_foto : [];
        if ($umkm->foto && !in_array($umkm->foto, $allPhotos)) {
            $allPhotos[] = $umkm->foto;
        }

        foreach ($allPhotos as $photo) {
            if ($photo && Storage::disk('public')->exists($photo)) {
                Storage::disk('public')->delete($photo);
            }
        }

        $umkm->delete();
        return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil dihapus!');
    }
}
