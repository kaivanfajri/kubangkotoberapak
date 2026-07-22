@extends('layouts.nagari')

@section('title', 'Sejarah')

@section('content')

    <div id="slider" class="relative overflow-hidden mb-20 h-[600px] md:h-[900px]">
         <img src="{{ asset('Sejarah1.JPG') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000">
        <img src="{{ asset('Sejarah2.JPG') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">
        <img src="{{ asset('Sejarah5.jpeg') }}" alt="Foto"
            class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">
        <img src="{{ asset('Sejarah6.jpeg') }}" alt="Foto"
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
                    data-aos-anchor-placement="center-bottom">Sejarah</h2>
                <p class="text-green-800 text-lg leading-relaxed text-justify mt-4" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    Nagari Kubang dikenal sebagai nagari tertua dalam wilayah adat Bayang Nan Tujuh, yang secara historis terbagi atas dua wilayah besar, yakni Bayang Nan Tujuh dan Koto Nan Delapan. Menurut Tambo Adat Nagari Bayang, nenek moyang masyarakat Nagari Kubang berasal dari kawasan Kubuang Tigo Baleh di wilayah Solok, khususnya dari daerah Kinari, Muaro Paneh, dan Koto Anau. Migrasi leluhur ini diperkirakan terjadi pada pertengahan abad ke-16 sebagai bagian dari tradisi merantau masyarakat Minangkabau dari daerah darek ke wilayah pesisir. Dalam perjalanan tersebut, rombongan leluhur awalnya menyusuri wilayah Koto Nan Delapan, kemudian mengikuti aliran sungai hingga menemukan hamparan tanah kosong yang kemudian dijadikan tempat bermukim. Kawasan inilah yang kelak berkembang menjadi Nagari Kubang sebagai pusat awal kehidupan adat dan sosial masyarakat Bayang.
                </p>
                <P class="text-green-800 text-lg leading-relaxed text-justify mt-4" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    Penamaan “Kubang” berasal dari kisah ditemukannya sebuah kubangan besar yang diyakini sebagai kubangan badak, yang menjadi penanda alam penting bagi para pendiri nagari. Sementara itu, Nagari Koto Baru yang bertetangga juga memiliki asal-usul yang berkaitan erat dengan jejak badak yang baru ditemukan, sehingga dinamakan Koto Baru. Pada masa awal, Nagari Kubang dan Nagari Koto Baru tidak dipisahkan oleh aliran sungai sebagaimana kondisi saat ini, melainkan berada dalam satu bentang wilayah yang utuh. Kedua nagari tersebut dikenal dengan sebutan “tuo dek adat”, karena adat istiadat Minangkabau mulai dibicarakan, dirumuskan, dan dilaksanakan pertama kali di wilayah ini. Pelaksanaan adat dipimpin oleh seorang penghulu pucuk yang bergelar Datuk Sitia, yang memiliki peran sentral dalam menjaga keseimbangan adat, agama, dan kehidupan sosial masyarakat.

                </P>
                
                <P class="text-green-800 text-lg leading-relaxed text-justify mt-4" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    Perubahan besar dalam bentang alam wilayah ini terjadi pada tahun 1887, ketika aliran Sungai Bayang mengalami pergeseran akibat peristiwa alam yang dahsyat. Menurut cerita turun-temurun masyarakat, pergeseran sungai tersebut diawali dengan terdengarnya bunyi menyerupai alunan sarunai pada malam hari, yang dipercaya sebagai pertanda datangnya air bah. Dalam kepercayaan lokal, muncul seekor naga penjaga Nagari Kubang yang naik ke permukaan untuk melindungi nagari dari bencana besar tersebut. Pada siang hari, naga itu dikisahkan beristirahat di sebuah batu besar dan kemudian menjelma menjadi batu yang hingga kini dipercaya sebagai simbol perlindungan nagari dari banjir besar Sungai Bayang. Peristiwa pergeseran sungai ini akhirnya memisahkan Nagari Kubang dan Nagari Koto Baru, yang sebelumnya menjadi satu kesatuan wilayah adat.
                </P>
                <img src="{{ asset('Sejarah4.jpeg') }}" alt="Foto" class="w-full h-48 object-cover rounded-lg p-6" data-aos="fade-up">
                <P class="text-green-800 text-lg leading-relaxed text-justify mt-4" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    Secara administratif modern, Nagari Kubang merupakan bagian dari wilayah Koto Berapak yang tergabung dalam kesatuan adat Bayang Nan Tujuh, dengan kehidupan masyarakat yang berlandaskan prinsip adat basandi syarak, syarak basandi Kitabullah. Dalam perkembangannya, wilayah Koto Berapak yang sebelumnya terdiri atas beberapa jorong mengalami pemekaran nagari pada tahun 2011 untuk meningkatkan efektivitas pemerintahan dan pelayanan masyarakat. Pemekaran tersebut menetapkan Nagari Kubang Koto Berapak sebagai nagari yang berdiri sendiri secara administratif, tanpa menghilangkan ikatan adat dan sejarah dengan nagari-nagari sekitarnya. Hingga saat ini, masyarakat Nagari Kubang Koto Berapak tetap menjaga nilai-nilai adat, budaya, dan keagamaan yang diwariskan oleh leluhur. Semangat gotong royong, kemandirian, dan penghormatan terhadap sejarah nagari terus menjadi fondasi utama dalam pembangunan sosial dan infrastruktur nagari di masa kini.
                </P>

            </div>
        </div>
    </div>

    <script>
        const text = " Sejarah Nagari Kubang Koto Berapak";
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