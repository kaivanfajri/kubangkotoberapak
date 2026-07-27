@extends('layouts.nagari')

@section('title', 'Potensi Peternakan — Nagari Kubang Koto Berapak')

@section('content')
  <!-- HERO BANNER -->
  <div class="hero" style="background-image: url('{{ asset('Peternakan1.jpeg') }}')">
    <div class="hero-content">
      <span class="hero-badge">Potensi Nagari</span>
      <h1>Peternakan Nagari Kubang Koto Berapak</h1>
      <p class="hero-sub">Pemanfaatan lahan penggembalaan harian dan pengolahan pakan ternak berkualitas tinggi untuk keberlanjutan ekonomi masyarakat.</p>
    </div>
  </div>

  <!-- OVERVIEW SECTION & HIGHLIGHT STAT -->
  <div class="section">
    <div class="wrap">
      <div class="eyebrow">Peternakan Sapi di Nagari Kubang</div>
      <p class="section-lead reveal">
        Kabupaten Pesisir Selatan memiliki iklim tropis dengan curah hujan tinggi yang mendukung ketersediaan pakan hijauan melimpah. Sektor peternakan sapi potong di Nagari Kubang Koto Berapak menjadi pilar ekonomi keluarga petani yang potensial untuk terus dikembangkan secara intensif.
      </p>

      <!-- SAPI COUNT HIGHLIGHT CARD -->
      <div class="grid grid-2 reveal" style="margin-top:34px; align-items:center;">
        <div class="card" style="background:linear-gradient(135deg,var(--gold),var(--gold-dark)); padding:38px; text-align:center; box-shadow: 0 16px 36px rgba(217,168,0,0.35);">
          <div style="font-size:13px; font-weight:700; color:#5a4600; letter-spacing:2px; text-transform:uppercase;">Populasi Sapi Ternak Nagari</div>
          <div style="font-size:52px; font-weight:800; color:var(--green-dark); font-family:'Poppins',sans-serif; margin-top:8px;">
            74 <span style="font-size:22px; font-weight:600;">ekor</span>
          </div>
          <p style="font-size:13px; color:#4a3900; margin-top:8px;">Tercatat aktif di kelompok ternak nagari dengan perawatan kesehatan berkala.</p>
        </div>
        <div style="border-radius:18px; overflow:hidden; height:240px; box-shadow:var(--shadow-hover); background:url('{{ asset('Peternakan2.jpeg') }}') center/cover;"></div>
      </div>

      <!-- PAKAN TAMBAHAN SECTION -->
      <div class="eyebrow" style="margin-top:56px;">Nutrisi & Pakan</div>
      <h2 class="section-title reveal">Pakan Tambahan Unggulan</h2>
      <div class="grid grid-3 reveal" style="margin-top:26px;">
        <div class="card card-hover">
          <div class="card-img" style="background-image:url('{{ asset('peternakann1.jpeg') }}')"></div>
          <div class="card-body">
            <h4 style="margin-top:8px;">Tanaman Indigofera</h4>
            <p>Sumber leguminosa tinggi protein untuk ternak ruminansia, mempercepat pertambahan bobot harian ternak secara alami.</p>
          </div>
        </div>

        <div class="card card-hover">
          <div class="card-img" style="background-image:url('{{ asset('peternakann2.jpeg') }}')"></div>
          <div class="card-body">
            <h4 style="margin-top:8px;">Mineral Blok</h4>
            <p>Suplemen jilatan mengandung kalsium, fosfor, zinc, dan selenium untuk penyerapan nutrisi optimal serta pencegahan kelumpuhan.</p>
          </div>
        </div>

        <div class="card card-hover">
          <div class="card-img" style="background-image:url('{{ asset('peternakann3.jpeg') }}')"></div>
          <div class="card-body">
            <h4 style="margin-top:8px;">Silase Jerami Padi</h4>
            <p>Pengolahan limbah pertanian persawahan melalui fermentasi anaerob untuk meningkatkan daya cerna pakan jerami dari 45% hingga 70%.</p>
          </div>
        </div>
      </div>

      <!-- GALERI PETERNAKAN -->
      <div class="eyebrow" style="margin-top:56px;">Dokumentasi</div>
      <h2 class="section-title reveal">Galeri Peternakan Nagari</h2>
      <div class="grid grid-4 reveal" style="margin-top:24px;">
        <div style="border-radius:14px; overflow:hidden; box-shadow:var(--shadow); height:160px; background:url('{{ asset('Peternakan1.jpeg') }}') center/cover;"></div>
        <div style="border-radius:14px; overflow:hidden; box-shadow:var(--shadow); height:160px; background:url('{{ asset('Peternakan3.jpeg') }}') center/cover;"></div>
        <div style="border-radius:14px; overflow:hidden; box-shadow:var(--shadow); height:160px; background:url('{{ asset('Peternakan4.jpeg') }}') center/cover;"></div>
        <div style="border-radius:14px; overflow:hidden; box-shadow:var(--shadow); height:160px; background:url('{{ asset('Peternakan2.jpeg') }}') center/cover;"></div>
      </div>
    </div>
  </div>

  <!-- SECTION HUBUNGI KAMI -->
  <x-contact-section />

  <!-- FOOTER -->
  @include('layouts.footer')
@endsection