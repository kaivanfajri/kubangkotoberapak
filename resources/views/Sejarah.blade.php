@extends('layouts.nagari')

@section('title', 'Sejarah — Nagari Kubang Koto Berapak')

@section('content')
  <!-- HERO BANNER -->
  <div class="hero" style="background-image: url('{{ asset('Sejarah1.JPG') }}')">
    <div class="hero-content">
      <span class="hero-badge">Cerita & Warisan Adat</span>
      <h1>Sejarah Nagari Kubang Koto Berapak</h1>
      <p class="hero-sub">Jejak asal-usul, peristiwa pergeseran sungai Bayang, dan batu adat perlindungan nagari.</p>
    </div>
  </div>

  <!-- SEJARAH CONTENT SECTION -->
  <div class="section">
    <div class="wrap" style="max-width: 880px;">
      <div class="reveal" style="font-size: 15.5px; line-height: 1.9; color: var(--ink);">
        <p style="margin-bottom: 22px;">
          <strong>Nagari Kubang</strong> dikenal sebagai nagari tertua dalam wilayah adat Bayang Nan Tujuh, yang secara historis terbagi atas dua wilayah besar, yakni Bayang Nan Tujuh dan Koto Nan Delapan. Menurut Tambo Adat Nagari Bayang, nenek moyang masyarakat Nagari Kubang berasal dari kawasan Kubuang Tigo Baleh di wilayah Solok, khususnya dari daerah Kinari, Muaro Paneh, dan Koto Anau. Migrasi leluhur ini diperkirakan terjadi pada pertengahan abad ke-16 sebagai bagian dari tradisi merantau masyarakat Minangkabau dari daerah darek ke wilayah pesisir.
        </p>

        <p style="margin-bottom: 22px;">
          Dalam perjalanan tersebut, rombongan leluhur awalnya menyusuri wilayah Koto Nan Delapan, kemudian mengikuti aliran sungai hingga menemukan hamparan tanah kosong yang kemudian dijadikan tempat bermukim. Kawasan inilah yang kelak berkembang menjadi Nagari Kubang sebagai pusat awal kehidupan adat dan sosial masyarakat Bayang.
        </p>

        <div style="border-radius:22px; overflow:hidden; box-shadow:var(--shadow-hover); margin: 30px 0;">
          <img src="{{ asset('Sejarah4.jpeg') }}" alt="Batu Adat Nagari" style="width:100%; max-height:420px; object-fit:cover;">
          <div style="background:var(--green-light); padding:12px 18px; font-size:13px; color:var(--green-dark); font-weight:600;">
            📍 Batu Besar Adat Nagari Kubang — Simbol perlindungan alam dan sejarah naga penjaga nagari.
          </div>
        </div>

        <p style="margin-bottom: 22px;">
          Penamaan <em>“Kubang”</em> berasal dari kisah ditemukannya sebuah kubangan besar yang diyakini sebagai kubangan badak, yang menjadi penanda alam penting bagi para pendiri nagari. Sementara itu, Nagari Koto Baru yang bertetangga juga memiliki asal-usul yang berkaitan erat dengan jejak badak yang baru ditemukan, sehingga dinamakan Koto Baru.
        </p>

        <p style="margin-bottom: 22px;">
          Pada masa awal, Nagari Kubang dan Nagari Koto Baru tidak dipisahkan oleh aliran sungai sebagaimana kondisi saat ini, melainkan berada dalam satu bentang wilayah yang utuh. Kedua nagari tersebut dikenal dengan sebutan <em>“tuo dek adat”</em>, karena adat istiadat Minangkabau mulai dibicarakan, dirumuskan, dan dilaksanakan pertama kali di wilayah ini. Pelaksanaan adat dipimpin oleh seorang penghulu pucuk yang bergelar <strong>Datuk Sitia</strong>.
        </p>

        <div class="grid grid-2" style="margin: 30px 0;">
          <div style="border-radius:18px; overflow:hidden; box-shadow:var(--shadow); height:220px; background:url('{{ asset('Sejarah2.JPG') }}') center/cover;"></div>
          <div style="border-radius:18px; overflow:hidden; box-shadow:var(--shadow); height:220px; background:url('{{ asset('Sejarah5.jpeg') }}') center/cover;"></div>
        </div>

        <p style="margin-bottom: 22px;">
          Perubahan besar dalam bentang alam wilayah ini terjadi pada tahun <strong>1887</strong>, ketika aliran Sungai Bayang mengalami pergeseran akibat peristiwa alam yang dahsyat. Menurut cerita turun-temurun masyarakat, pergeseran sungai tersebut diawali dengan terdengarnya bunyi menyerupai alunan <em>sarunai</em> pada malam hari. Dalam kepercayaan lokal, muncul seekor naga penjaga Nagari Kubang yang melindungi nagari dari bencana air bah. Peristiwa pergeseran sungai ini akhirnya memisahkan Nagari Kubang dan Nagari Koto Baru.
        </p>

        <p style="margin-bottom: 22px;">
          Secara administratif modern, wilayah Koto Berapak mengalami pemekaran nagari pada tahun <strong>2011</strong>. Pemekaran tersebut menetapkan Nagari Kubang Koto Berapak sebagai nagari yang berdiri sendiri secara administratif, tanpa menghilangkan ikatan adat dan sejarah dengan nagari-nagari sekitarnya. Hingga saat ini, masyarakat Nagari Kubang Koto Berapak tetap menjaga nilai-nilai adat, budaya, dan keagamaan berlandaskan prinsip <em>Adat Basandi Syarak, Syarak Basandi Kitabullah</em>.
        </p>
      </div>
    </div>
  </div>

  <!-- HUBUNGI KAMI SECTION -->
  <x-contact-section />

  <!-- FOOTER -->
  @include('layouts.footer')
@endsection