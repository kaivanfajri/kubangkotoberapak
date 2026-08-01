@extends('layouts.nagari')

@section('title', 'Galeri Dokumentasi — Nagari Kubang Koto Berapak')

@section('content')
  <!-- HERO BANNER -->
  <div class="hero" style="background-image: url('{{ asset('Pemandangan.jpeg') }}')">
    <div class="hero-content">
      <span class="hero-badge">Dokumentasi</span>
      <h1>Galeri Nagari Kubang Koto Berapak</h1>
      <p class="hero-sub">Potret keindahan bentang alam, kehidupan masyarakat agraris, tradisi adat, dan kegiatan nagari.</p>
    </div>
  </div>

  <!-- GALLERY SECTION -->
  <div class="section">
    <div class="wrap">
      <!-- FILTER BUTTONS -->
      <div class="filter-bar reveal" id="galFilter">
        <button class="filter-btn active" onclick="filterGallery('all', this)">Semua Foto</button>
        <button class="filter-btn" onclick="filterGallery('Pertanian', this)">Pertanian</button>
        <button class="filter-btn" onclick="filterGallery('Peternakan', this)">Peternakan</button>
        <button class="filter-btn" onclick="filterGallery('Adat & Sejarah', this)">Adat & Sejarah</button>
        <button class="filter-btn" onclick="filterGallery('Peta Wilayah', this)">Peta Wilayah</button>
        <button class="filter-btn" onclick="filterGallery('Kegiatan Nagari', this)">Kegiatan Nagari</button>
      </div>

      <!-- MASONRY GRID -->
      <div class="masonry reveal" id="galGrid">
        <!-- Rendered by JS -->
      </div>
    </div>
  </div>

  <!-- LIGHTBOX MODAL -->
  <div class="lightbox" id="lightboxModal">
    <span class="lightbox-close" onclick="closeLightbox()">✕</span>
    <span class="lightbox-nav lightbox-prev" onclick="shiftLightbox(-1)">‹</span>
    <img id="lightboxImg" src="" alt="Full view">
    <span class="lightbox-nav lightbox-next" onclick="shiftLightbox(1)">›</span>
    <div class="lightbox-cap" id="lightboxCap"></div>
  </div>

  <!-- SECTION HUBUNGI KAMI -->
  <x-contact-section />

  <!-- FOOTER -->
  @include('layouts.footer')

  <!-- JS GALLERY & LIGHTBOX LOGIC -->
  <script>
    // Build gallery items from database data
    const galleryItems = @json($galeris);

    // Fallback: if no DB data yet, use static assets
    const fallbackItems = [
      { src: "{{ asset('Profil2.JPG') }}", cat: 'Adat & Sejarah', cap: 'Pemandangan Persawahan Nagari Kubang' },
      { src: "{{ asset('Profil3.JPG') }}", cat: 'Adat & Sejarah', cap: 'Hamparan Sawah Irigasi Sungai Bayang' },
      { src: "{{ asset('pertanian1.JPG') }}", cat: 'Pertanian', cap: 'Aktivitas Panen Padi Sawah Tani' },
      { src: "{{ asset('Pertanian2.jpeg') }}", cat: 'Pertanian', cap: 'Bibit Padi Unggul Cisokan' },
      { src: "{{ asset('Pertanian3.JPG') }}", cat: 'Pertanian', cap: 'Pengolahan Lahan Sawah' },
      { src: "{{ asset('Pertanian4.JPG') }}", cat: 'Pertanian', cap: 'Sistem Irigasi Tradisional Nagari' },
      { src: "{{ asset('Peternakan1.jpeg') }}", cat: 'Peternakan', cap: 'Peternakan Sapi Potong Nagari' },
      { src: "{{ asset('Peternakan2.jpeg') }}", cat: 'Peternakan', cap: 'Penggembalaan Ternak Harian' },
      { src: "{{ asset('Peternakan3.jpeg') }}", cat: 'Peternakan', cap: 'Pemberian Pakan Hijauan' },
      { src: "{{ asset('Sejarah1.JPG') }}", cat: 'Adat & Sejarah', cap: 'Bentang Alam Bersejarah Nagari Kubang' },
      { src: "{{ asset('Sejarah4.jpeg') }}", cat: 'Adat & Sejarah', cap: 'Batu Adat Perlindungan Nagari' },
      { src: "{{ asset('Peta potensi nagari.jpeg') }}", cat: 'Peta Wilayah', cap: 'Peta Potensi Lahan Nagari' },
      { src: "{{ asset('peta topografi.jpeg') }}", cat: 'Peta Wilayah', cap: 'Peta Topografi & Kontur' },
      { src: "{{ asset('Peta rawan kebencanaan.jpeg') }}", cat: 'Peta Wilayah', cap: 'Peta Mitigasi Bencana' }
    ];

    const allItems = galleryItems.length > 0 ? galleryItems : fallbackItems;

    let activeIndex = 0;
    let visibleItems = [...allItems];

    function filterGallery(cat, btnEl) {
      if(btnEl) {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btnEl.classList.add('active');
      }

      if(cat === 'all') {
        visibleItems = [...allItems];
      } else {
        visibleItems = allItems.filter(x => x.cat === cat);
      }

      renderGallery();
    }

    function renderGallery() {
      const grid = document.getElementById('galGrid');
      grid.innerHTML = visibleItems.map((item, idx) => `
        <div class="masonry-item">
          <img src="${item.src}" alt="${item.cap}" onclick="openLightbox(${idx})">
        </div>
      `).join('');
    }

    function openLightbox(idx) {
      activeIndex = idx;
      const modal = document.getElementById('lightboxModal');
      const img = document.getElementById('lightboxImg');
      const cap = document.getElementById('lightboxCap');

      img.src = visibleItems[activeIndex].src;
      cap.innerText = visibleItems[activeIndex].cap;
      modal.classList.add('open');
    }

    function closeLightbox() {
      document.getElementById('lightboxModal').classList.remove('open');
    }

    function shiftLightbox(dir) {
      activeIndex = (activeIndex + dir + visibleItems.length) % visibleItems.length;
      document.getElementById('lightboxImg').src = visibleItems[activeIndex].src;
      document.getElementById('lightboxCap').innerText = visibleItems[activeIndex].cap;
    }

    document.addEventListener('DOMContentLoaded', () => renderGallery());
  </script>
@endsection
