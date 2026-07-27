@extends('layouts.nagari')

@section('title', 'Nagari Kubang Koto Berapak — Portal Resmi')

@section('content')
  <!-- HERO BANNER -->
  <div class="hero" style="background-image: url('{{ asset('Profil2.JPG') }}')">
    <div class="hero-content">
      <span class="hero-badge">Sumatera Barat · Pesisir Selatan</span>
      <h1>Selamat Datang di Nagari Kubang Koto Berapak</h1>
      <p class="hero-sub">Nagari agraris di Kecamatan Bayang yang menjaga adat, alam, dan potensi pertanian serta peternakannya secara berkelanjutan.</p>
    </div>
  </div>

  <!-- STATISTIK ANIMATED COUNTER BAR -->
  <div class="stats-bar reveal" id="statsBar">
    <div class="stat">
      <div class="num" data-count="1712">0</div>
      <div class="lbl">Jiwa Penduduk</div>
    </div>
    <div class="stat">
      <div class="num" data-count="907">0</div>
      <div class="lbl">Ha Luas Nagari</div>
    </div>
    <div class="stat">
      <div class="num" data-count="486">0</div>
      <div class="lbl">Kepala Keluarga</div>
    </div>
    <div class="stat">
      <div class="num" data-count="5">0</div>
      <div class="lbl">Jorong / Korong</div>
    </div>
  </div>

  <!-- SECTION KOLABORASI (4 LOGO) -->
  <div class="collab-bar reveal">
    <div class="collab-logos">
      <!-- 1. Logo KKN Periode 1 -->
      <div class="collab-badge" title="Logo KKN Periode 1 Unand">
        <img src="{{ asset('ESokan.jpeg') }}" alt="Logo KKN Periode 1">
      </div>
      <!-- 2. Logo KKN 2 -->
       <div class="collab-badge" title="Logo KKN Periode 2 Unand ">
        <img src="{{ asset('logo kkn.png') }}" alt="Logo KKN Periode 2">
      </div>
      <!-- 3. Logo UNAND -->
      <div class="collab-badge" title="Logo Universitas Andalas">
        <img src="{{ asset('Unand.png') }}" alt="Logo Unand">
      </div>
      <!-- 4. Logo Nagari Kubang Koto Berapak (Placeholder Circle) -->
      <<div class="collab-badge" title="Logo Pemkab Pesisir Selatan">
        <img src="{{ asset('icon.jpeg') }}" alt="Logo Pemkab Pesisir Selatan">
        </div>
      </div>

    <div class="collab-text">
      <span class="hero-badge" style="background:var(--gold); color:var(--green-dark);">Kolaborasi</span>
      <p>Program ini dilaksanakan melalui kolaborasi mahasiswa KKN Universitas Andalas dengan Pemerintah Nagari Kubang Koto Berapak, Kecamatan Bayang, Kabupaten Pesisir Selatan.</p>
    </div>
  </div>

  <!-- TENTANG NAGARI -->
  <div class="section">
    <div class="wrap" style="display:grid; grid-template-columns:1.1fr 1fr; gap:50px; align-items:center;">
      <div class="reveal">
        <div class="eyebrow">Tentang Nagari</div>
        <h2 class="section-title">Kehidupan yang Tumbuh dari Tanah dan Adat</h2>
        <p class="section-lead">Nagari Kubang Koto Berapak merupakan salah satu nagari di Kecamatan Bayang, Kabupaten Pesisir Selatan, Provinsi Sumatera Barat. Nagari ini memiliki 2 kampung utama yaitu Kampung Kubang dan Kampung Lembah Gumanti. Bentang alamnya yang subur didukung oleh jaringan irigasi sungai menjadikannya sentra pertanian padi sawah utama di wilayah Bayang.</p>
        <div style="margin-top:22px; display:flex; gap:12px; flex-wrap:wrap;">
          <a href="{{ route('Sejarah') }}" class="btn btn-primary">Baca Sejarah →</a>
          <a href="{{ route('pertanian') }}" class="btn btn-outline">Lihat Potensi</a>
        </div>
      </div>
      <div class="reveal" style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
        <div style="border-radius:18px; overflow:hidden; box-shadow:var(--shadow); height:230px; background:url('{{ asset('Pemandangan.jpeg') }}') center/cover; margin-top:30px;"></div>
        <div style="border-radius:18px; overflow:hidden; box-shadow:var(--shadow); height:230px; background:url('{{ asset('sawah balik.jpeg') }}') center/cover;"></div>
      </div>
    </div>
  </div>

  <!-- VISI & MISI -->
  <div class="section section-alt">
    <div class="wrap" style="display:grid; grid-template-columns:1fr 1fr; gap:30px;">
      <div class="card reveal" style="padding:30px;">
        <div class="eyebrow">Visi</div>
        <p style="color:var(--ink); font-size:15px; line-height:1.8;">"Terwujudnya Nagari Kubang Koto Berapak sebagai Nagari mandiri, berdaya saing, adil, dan bersatu dalam mensejahterakan masyarakat berlandaskan adat basandi syarak, syarak basandi Kitabullah."</p>
      </div>
      <div class="card reveal" style="padding:30px;">
        <div class="eyebrow">Misi Utama</div>
        <ul style="color:var(--ink); font-size:14px; line-height:1.8; list-style:none; padding:0;">
          <li style="margin-bottom:8px;">✓ Mewujudkan penyelenggaraan pemerintahan yang transparan & partisipatif.</li>
          <li style="margin-bottom:8px;">✓ Mengembangkan sistem perekonomian berbasis potensi pertanian & peternakan.</li>
          <li style="margin-bottom:8px;">✓ Peningkatan pembangunan infrastruktur sarana umum nagari.</li>
          <li style="margin-bottom:8px;">✓ Memperkuat nilai-nilai agama, norma adat, dan budaya kebersamaan Minangkabau.</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- VIDEO PROFIL -->
  <div class="section">
    <div class="wrap">
      <div class="eyebrow center">Video Profil</div>
      <h2 class="section-title center reveal">Dokumentasi Nagari Kubang</h2>
      <div class="video-frame reveal" style="max-width:860px; margin:30px auto 0;">
        <video controls style="width:100%; height:100%; border-radius:22px; object-fit:cover;">
          <source src="{{ asset('DEMONSTRASI PENGGUNAAN WEBSITE.mp4') }}" type="video/mp4">
          Browser Anda tidak mendukung pemutar video HTML5.
        </video>
      </div>
    </div>
  </div>

  <!-- PETA POTENSI NAGARI -->
  <div class="section section-alt" id="peta-potensi">
    <div class="wrap">
      <div class="eyebrow center">Informasi Wilayah</div>
      <h2 class="section-title center reveal">Peta Potensi Nagari</h2>
      <div class="grid grid-4 reveal" style="margin-top:30px;">
        <div class="card card-hover">
          <div class="card-img" style="background-image:url('{{ asset('Peta potensi nagari.jpeg') }}')"></div>
          <div class="card-body">
            <h4>Peta Potensi Nagari</h4>
            <p>Sebaran potensi lahan pertanian padi dan komoditas nagari.</p>
          </div>
        </div>
        <div class="card card-hover">
          <div class="card-img" style="background-image:url('{{ asset('peta topografi.jpeg') }}')"></div>
          <div class="card-body">
            <h4>Peta Topografi</h4>
            <p>Kontur bentang alam dan elevasi daratan nagari.</p>
          </div>
        </div>
        <div class="card card-hover">
          <div class="card-img" style="background-image:url('{{ asset('Peta wilayah pertanian nagari.jpeg') }}')"></div>
          <div class="card-body">
            <h4>Peta Pertanian</h4>
            <p>Pemetaan distribusi lahan persawahan dan jaringan irigasi.</p>
          </div>
        </div>
        <div class="card card-hover">
          <div class="card-img" style="background-image:url('{{ asset('Peta rawan kebencanaan.jpeg') }}')"></div>
          <div class="card-body">
            <h4>Peta Mitigasi Bencana</h4>
            <p>Zona kerawanan banjir serta pemetaan jalur evakuasi.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- KEGIATAN NAGARI -->
  <div class="section">
    <div class="wrap">
      <div class="eyebrow center">Kegiatan Nagari</div>
      <h2 class="section-title center reveal">Aktivitas Rutin Masyarakat</h2>
      <div class="grid grid-3 reveal" style="margin-top:30px;">
        <div class="card card-hover">
          <div class="card-body">
            <div class="card-num">01</div>
            <h4>Tradisi Adat & Gotong Royong</h4>
            <p>Kegiatan kebersamaan masyarakat dalam menyambut musim panen dan perawatan saluran irigasi sawah.</p>
          </div>
        </div>
        <div class="card card-hover">
          <div class="card-body">
            <div class="card-num">02</div>
            <h4>Pelatihan Randai & Seni Minang</h4>
            <p>Pelestarian seni budaya tradisional teater & bela diri Randai yang rutin dilakukan pemuda nagari.</p>
          </div>
        </div>
        <div class="card card-hover">
          <div class="card-body">
            <div class="card-num">03</div>
            <h4>Musyawarah Kelompok Tani</h4>
            <p>Koordinasi berkala 7 kelompok tani aktif untuk distribusi benih, pupuk, dan jadwal tanam padi.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SECTION HUBUNGI KAMI -->
  <x-contact-section />

  <!-- FOOTER -->
  @include('layouts.footer')

  <!-- JS COUNTER SCRIPT -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let counterDone = false;
      const statsBar = document.getElementById('statsBar');
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting && !counterDone) {
            counterDone = true;
            document.querySelectorAll('.stat .num').forEach(el => {
              const target = parseInt(el.getAttribute('data-count'));
              let start = 0;
              const duration = 1500;
              const stepTime = Math.abs(Math.floor(duration / target)) || 10;
              
              const timer = setInterval(() => {
                start += Math.ceil(target / 40);
                if (start >= target) {
                  el.innerText = target.toLocaleString('id-ID');
                  clearInterval(timer);
                } else {
                  el.innerText = start.toLocaleString('id-ID');
                }
              }, stepTime);
            });
          }
        });
      }, { threshold: 0.2 });

      if (statsBar) observer.observe(statsBar);
    });
  </script>
@endsection