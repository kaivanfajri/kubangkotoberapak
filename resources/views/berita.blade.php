@extends('layouts.nagari')

@section('title', 'Berita & Kegiatan — Nagari Kubang Koto Berapak')

@section('content')
  <!-- HERO BANNER -->
  <div class="hero" style="background-image: url('{{ asset('Profil3.JPG') }}')">
    <div class="hero-content">
      <span class="hero-badge">Informasi Nagari</span>
      <h1>Berita & Kegiatan Nagari</h1>
      <p class="hero-sub">Informasi terkini, pengumuman, dan dokumentasi kegiatan dari Nagari Kubang Koto Berapak.</p>
    </div>
  </div>

  <!-- BERITA LIST SECTION -->
  <div class="section">
    <div class="wrap">
      <div class="eyebrow">Berita Terbaru</div>
      <h2 class="section-title reveal">Informasi & Kegiatan Nagari</h2>

      <div class="grid grid-3 reveal" style="margin-top:26px;">
        @forelse($beritas as $berita)
          <a href="{{ route('berita.show', $berita->slug) }}" class="card clickable card-hover" style="text-decoration:none; color:inherit;">
            <div class="card-img" style="background-image:url('{{ $berita->gambar ? asset('storage/'.$berita->gambar) : asset('Profil2.JPG') }}')"></div>
            <div class="card-body">
              <span class="pill">{{ $berita->kategori }}</span>
              <h4 style="margin-top:6px;">{{ $berita->judul }}</h4>
              <p style="font-size:13px; color:var(--muted); line-height:1.5;">{{ Str::limit(strip_tags($berita->konten), 100) }}</p>
              <div style="margin-top:10px; font-size:12px; color:var(--green-dark); font-weight:600;">{{ $berita->tanggal_terbit->format('d M Y') }}</div>
            </div>
          </a>
        @empty
          <div style="grid-column:1/-1; text-align:center; padding:40px; color:var(--muted);">
            <p>Belum ada berita yang dipublikasikan.</p>
          </div>
        @endforelse
      </div>

      <div style="margin-top:30px; text-align:center;">{{ $beritas->links() }}</div>
    </div>
  </div>

  <!-- SECTION HUBUNGI KAMI -->
  <x-contact-section />

  <!-- FOOTER -->
  @include('layouts.footer')
@endsection
