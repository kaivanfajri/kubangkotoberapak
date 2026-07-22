<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Panen - {{ $harvest->hasil_pertanian }}</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="bg-cover bg-center min-h-screen flex flex-col justify-center items-center pt-10"
        style="background-image: url('{{ asset('Pemandangan.jpeg') }}')">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow ">
            <div class="w-full h-full bg-center bg-no-repeat bg-cover" 
            style="background-image: url('{{ asset('backgroundpub.jpeg') }}');">
            <h1 class="text-3xl font-bold text-center py-20 text-white">Informasi Hasil Panen</h1>
            </div>
            
             <div class="flex flex-col items-center justify-center md:flex-row md:items-center md:justify-center gap-6 ">
            <div class="flex justify-center gap-4 md:justify-center">
            <img src="{{ asset('ESokan.jpeg') }}" alt="" class=" w-24 h-24 mx-auto -mt-12 border-4 border-white shadow-md hover:scale-105 transition-transform">
            <img src="{{ asset('icon.jpeg') }}" alt="" class="w-24 h-24  mx-auto -mt-12 border-4 border-white shadow-md hover:scale-105 transition-transform">
            <img src="{{ asset('Unand.png') }}" alt="" class="w-24 h-24  mx-auto -mt-12 border-4 border-white shadow-md hover:scale-105 transition-transform">
            </div>
            </div>
            
            <div class="p-8">
                <div class="grid md:grid-cols-2 gap-6 bg-neutral-100 rounded-lg text-green-700">
                    
                    <div class=" p-4 rounded-lg ">
                        <p class="text-gray-600 text-sm mb-1">kelompok tani</p>
                        <p class="text-xl font-bold text-gray-900">{{ $harvest->nama_kelompok_tani }}</p>
                    </div>
                    <div class=" p-4 rounded-lg">
                        <p class="text-gray-600 text-sm mb-1">Alamat</p>
                        <p class="text-xl font-bold text-gray-900">{{ $harvest->lokasi }}</p>
                    </div>
                    <div class=" p-4 rounded-lg">
                        <p class="text-gray-600 text-sm mb-1">Hasil Pertanian</p>
                        <p class="text-xl font-bold text-gray-900">{{ $harvest->hasil_pertanian }}</p>
                    </div>
                    <div class=" p-4 rounded-lg">
                        <p class="text-gray-600 text-sm mb-1">Varian</p>
                        <p class="text-xl font-bold text-gray-900">{{ $harvest->varian }}</p>
                    </div>
                    <div class=" p-4 rounded-lg">
                        <p class="text-gray-600 text-sm mb-1">Total panen(kg)</p>
                        <p class="text-xl font-bold text-gray-900">{{ $harvest->Total_panen }}</p>
                    </div>
                    <div class=" p-4 rounded-lg">
                        <p class="text-gray-600 text-sm mb-1">Stok tersedia(kg)</p>
                        <p class="text-xl font-bold text-gray-900">{{ $harvest->Stok_tersedia }}</p>
                    </div>
                    <div class=" p-4 rounded-lg">
                        <p class="text-gray-600 text-sm mb-1">Tanggal Panen</p>
                        <p class="text-xl font-bold text-gray-900">{{ $harvest->tanggal_panen->format('d F Y') }}</p>
                    </div>

                    <div class=" p-4 rounded-lg">
                        <p class="text-gray-600 text-sm mb-1">Nomor HP</p>
                        <p class="text-xl font-bold text-gray-900">{{ $harvest->nomor_hp }}</p>
                    </div>
                </div>
           
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.680552856706!2d100.563779!3d-1.21577!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd35538fb68881d%3A0xec799774440129c0!2sKantor%20Wali%20Nagari%20Kubang%20Koto%20berapak!5e0!3m2!1sid!2sid!4v1775002302337!5m2!1sid!2sid" class="w-full h-[350px] rounded-lg mt-6" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="mt-8 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <p class="text-sm text-green-800">
                        ✓ Data ini telah diverifikasi dan tercatat dalam sistem manajemen pertanian
                    </p>
                </div>
            </div>

            <div class="bg-gray-50 px-8 py-4 text-center text-sm text-gray-500">
                <p>Sistem Manajemen Data Pertanian</p>
                <p class="mt-1">© {{ date('Y') }}</p>
            </div>
        </div>
    </div>
    </div>
</body>
</html>