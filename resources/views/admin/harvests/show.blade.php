@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl ">
    
    
    <div class="bg-white rounded-lg shadow p-6 mb-6 hover:shadow-xl transition-shadow mt-6 ">
        <h1 class="text-3xl font-bold mb-6 text-center">Detail Data Panen</h1>
        @if(session('success'))
        <div class=" bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <p class="text-gray-600 text-sm">Nama Kelompok Tani</p>
                <p class="font-semibold">{{ $harvest->nama_kelompok_tani}}</p>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Hasil Pertanian</p>
                <p class="font-semibold">{{ $harvest->hasil_pertanian }}</p>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Varian</p>
                <p class="font-semibold">{{ $harvest->varian }}</p>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Total Panen</p>
                <p class="font-semibold">{{ $harvest->Total_panen }}</p>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Stok tersedia</p>
                <p class="font-semibold">{{ $harvest->Stok_tersedia }}</p>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Nomor HP</p>
                <p class="font-semibold">{{ $harvest->nomor_hp }}</p>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Tanggal Panen</p>
                <p class="font-semibold">{{ $harvest->tanggal_panen->format('d F Y') }}</p>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Lokasi</p>
                <p class="font-semibold">{{ $harvest->lokasi }}</p>
            </div>
        </div>

        <div class="border-t pt-6">
            <h3 class="font-semibold mb-4 text-center">QR Code</h3>
            <div id="qr" class="flex justify-center mb-4">
               {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(250)->generate(route('harvest.public', $harvest->public_code)) !!}
            </div>
            <p class="text-center text-sm text-gray-600">Scan QR Code untuk melihat info publik</p>
            <p class="text-center text-xs text-gray-500 mt-2">
                {{ route('harvest.public', $harvest->public_code) }}
            </p> 
            @auth   
            @endauth
        </div>

        <div class="flex gap-3 mt-6">
            <a href="{{ route('admin.harvests.edit', $harvest) }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Edit Data
            </a>
            <a href="{{ route('admin.harvests.index') }}" 
               class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">
                Kembali
            </a>
           <a href="{{ route('harvest.public', $harvest->public_code) }}" target="_blank"
             class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
            Lihat Halaman Publik
            </a>
            <button onclick="downloadQR()" 
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                Unduh QR Code
            </button>
        </div>
    </div>
</div>
<script>
    function downloadQR() {
        const svg = document.querySelector('#qr svg');
        const serializer = new XMLSerializer();
        const source = serializer.serializeToString(svg);
        
        const size = 300;      
        const padding = 20;   
        const border = 4;      
        
        const canvas = document.createElement('canvas');
        canvas.width = size;
        canvas.height = size;
        
        const ctx = canvas.getContext('2d');
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, size, size);
        const img = new Image();
        img.onload = function () {
            const qrSize = size - (padding * 2);
            ctx.drawImage(img, padding, padding, qrSize, qrSize);
            ctx.strokeStyle = '#000000';
            ctx.lineWidth = border;
            ctx.strokeRect(
                border / 2,
                border / 2,
                size - border,
                size - border
            );
            const a = document.createElement('a');
            a.download = 'qr-code.png';
            a.href = canvas.toDataURL('image/png');
            a.click();
                     
        };
        img.src = 'data:image/svg+xml;base64,' + btoa(unescape(encodeURIComponent(source)));
    }
</script>
@endsection