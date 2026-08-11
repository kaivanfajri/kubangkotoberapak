@extends('layouts.nagari')

@section('title', 'Hubungi Kami — Nagari Kubang Koto Berapak')

@section('content')
  <!-- HERO BANNER -->
  <div class="hero" style="background-image: url('{{ asset('backgroundcontact1.jpeg') }}')">
    <div class="hero-content">
      <span class="hero-badge">Layanan Informasi</span>
      <h1>Hubungi Nagari Kubang Koto Berapak</h1>
      <p class="hero-sub">Kami siap membantu dan melayani pertanyaan, informasi layanan nagari, serta kerjasama publik.</p>
    </div>
  </div>

  <!-- CONTACT SECTION -->
  <x-contact-section />

  <!-- SECTION PENGADUAN MASYARAKAT -->
  <div class="section section-alt" style="padding:60px 0;">
    <div class="wrap" style="max-width:780px; text-align:center;">
      <div class="eyebrow center">Layanan Pengaduan</div>
      <h2 class="section-title center reveal">Sampaikan Aspirasi Anda</h2>
      <p style="color:var(--muted); font-size:15px; line-height:1.8; margin-bottom:36px;">
        Nagari Kubang Koto Berapak membuka saluran pengaduan digital untuk seluruh warga. Scan QR Code di bawah menggunakan kamera ponsel Anda, atau klik tombol untuk membuka form secara langsung.
      </p>

      <div class="reveal" style="display:inline-flex; flex-direction:column; align-items:center; background:#fff; border:2px solid #c8ddc8; border-radius:24px; padding:36px 48px; box-shadow:0 8px 32px rgba(46,125,50,0.10);">
        <a href="https://forms.gle/n1FUbecTAm9goBy66" target="_blank" rel="noopener" title="Scan QR untuk membuka form pengaduan">
          <img src="{{ asset('QR_Code_Pengaduan.png') }}"
               alt="QR Code Form Pengaduan Nagari Kubang Koto Berapak"
               style="width:200px; height:200px; object-fit:contain; display:block; border-radius:12px;">
        </a>
        <p style="margin-top:16px; font-size:13px; color:var(--muted); line-height:1.6;">
          Scan QR Code dengan kamera ponsel Anda
        </p>
        <div style="width:100%; border-top:1px solid #e0ece0; margin:20px 0;"></div>
        <p style="font-size:13.5px; color:var(--ink); margin-bottom:16px;">Atau buka langsung melalui tombol berikut:</p>
        <a href="https://forms.gle/n1FUbecTAm9goBy66" target="_blank" rel="noopener"
           style="display:inline-flex; align-items:center; gap:8px; background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; padding:12px 28px; border-radius:24px; font-size:14px; font-weight:700; text-decoration:none; box-shadow:0 4px 14px rgba(46,125,50,0.30);">
          Buka Form Pengaduan ↗
        </a>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  @include('layouts.footer')
@endsection