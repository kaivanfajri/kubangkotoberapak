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

  <!-- FOOTER -->
  @include('layouts.footer')
@endsection