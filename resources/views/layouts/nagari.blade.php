<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Nagari Kubang Koto Berapak')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar" id="mainNavbar">
    <div class="nav-inner">
      <a href="{{ route('home') }}" class="brand">
        <span>Kubang Bayang Pesisir Selatan<small>Nagari Kubang Koto Berapak</small></span>
      </a>

      <div class="nav-menu">
        <div class="nav-item"><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'current' : '' }}">Home</a></div>
        <div class="nav-item"><a href="{{ route('Sejarah') }}" class="nav-link {{ request()->routeIs('Sejarah') ? 'current' : '' }}">Sejarah</a></div>
        <div class="nav-item">
          <a class="nav-link {{ request()->routeIs('pertanian') || request()->routeIs('Peternakan') ? 'current' : '' }}">
            Potensi Nagari <span class="caret">▾</span>
          </a>
          <div class="dropdown">
            <a href="{{ route('pertanian') }}">Pertanian</a>
            <a href="{{ route('Peternakan') }}">Peternakan</a>
            <a href="{{ route('pertanian') }}#kelompok-tani">Kelompok Tani</a>
            <a href="{{ route('home') }}#peta-potensi">Peta Potensi</a>
          </div>
        </div>
        <div class="nav-item"><a href="{{ route('struktur') }}" class="nav-link {{ request()->routeIs('struktur') ? 'current' : '' }}">Struktur Nagari</a></div>
        <div class="nav-item"><a href="{{ route('lembaga') }}" class="nav-link {{ request()->routeIs('lembaga') ? 'current' : '' }}">Lembaga</a></div>
        <div class="nav-item"><a href="{{ route('umkm') }}" class="nav-link {{ request()->routeIs('umkm') ? 'current' : '' }}">UMKM</a></div>
        <div class="nav-item"><a href="{{ route('galeri') }}" class="nav-link {{ request()->routeIs('galeri') ? 'current' : '' }}">Galeri</a></div>
        <div class="nav-item"><a href="{{ route('login') }}" class="nav-link login-btn">Login</a></div>
      </div>

      <div class="hamburger" id="hamburgerBtn" onclick="toggleMobileMenu()">
        <span></span><span></span><span></span>
      </div>
    </div>

    <div class="mobile-menu" id="mobileMenu">
      <a href="{{ route('home') }}">Home</a>
      <a href="{{ route('Sejarah') }}">Sejarah</a>
      <a href="{{ route('pertanian') }}">Pertanian</a>
      <a href="{{ route('Peternakan') }}">Peternakan</a>
      <a href="{{ route('struktur') }}">Struktur Nagari</a>
      <a href="{{ route('lembaga') }}">Lembaga</a>
      <a href="{{ route('umkm') }}">UMKM</a>
      <a href="{{ route('galeri') }}">Galeri</a>
      <a href="{{ route('contact') }}">Hubungi Kami</a>
      <a href="{{ route('login') }}" style="color:var(--green-dark);font-weight:700;">Login Admin</a>
    </div>
  </nav>

  <!-- MAIN CONTENT -->
  <main>
    @yield('content')
  </main>

  <script>
    function toggleMobileMenu() {
      document.getElementById('mobileMenu').classList.toggle('open');
    }

    // Scroll reveal observer
    document.addEventListener('DOMContentLoaded', function() {
      const reveals = document.querySelectorAll('.reveal');
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if(entry.isIntersecting) {
            entry.target.classList.add('show');
          }
        });
      }, { threshold: 0.1 });

      reveals.forEach(el => observer.observe(el));
    });
  </script>

</body>
</html>