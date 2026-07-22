@extends('layouts.nagari')

@section('title', 'Peternakan di Nagari Kubang Bayang')

@section('content')

    <div id="slider" class="relative overflow-hidden mb-20 h-[600px] md:h-[900px]">
         <img src="{{ asset('Peternakan1.jpeg') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000">
        <img src="{{ asset('Peternakan2.jpeg') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">
        <img src="{{ asset('Peternakan4.jpeg') }}" alt="Foto"
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
                    data-aos-anchor-placement="center-bottom">Peternakan di Nagari Kubang Bayang</h2>
                <p class="text-green-800 text-lg leading-relaxed text-justify mt-4" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    Nagari Kubang Koto Berapak merupakan salah satu dari tujuh belas nagari yang berada di wilayah Kecamatan Bayang, Kabupaten Pesisir Selatan, Provinsi Sumatera Barat. Nagari ini memiliki luas sekitar 7,60 kilometer persegi, yang menyediakan ruang yang cukup untuk berbagai aktivitas ekonomi, termasuk sektor peternakan.
                </p>
                <P class="text-green-800 text-lg leading-relaxed text-justify mt-4" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    Secara geografis, Kabupaten Pesisir Selatan dikenal memiliki kondisi iklim tropis dengan curah hujan yang relatif tinggi dan didukung oleh sumber daya alam yang melimpah. Lingkungan seperti ini sangat ideal untuk pengembangan usaha peternakan, terutama ternak ruminansia seperti sapi yang membutuhkan pakan hijauan dalam jumlah besar. Ketersediaan lahan dan iklim yang mendukung pertumbuhan rumput serta tanaman pakan ternak menjadi modal utama bagi pengembangan sektor ini. </P>
                <P class="text-green-800 text-lg leading-relaxed text-justify mt-4" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                   Potensi tersebut juga sejalan dengan upaya Pemerintah Kabupaten Pesisir Selatan dalam meningkatkan produksi ternak lokal.
                   Dengan kombinasi antara luas wilayah yang memadai, iklim yang mendukung, serta komitmen pemerintah daerah dalam penebangan sektor
                   peternakan, Nagari Kubang Koto Berapak memiliki potensi yang sangat baik untuk menjadi salah satu peternakan unggulan di Kabupaten
                   Pesisis Selatan. Pengembangan yang terencana dan berkelanjutan menjadikan sektor ini sebagai salah satu pilar ekonomi masyarakat setempat
                </P>

            </div>
        </div>
    </div>
    
    <div class="bg-yellow-400 py-20 mt-24 text-center rounded-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 shadow-xl hover:shadow-2xl transition-all duration-300"
            data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <div class="max-w-6xl mx-auto px-8">
                <div class="">
                    <div class=" p-6 rounded-lg ">
                        <h3 class="text-xl font-bold text-green-600 mb-2">Jumlah sapi</h3>
                        <p class="text-green-700 text-3xl font-bold">74 ekor</p>
                    </div>
                </div>
            </div>
        </div>
        
    <div class="p-12 mb-20 slider">
        <div class=" max-w-6xl mx-auto px-8 mt-24 slider-track">
            <h2 class="text-3xl font-bold text-green-600 mb-6 text-center" data-aos="fade-up"
                data-aos-anchor-placement="center-bottom">Pakan tambahan yang digunakan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 ">


                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">1.Indigofera </h3>
                    <img src="peternakann1.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">
                            Indigofera (Indigofera zollingeriana) merupakan salah satu pakan sumber protein yang baik untuk ternak ruminansia,
                            pemberian pakan hijauan Indigofera pada sapi pedaging dapat meningkatkan pertambahan bobot badan harian ternak,  
                            melalui kandungan protein kasar yang tinggi dan nutrisi mineral cukup dapat meningkatkan produktivitas ternak ruminansia.
                        </p>
                    </div>
                </div>


                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">2.Mineral blok</h3>
                    <img src="peternakann2.jpeg" alt="" class="rounded-lg ">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">
                            Mineral blok Kandungan mineral lengkap dari mineral blok
                            yang mengandung kalsium, fosfor, zinc dan selenium dapat 
                            membantu penyerapan nutrisi pakan, mencegah defisiensi nutrisi pada pakan lokal dan meningkatkan
                            plabilitas pakan melalui rasa manis yang meningkatkan konsumsi 
                            pakan utama 10-15%.
                        </p>
                       
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-green-100 hover:shadow-2xl transition-all duration-300" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <h3 class="text-xl font-bold mb-2 text-green-600">3.Silase Jerami Padi</h3>
                    <img src="peternakann3.jpeg" alt="" class="rounded-lg">
                    <div class="text-start mt-12">
                        <p class="text-green-600 ">
                           Silase Jerami Padi Silase jerami padi memberikan manfaat 
                           ganda bagi sapi pedaging dan peternak: secara nutrisi, proses 
                           fermentasi meningkatkan kecernaan dari 45% menjadi 65–70% dan 
                           protein kasar dari 4% menjadi 9–11%.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        const text = " Peternakan Nagari Kubang Koto Berapak";
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