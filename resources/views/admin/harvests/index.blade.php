@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 py-8">
        </div>
        
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif
        
        <div class="bg-white rounded-lg shadow overflow-hidden ">
            <table
            class="min-w-full divide-y divide-gray-200 border-separate border-spacing-2 border border-gray-400 dark:border-gray-500">
            <h1 class="text-3xl font-bold text-center p-6 mt-6">Data Panen</h1>
            <div class="flex justify-between items-center mb-6 ml-4">
                <a href="{{ route('admin.harvests.create') }}"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                    + Tambah Data
                </a>
                <thead class="bg-green-400">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-900 uppercase hover:bg-green-500">Nama Kelompok Tani</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-900 uppercase hover:bg-green-500">Hasil Pertanian</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-900 uppercase hover:bg-green-500">Varian</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-900 uppercase hover:bg-green-500">Total panen</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-900 uppercase hover:bg-green-500">Stok tersedia</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-900 uppercase hover:bg-green-500">Tanggal Panen</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-900 uppercase hover:bg-green-500">Nomor HP</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-900 uppercase hover:bg-green-500">Lokasi</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-900 uppercase hover:bg-green-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($harvests as $harvest)
                        <tr class="hover:bg-green-100">
                            <td class="px-6 py-4 text-center ">{{$harvest->nama_kelompok_tani}}</td>
                            <td class="px-6 py-4 text-center">{{ $harvest->hasil_pertanian }}</td>
                            <td class="px-6 py-4 text-center">{{ $harvest->varian }}</td>
                            <td class="px-6 py-4 text-center">{{ $harvest->Total_panen }}</td>
                            <td class="px-6 py-4 text-center">{{ $harvest->Stok_tersedia }}</td>
                            <td class="px-6 py-4 text-center">{{ $harvest->tanggal_panen->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-center">{{ $harvest->nomor_hp }}</td>
                            <td class="px-6 py-4 text-center">{{ $harvest->lokasi }}</td>
                            <td class="px-6 py-4 text-center items-center justify-center ml-2">
                                <div class="inline-flex gap-3">
                                    <a href="{{ route('admin.harvests.show', $harvest) }}"
                                        class="bg-green-500 px-4 py-2 rounded-lg hover:bg-green-600 transition">
                                        Lihat QR
                                    </a>

                                    <a href="{{ route('admin.harvests.edit', $harvest) }}"
                                        class="bg-blue-500 px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.harvests.destroy', $harvest) }}" method="POST"
                                        onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 px-4 py-2 rounded-lg hover:bg-red-600 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>

                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 text-center">Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $harvests->links() }}
        </div>
    </div>
@endsection