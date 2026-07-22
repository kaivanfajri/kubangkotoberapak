@extends('layouts.nagari')

@section('title', 'Home')

@section('content')
    <div id="slider" class="relative overflow-hidden mb-20 h-[600px] md:h-[900px]">
        <img src="{{ asset('Profil2.JPG') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000">
        <img src="{{ asset('Profil3.JPG') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">
        <img src="{{ asset('Pemandangan.jpeg') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">
        <div class="absolute inset-0 bg-gradient-to-b from-green-900/50 via-transparent to-yellow-500/30"></div>
        <div id="typing-text"
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl sm:text-3xl md:text-5xl text-white px-6 sm:px-8 py-4 sm:py-6 rounded-2xl font-bold text-center max-w-[90%] bg-green-800/70 backdrop-blur-sm shadow-2xl border-4 border-yellow-400">
        </div>
    </div>

    <div class="mx-auto max-w-screen-lg rounded-2xl bg-gradient-to-r from-green-50 to-yellow-50 p-6 shadow-xl hover:shadow-2xl transition-all duration-300 border-2 border-yellow-300" data-aos="flip-up">
        <div class="flex flex-col items-center gap-6 md:flex-row ">
            <div class="flex justify-center gap-4 md:justify-start">
                <img src="{{ asset('ESokan.jpeg') }}" alt="" class="h-20 w-20 rounded-full border-4 border-yellow-400 shadow-lg hover:scale-110 transition-transform">
                <img src="{{ asset('Unand.png') }}" alt="" class="h-20 w-20 rounded-full border-4 border-green-500 shadow-lg hover:scale-110 transition-transform">
                <img src="{{ asset('icon.jpeg') }}" alt="" class="h-20 w-20 rounded-full border-4 border-yellow-400 shadow-lg hover:scale-110 transition-transform">
            </div>

            <div class="flex-1 text-center md:text-left md:ml-8">
                <div class="inline-block bg-yellow-400 text-green-800 px-4 py-2 rounded-full text-xs font-bold mb-2">
                    KOLABORASI
                </div>
                <h2 class="text-base md:text-lg font-semibold text-green-800 leading-relaxed">
                    Program ini dilaksanakan melalui kolaborasi mahasiswa KKN Unand dengan pemerintah
                    daerah Kubang Bayang Koto Barapak, Pesisir Selatan
                </h2>
            </div>
        </div>
    </div>




    <div class="bg-gradient-to-b to-white py-12 mt-24">
        <div class=" mt-8" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <div class="max-w-6xl mx-auto px-8">
                <h2 class="text-3xl font-bold text-green-600 mb-6 text-center">Selamat Datang di Nagari Kubang Bayang</h2>
                <p class="text-green-800 text-lg leading-relaxed text-justify mt-4">
                    Nagari Kubang Koto Berapak merupakan salah satu nagari yang berada di Kecamatan Bayang, Kabupaten
                    Pesisir Selatan, Provinsi Sumatera Barat.Nagari Kubang Koto Berapak terdiri dari 2 Kampung yaitu Kampung
                    Kubang dan Kampung Lembah Gumanti.Secara geografis, Nagari Kubang Koto Berapak memiliki bentang alam
                    yang relatif mendukung kegiatan pertanian sawah. Ketersediaan lahan dataran rendah yang cukup luas,
                    kesuburan tanah, serta dukungan sumber air dari aliran sungai dan jaringan irigasi tradisional maupun
                    teknis menjadikan nagari ini sangat potensial untuk pengembangan tanaman padi.
                </p>
            </div>
        </div>
        
        <div class=" mt-24" data-aos="fade-up">
            <div class="max-w-6xl mx-auto px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 text-green-800 text-lg mt-24">
                    <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                        <h1 class="font-bold text-3xl ">Visi</h1>
                        <p class="mt-4">
                        Terwujudnya Nagari Kubang Koto Berapak sebagai Nagari mandiri, dan bersatu dalam mensejahterakan masyarakat
                        </p>
                    </div>
            
                    <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl" data-aos="fade-up"data-aos-anchor-placement="center-bottom">
                        <h1 class="font-bold text-3xl">Misi</h1>
                        <p class="mt-4">a. Mewujudkan penyelenggaraan pemerintahan yang baik dan transparan.</p>
                        <p>b. Mewujudkan sistem perekonomian berbasis ekonomi kerakyatan serta penguatan lembaga ekonomi Nagari.</p>
                        <p>c. Peningkatan pembangunan infrastruktur sarana dan prasarana fasilitas umum Nagari.</p>
                        <p>d. Peningkatan kualitas sumber daya manusia serta pemahaman dan pengalaman norma-norma agama dan adat istiadat.</p>
                        <p>e. Peningkatkan derajat kualitas kesehatan masyarakat serta penataan lingkungan yang bersih dan sehat.</p>
                        <p>f. Peningkatan kualitas pendidikan masyarakat nagari</p>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <div class="bg-yellow-400 py-20 mt-24 text-center rounded-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 shadow-xl hover:shadow-2xl transition-all duration-300"
            data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <div class="max-w-6xl mx-auto px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-7">
                    <div class=" p-6 rounded-lg ">
                        <h3 class="text-xl font-bold text-green-600 mb-2">Jumlah penduduk</h3>
                        <p class="text-green-700 text-3xl font-bold">1712 jiwa</p>
                    </div>
                    <div class=" p-6 rounded-lg ">
                        <h3 class="text-xl font-bold text-green-600 mb-2">Luas Lahan Nagari</h3>
                        <p class="text-green-700 text-3xl font-bold">907 Ha</p>
                    </div>
                    <div class=" p-6 rounded-lg ">
                        <h3 class="text-xl font-bold text-green-600 mb-2">Jumlah kepala keluarga</h3>
                        <p class="text-green-700 text-3xl font-bold">486 KK</p>
                    </div>
                    <div class=" p-6 rounded-lg ">
                        <h3 class="text-xl font-bold text-green-600 mb-2">Jumlah fasilitas Ibadah</h3>
                        <p class="text-green-700 text-3xl font-bold">5</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="">
                    <h1 class="text-3xl font-bold text-green-600 mb-6 text-center mt-24" data-aos="fade-up" data-aos-anchor-placement="center-bottom">Video Sokan Kubang</h1>
                    <div class=" gap-8 ">
                        <div class=" p-6 mb-6 items-center justify-center flex">
                            <iframe width="1000" height="630" src="https://www.youtube.com/embed/aQ5y-pAzR8k?si=L4l5pdHscOSrjHPA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen data-aos="fade-up" data-aos-anchor-placement="center-bottom"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-24 py-8 ">
            <h2 class="text-3xl font-bold text-green-600 mb-6 text-center" data-aos="fade-up"
                data-aos-anchor-placement="center-bottom">Informasi Wilayah Nagari</h2>
        </div>
        <div class="" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 ">
                <div class="bg-green-100 rounded-lg shadow-lg items-center">
                    <h2 class="text-3xl font-bold text-green-600  p-8 text-center ">Peta potensi nagari</h2>
                    <div class=" gap-8 ">

                        <div class=" p-6 mb-6 items-center justify-center flex ">
                            <img src="{{ asset('Peta potensi nagari.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="bg-green-100 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold text-green-600 p-8 text-center ">Peta Topografi nagari</h2>
                    <div class=" gap-8 ">
                        <div class=" p-6 mb-6 items-center justify-center flex">
                            <img src="{{ asset('peta topografi.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="bg-green-100 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold text-green-600  p-8 text-center ">Peta Wilayah pertanian</h2>
                    <div class=" gap-8 ">
                        <div class=" p-6 mb-6 items-center justify-center flex">
                            <img src="{{ asset('Peta wilayah pertanian nagari.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="bg-green-100 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold text-green-600  p-8 text-center ">Peta Rawan Bencana nagari</h2>
                    <div class="gap-8 ">
                        <div class=" p-6 mb-6 items-center justify-center flex">
                            <img src="{{ asset('Peta rawan kebencanaan.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="mt-8">
            <div class="max-w-6xl mx-auto px-8 mt-24">
                <h2 class="text-3xl font-bold text-green-600 mb-6 text-center" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">Kegiatan Nagari</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl" data-aos="fade-up"
                        data-aos-anchor-placement="center-bottom">
                        <h3 class="text-xl font-bold text-green-600 mb-2 text-center">Tradisi Makan Balanjuang sebagai Perekat Sosial</h3>
                        <p class="text-green-600">
                            Ritual makan bersama secara bergotong-royong dengan hidangan bersama dalam satu wadah adalah simbol nyata kesetaraan,
                            keakraban, dan kegotongroyongan. Tradisi ini berperan sebagai perekat hubungan sosial yang mendalam antarmasyarakat, memperkuat
                            kohesi dan rasa kekeluargaan dalam nagari.
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl" data-aos="fade-up"
                        data-aos-anchor-placement="center-bottom">
                        <h3 class="text-xl font-bold text-green-600 mb-2 text-center ">Latihan Randai Setiap Malam Minggu</h3>
                        <p class="text-green-600">
                             Setiap akhir pekan, nagari menghidupkan warisan budayanya melalui latihan randai (teater tradisional Minangkabau). Kegiatan
                             ini berfungsi sebagai wadah pelestarian seni, pelatihan bagi generasi muda dalam seni peran dan musik tradisional, serta
                             penguatan identitas budaya lokal.
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl" data-aos="fade-up"
                        data-aos-anchor-placement="center-bottom">
                        <h3 class="text-xl font-bold text-green-600 mb-2 text-center">Permainan olahraga Bola Voli Setiap Sore</h3>
                        <p class="text-green-600">
                            Lapangan nagari menjadi pusat keakraban dan kebugaran setiap sore melalui kegiatan bola voli.
                            Aktivitas ini tidak hanya untuk olahraga, tetapi juga sebagai sarana pelepas penat, pembangun semangat kebersamaan, dan
                            sportivitas antarwarga.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
        const text = "Selamat Datang \nDiwebsite Nagari Kubang Koto Berapak Pesisir Selatan, Sumatera Barat";
        const speed = 100;
        let index = 0;

        function typeEffect() {
            if (index < text.length) {
                document.getElementById("typing-text").textContent += text.charAt(index);
                index++;
                setTimeout(typeEffect, speed);
            }
        }

        typeEffect();

        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('#slider .slide');
            let current = 0;
            const interval = 3000;

            setInterval(() => {
                slides[current].classList.replace('opacity-100', 'opacity-0');
                current = (current + 1) % slides.length;
                slides[current].classList.replace('opacity-0', 'opacity-100');
            }, interval);
        });
    </script>

    @include('layouts.footer')
@endsection