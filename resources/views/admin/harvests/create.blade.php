@extends('layouts.admin')
@section('content')
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <div class="rounded-lg shadow p-6 bg-white">
            <form action="{{ route('admin.harvests.store') }}" method="POST">
                @csrf
                <div class="rounded-lg">
                    <h1 class=" text-3xl font-bold mb-6 text-center p-6">Tambah Data Panen</h1>
                    <div class="mt-18">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Nama Kelompok Tani</label>
                            <input type="text" name="nama_kelompok_tani" value="{{ old('nama_kelompok_tani') }}"
                                class="w-full px-4 py-2 border rounded-lg @error('nama_kelompok_tani') border-red-500 @enderror"
                                placeholder="Masukkan nama kelompok tani">
                            @error('nama_kelompok_tani')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Hasil Pertanian</label>
                            <input type="text" name="hasil_pertanian" value="{{ old('hasil_pertanian') }}"
                                class="w-full px-4 py-2 border rounded-lg @error('hasil_pertanian') border-red-500 @enderror"
                                placeholder="Contoh: Padi, Jagung, Cabai">
                            @error('hasil_pertanian')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Varian</label>
                            <input type="text" name="varian" value="{{ old('varian') }}"
                                class="w-full px-4 py-2 border rounded-lg @error('varian') border-red-500 @enderror"
                                placeholder="Contoh:  ketan, wangi, merah">
                            @error('varian')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Total panen(kg)</label>
                            <input type="text" name="Total_panen" value="{{ old('Total_panen') }}"
                                class="w-full px-4 py-2 border rounded-lg @error('Total_panen') border-red-500 @enderror"
                                placeholder="Contoh:  10 ,100 ,1000">
                            @error('Total_panen')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Stok tersedia(kg)</label>
                            <input type="text" name="Stok_tersedia" value="{{ old('Stok_tersedia') }}"
                                class="w-full px-4 py-2 border rounded-lg @error('Stok_tersedia') border-red-500 @enderror"
                                placeholder="Contoh:  10 ,100 ,1000">
                            @error('Stok_tersedia')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">nomor hp</label>
                            <input type="text" name="nomor_hp" value="{{ old('nomor_hp') }}"
                                class="w-full px-4 py-2 border rounded-lg @error('nomor_hp') border-red-500 @enderror"
                                placeholder="Contoh: 08123456789">
                            @error('nomor_hp')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Tanggal Panen</label>
                            <input type="date" name="tanggal_panen" value="{{ old('tanggal_panen') }}"
                                class="w-full px-4 py-2 border rounded-lg @error('tanggal_panen') border-red-500 @enderror">
                            @error('tanggal_panen')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
        
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Lokasi</label>
                            <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                                class="w-full px-4 py-2 border rounded-lg @error('lokasi') border-red-500 @enderror"
                                placeholder="Contoh: Desa Sukamaju, Kec. Rancabali">
                            @error('lokasi')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="bg-green-600 text-green px-6 py-2 rounded-lg
               hover:bg-green-700 transition">
                        Simpan Data
                    </button>

                    <a href="{{ route('admin.harvests.index') }}"
                        class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection