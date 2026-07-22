<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Harvest;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HarvestController extends Controller
{
    public function index()
    {
        $harvests = Harvest::latest()->paginate(10);
        return view('admin.harvests.index', compact('harvests'));
    }

    public function create()
    {
        return view('admin.harvests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelompok_tani' => 'required|min:3|max:100',
            'hasil_pertanian' => 'required|max:100',
            'varian' => 'required|max:100',
            'Total_panen' => 'required|max:100',
            'Stok_tersedia' => 'required|max:100',
            'nomor_hp' => 'required|max:20',
            'tanggal_panen' => 'required|date',
            'lokasi' => 'required|max:200',
        ],
        [
            'nama_kelompok_tani.required' => 'Nama kelompok tani wajib diisi.',
            'hasil_pertanian.required' => 'Hasil pertanian wajib diisi.',
            'varian.required' => 'Varian wajib diisi.',
            'Total_panen' => 'Total panen wajib diisi ',
            'Stok_tersedia' => 'Stok tersedia wajib diisi ',
            'nomor_hp.required' => 'Nomor HP wajib diisi.',
            'tanggal_panen.required' => 'Tanggal panen wajib diisi.',
            'lokasi.required' => 'Lokasi wajib diisi.',
        ]
    );

    
    $harvest = Harvest::create($validated);
    return redirect()->route('admin.harvests.show', $harvest)
    ->with('success', 'Data berhasil disimpan!');
}
    
    public function show(Harvest $harvest)
    {
        return view('admin.harvests.show', compact('harvest'));
    }

    public function edit(Harvest $harvest)
    {
        return view('admin.harvests.edit', compact('harvest'));
    }

    public function update(Request $request, Harvest $harvest)
    {
        $validated = $request->validate([
            'nama_kelompok_tani' => 'required|min:3|max:100',
            'hasil_pertanian' => 'required|max:100',
            'varian' => 'required|max:100',
            'Total_panen' => 'required|max:100',
            'Stok_tersedia' => 'required|max:100',
            'nomor_hp' => 'required|max:20',
            'tanggal_panen' => 'required|date',
            'lokasi' => 'required|max:200',
            
        ]
        ,
        [
            'nama_kelompok_tani.required' => 'Nama kelompok tani wajib diisi.',
            'hasil_pertanian.required' => 'Hasil pertanian wajib diisi.',
            'varian.required' => 'Varian wajib diisi.',
            'Total_panen' => 'Total panen wajib diisi ',
            'Stok_tersedia' => 'Stok tersedia wajib diisi ',
            'nomor_hp.required' => 'Nomor HP wajib diisi.',
            'tanggal_panen.required' => 'Tanggal panen wajib diisi.',
            'lokasi.required' => 'Lokasi wajib diisi.',
        ]);

        $harvest->update($validated);

        return redirect()->route('admin.harvests.show', $harvest)
            ->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(Harvest $harvest)
    {
        $harvest->delete();
        return redirect()->route('admin.harvests.index')
            ->with('success', 'Data berhasil dihapus!');
    }


    
}