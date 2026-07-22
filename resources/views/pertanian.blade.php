@extends('layouts.nagari')

@section('title', 'Pertanian di Nagari Kubang Bayang')

@section('content')

    <div id="slider" class="relative overflow-hidden mb-20 h-[600px] md:h-[900px]">
         <img src="{{ asset('pertanian1.JPG') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000">
        <img src="{{ asset('Pertanian2.jpeg') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">
        <img src="{{ asset('Pertanian3.JPG') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">
        <img src="{{ asset('Pertanian4.JPG') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">
        <img src="{{ asset('Pertanian5.JPG') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">
        <img src="{{ asset('Pertanian6.JPG') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">
        <img src="{{ asset('Pertanian7.JPG') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">
        <div class="absolute inset-0 bg-gradient-to-b from-green-900/50 via-transparent to-yellow-500/30"></div>
        <div id="typing-text"
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl sm:text-3xl md:text-5xl text-white px-6 sm:px-8 py-4 sm:py-6 rounded-2xl font-bold text-center max-w-[90%] bg-green-800/70 backdrop-blur-sm shadow-2xl border-4 border-yellow-400">
        </div>
    </div>
        </div>
        <div class="absolute top-1 left-1/2 -translate-x-1/2 text-green-900 px-4 py-3 font-bold">
        </div>
    </div>
    

    <div class="bg-gradient-to-b to-white py-12 mt-24">
        <div class=" mt-8">
            <div class="max-w-6xl mx-auto px-8">
                <h2 class="text-3xl font-bold text-green-600 mb-6 text-center" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">Pertanian di Nagari Kubang Bayang</h2>
                <p class="text-green-800 text-lg leading-relaxed text-justify mt-4" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    Nagari Kubang Koto Berapak merupakan salah satu nagari yang berada di
                    Kecamatan Bayang, Kabupaten Pesisir Selatan, Provinsi Sumatera Barat.
                    Secara geografis, Nagari Kubang Koto Berapak memiliki bentang alam
                    yang relatif mendukung kegiatan pertanian sawah. Ketersediaan lahan dataran
                    rendah yang cukup luas, kesuburan tanah, serta dukungan sumber air dari aliran
                    sungai dan jaringan irigasi tradisional maupun teknis menjadikan nagari ini sangat
                    potensial untuk pengembangan tanaman padi.
                </p>
                <P class="text-green-800 text-lg leading-relaxed text-justify mt-4" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">Sektor pertanian padi merupakan unggulan utama Nagari Kubang
                    Koto
                    Berapak. Sebagian besar masyarakat berprofesi sebagai petani sawah, baik sebagai
                    pemilik lahan maupun penggarap. Sistem pertanian yang diterapkan masih
                    didominasi oleh pola tanam padi sawah dengan kearifan lokal yang diwariskan
                    secara turun-temurun, seperti pengelolaan air, pemilihan varietas padi lokal maupun
                    unggul, serta penerapan sistem gotong royong dalam pengolahan lahan dan panen.
                    Hasil produksi beras dari nagari ini tidak hanya dimanfaatkan untuk kebutuhan
                    konsumsi rumah tangga, tetapi juga dipasarkan ke wilayah sekitar.
                    Selain sebagai sumber ekonomi utama, persawahan di Nagari Kubang Koto
                    Berapak juga memiliki nilai sosial dan budaya yang kuat. Aktivitas bertani padi
                    tidak terlepas dari tradisi adat dan kebiasaan masyarakat.Dengan potensi persawahan yang dimiliki,
                    Nagari Kubang Koto Berapak memiliki peluang besar untuk dikembangkan sebagai nagari sentra produksi
                    beras di Kecamatan Bayang. </P>
                <P class="text-green-800 text-lg leading-relaxed text-justify mt-4" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    Di nagari kubang terdiri dari 7 kelompok tani yang aktif dalam mengelola lahan
                    pertanian padi sawah. Kelompok tani ini berperan penting
                    dalam meningkatkan produktivitas pertanian melalui penerapan teknologi tepat guna.
                </P>

            </div>
        </div>
    </div>
     <div class="p-12 mb-20 slider">
        <div class=" max-w-6xl mx-auto px-8 mt-24 slider-track">
            <h2 class="text-3xl font-bold text-green-600 mb-6 text-center" data-aos="fade-up"
                data-aos-anchor-placement="center-bottom">Komoditi</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 ">

                <div  onclick="openModal()" class="cursor-pointer bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">1.Padi</h3>
                    <img src="Durian taba.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">
                        Komoditas Pangan Utama Lahan Basah Padi Varietas Cisokan adalah tulang punggung ketahanan pangan Nagari Kubang. Ditanam di sawah
                        dengan sistem irigasi yang baik, padi ini dikenal dengan produktivitas tinggi, ketahanan terhadap hama tertentu, dan kualitas beras
                        yang perah. Panen padi menjadi momen penting dalam kalender pertanian kami, yang kemudian diikuti dengan pola tanam kreatif untuk
                        optimalisasi lahan.
                        </p>
                       
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">2.Semangka</h3>
                    <img src="Komoditi2.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">
                           Strategi Hortikultura Musiman yang Cerdas Setelah panen padi, petani Kubang memanfaatkan lahan sawah untuk menanam semangka dengan timing yang tepat menjelang dan selama bulan Ramadhan. kebiasaan tanam ini merupakan kearifan lokal yang diturunkan turun-temurun, memanfaatkan peluang pasar saat permintaan buah segar meningkat pesat. Semangka Kubang dikenal manis dan segar, menjadi pilihan masyarakat selama bulan puasa hingga hari raya. 
                        </p>
                       
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">3.Pinang</h3>
                    <img src="Komoditi3.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">
                           Pinang merupakan salah satu primadona perkebunan di Nagari Kubang. Pinang Kubang memiliki kualitas yang bagus sehingga diminati pasar domestik. Budidaya pinang relatif mudah dengan nilai ekonomis tinggi, menjadikannya penyumbang pendapatan masyarakat.
                        </p>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">4.Pala</h3>
                    <img src="Komoditi4.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">
                       Pala Nagari Kubang merupakan komoditas spesial dengan segudang manfaat. Ditanam di kebun campuran, pala kami menghasilkan biji dan fuli (bunga pala) yang menjadi sumber pendapatan tambahan yang signifikan. Komoditas ini mewakili kekayaan rempah khas Sumatera Barat yang kami lestarikan.
                        </p>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">5.Karet</h3>
                    <img src="Komoditi6.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">
                        Perkebunan karet tradisional telah menjadi bagian dari kehidupan ekonomi Nagari Kubang selama puluhan tahun. Dengan sistem penyadapan yang berkelanjutan, karet memberikan arus kas rutin harian dan mingguan bagi keluarga petani. Meskipun menghadapi tantangan fluktuasi harga internasional, karet tetap menjadi penyangga ekonomi yang dapat diandalkan.
                        </p>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">6.Jagung</h3>
                    <img src="Komoditi7.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">
                        Jagung ditanam sebagai tanaman rotasi. jagung dimanfaatkan sebagai pakan ternak dan sumber pendapatan tambahan. Budidaya jagung menunjukkan efisiensi pengolahan lahan serta pengendalian hama dan penyakit yang menjadi ciri khas pertanian berkelanjutan kami.
                        </p>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">7.Kelapa</h3>
                    <img src="Komoditi10.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">
                        Tanaman Serbaguna Pekarangan Kelapa ditanam di hampir setiap pekarangan dan kebun campuran. Setiap bagian pohon kelapa dimanfaatkan mulai dari buah untuk konsumsi dan kopra, daun untuk kerajinan, hingga batang untuk bahan bangunan. 
                        </p>
                    </div>
                </div>
             </div>
        </div>
    </div>
    
                
    <div class="p-12 mb-20 slider">
        <div class=" max-w-6xl mx-auto px-8 mt-24 slider-track">
            <h2 class="text-3xl font-bold text-green-600 mb-6 text-center" data-aos="fade-up"
                data-aos-anchor-placement="center-bottom">Informasi Kelompok Tani</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 ">


                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">1.Durian Taba</h3>
                    <img src="Durian taba.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">Luas lahan:20 hektar</p>
                        <p class="text-green-600 ">produktivitas: 6,7 ton</p>
                        <p class="text-green-600 ">varietas: cisokan</p>
                        <p class="text-green-600 ">Index pertanaman: 2,5</p>
                       
                    </div>
                </div>


                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">2.Sungai Tapuih</h3>
                    <img src="Sungai tapuih.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">Luas lahan:23 hektar</p>
                        <p class="text-green-600 ">produktivitas: 7,2 ton</p>
                        <p class="text-green-600 ">varietas: cisokan</p>
                        <p class="text-green-600 ">Index pertanaman: 2,5</p>
                       
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">3.Pintu Rayo I</h3>
                    <img src="Pintu Rayo I.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">Luas lahan:20 hektar</p>
                        <p class="text-green-600 ">produktivitas: 6,7 ton</p>
                        <p class="text-green-600 ">varietas: cisokan</p>
                        <p class="text-green-600 ">Index pertanaman: 2,5</p>
                     
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">4.Pintu Rayo II</h3>
                    <img src="Pintu Rayo II.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">Luas lahan:20 hektar</p>
                        <p class="text-green-600 ">Produktivitas: 6,7 ton</p>
                        <p class="text-green-600 ">varietas: cisokan</p>
                        <p class="text-green-600 ">Index pertanaman: 2,5</p>
                    </div>
                </div>

                
                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                data-aos-anchor-placement="center-bottom">
                <h3 class="text-xl font-bold mb-2 text-green-600">5.Anak Aia</h3>
                <img src="Anak Aia.jpeg" alt="" class="rounded-lg">
                <div class="text-start mt-12">
                    <p class="text-green-600 ">Luas lahan:17 hektar</p>
                    <p class="text-green-600 ">Produktivitas: 6,5 ton</p>
                    <p class="text-green-600 ">varietas: cisokan</p>
                    <p class="text-green-600 ">Index pertanaman: 2,5</p>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
            data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">6.Sawah Baliak</h3>
                    <img src="sawah balik.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">Luas lahan:18 hektar</p>
                        <p class="text-green-600 ">Produktivitas: 6,5 ton</p>
                        <p class="text-green-600 ">varietas: cisokan</p>
                        <p class="text-green-600 ">Index pertanaman: 2,5</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">7.Iku Koto</h3>
                    <img src="iku koto.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">Luas lahan: 22 hektar</p>
                        <p class="text-green-600 ">Produktivitas: 7,0 ton</p>
                        <p class="text-green-600 ">varietas: cisokan</p>
                        <p class="text-green-600 ">Index pertanaman: 2,5</p>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script>
        const text = " Pertanian Nagari Kubang Koto Berapak";
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