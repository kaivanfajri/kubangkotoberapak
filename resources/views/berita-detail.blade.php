@extends('layouts.nagari')

@section('title', $berita->judul . ' — Nagari Kubang Koto Berapak')

@section('content')
  <div class="section" style="padding-top:120px;">
    <div class="wrap" style="max-width:800px;">
      <a href="{{ route('berita') }}" style="color:var(--green-dark); font-weight:600; text-decoration:none; font-size:13px;">← Kembali ke Berita</a>

      <article style="margin-top:20px;">
        <span class="pill" style="margin-bottom:10px; display:inline-block;">{{ $berita->kategori }}</span>
        <h1 style="font-family:'Poppins',sans-serif; font-size:2rem; font-weight:800; color:var(--green-dark); line-height:1.3; margin-bottom:10px;">{{ $berita->judul }}</h1>
        <div style="font-size:13px; color:var(--muted); margin-bottom:24px;">{{ $berita->tanggal_terbit->format('d F Y') }}</div>

        @if($berita->gambar)
          <div style="border-radius:18px; overflow:hidden; margin-bottom:28px; box-shadow:var(--shadow);">
            <img src="{{ asset('storage/'.$berita->gambar) }}" alt="{{ $berita->judul }}" style="width:100%; height:auto; display:block;">
          </div>
        @endif

        @if($berita->konten)
          <div style="font-size:15px; line-height:1.9; color:var(--ink); margin-bottom:24px;">
            {!! nl2br(e($berita->konten)) !!}
          </div>
        @endif

        @if($berita->link_artikel)
          <div style="margin-top:28px; padding:20px; background:#f0f9ff; border:1.5px solid #0288d1; border-radius:16px;">
            <p style="margin:0 0 10px; font-weight:700; color:#0369a1; font-size:14px;">Artikel ini juga dapat dibaca pada tautan portal berita luar:</p>
            <a href="{{ $berita->link_artikel }}" target="_blank" class="btn" style="background:#0288d1; color:#fff; font-weight:700; padding:10px 20px; border-radius:24px; text-decoration:none; display:inline-flex; align-items:center; gap:6px; font-size:13px;">
              Kunjungi Artikel Asli ↗
            </a>
          </div>
        @endif
      </article>
    </div>
  </div>

  <!-- SECTION HUBUNGI KAMI -->
  <x-contact-section />

  <!-- FOOTER -->
  @include('layouts.footer')
@endsection
