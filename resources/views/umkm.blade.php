@extends('layouts.nagari')

@section('title', 'Katalog UMKM — Nagari Kubang Koto Berapak')

@section('content')
  <!-- HERO BANNER -->
  <div class="hero" style="background-image: url('{{ asset('Komoditi10.jpeg') }}')">
    <div class="hero-content">
      <span class="hero-badge">Ekonomi Nagari</span>
      <h1>Katalog Digital UMKM Nagari Kubang</h1>
      <p class="hero-sub">Pemasaran produk usaha mikro masyarakat, olahan pangan lokal, kerajinan tangan, dan potensi ekonomi nagari.</p>
    </div>
  </div>

  @php
    $featuredUmkm = $umkms->first();
  @endphp

  <!-- MAIN FEATURED UMKM SHOWCASE SECTION -->
  <div class="section" style="padding-top:40px; padding-bottom:50px;">
    <div class="wrap">
      <div class="eyebrow">Usaha Unggulan Nagari</div>
      <h2 class="section-title reveal">Profil &amp; Galeri UMKM Nagari</h2>

      @if($featuredUmkm)
        <div class="card reveal" style="border-radius:24px; overflow:hidden; border:1.5px solid #e2e8f0; background:#ffffff; box-shadow:0 12px 35px -10px rgba(0,0,0,0.08); margin-top:20px;">
          <div style="display:grid; grid-template-columns: minmax(0, 1.1fr) minmax(0, 1fr);" class="umkm-showcase-grid">
            
            <!-- LEFT SLIDER CAROUSEL (CLEAN FULL-BLEED SLIDER) -->
            <div style="position:relative; min-height:420px; height:100%; background:#f8fafc; overflow:hidden;" id="sliderContainer" onmouseenter="stopAutoSlide()" onmouseleave="startAutoSlide()">
              
              @php
                $slides = !empty($featuredUmkm['gallery']) ? $featuredUmkm['gallery'] : [$featuredUmkm['img']];
              @endphp

              <!-- SLIDE IMAGES -->
              @foreach($slides as $idx => $slideImg)
                <div class="umkm-slide-item {{ $idx === 0 ? 'active' : '' }}" style="position:absolute; inset:0; opacity: {{ $idx === 0 ? '1' : '0' }}; transition: opacity 0.5s ease-in-out; background-image:url('{{ $slideImg }}'); background-size:cover; background-position:center;"></div>
              @endforeach

              <!-- BADGE COUNTER TOP LEFT -->
              <div style="position:absolute; top:16px; left:16px; background:rgba(0,0,0,0.65); backdrop-filter:blur(8px); color:#fff; font-size:11.5px; font-weight:700; padding:5px 14px; border-radius:20px; border:1px solid rgba(255,255,255,0.25); z-index:3; box-shadow:0 4px 10px rgba(0,0,0,0.2);">
                📸 <span id="slideCounter">1 / {{ count($slides) }}</span>
              </div>

              <!-- SLIDER ARROWS LEFT & RIGHT -->
              @if(count($slides) > 1)
                <button type="button" onclick="prevSlide()" style="position:absolute; left:14px; top:50%; transform:translateY(-50%); width:40px; height:40px; border-radius:50%; background:rgba(255,255,255,0.85); backdrop-filter:blur(4px); border:none; cursor:pointer; font-weight:800; color:var(--ink); box-shadow:0 4px 14px rgba(0,0,0,0.2); display:flex; align-items:center; justify-content:center; font-size:16px; z-index:4; transition:all 0.2s;" onmouseover="this.style.background='#ffffff'" onmouseout="this.style.background='rgba(255,255,255,0.85)'">❮</button>
                <button type="button" onclick="nextSlide()" style="position:absolute; right:14px; top:50%; transform:translateY(-50%); width:40px; height:40px; border-radius:50%; background:rgba(255,255,255,0.85); backdrop-filter:blur(4px); border:none; cursor:pointer; font-weight:800; color:var(--ink); box-shadow:0 4px 14px rgba(0,0,0,0.2); display:flex; align-items:center; justify-content:center; font-size:16px; z-index:4; transition:all 0.2s;" onmouseover="this.style.background='#ffffff'" onmouseout="this.style.background='rgba(255,255,255,0.85)'">❯</button>

              @endif

            </div>

            <!-- RIGHT DETAILS BOX -->
            <div style="padding:32px 28px; display:flex; flex-direction:column; justify-content:space-between; background:#ffffff;">
              <div>
                <div style="display:flex; align-items:center; gap:8px; margin-bottom:12px; flex-wrap:wrap;">
                  <span class="pill pill-gold">{{ $featuredUmkm['kategori'] }}</span>
                  <span class="pill pill-green" style="font-size:10.5px;">✓ Terverifikasi Nagari</span>
                </div>

                <h3 style="font-size:1.6rem; font-weight:800; color:var(--green-dark); font-family:'Poppins',sans-serif; margin-bottom:6px; line-height:1.3;">
                  {{ $featuredUmkm['nama'] }}
                </h3>

                <p style="font-size:14px; color:var(--muted); margin-bottom:16px;">
                  Pemilik: <strong style="color:var(--ink);">{{ $featuredUmkm['pemilik'] }}</strong>
                </p>

                <!-- INFO METRICS -->
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:20px; background:#f8faf8; padding:14px 16px; border-radius:14px; border:1px solid #e2e8f0;">
                  <div>
                    <span style="font-size:10.5px; font-weight:700; color:var(--muted); text-transform:uppercase; display:block; letter-spacing:0.5px;">Lokasi / Jorong</span>
                    <strong style="font-size:13px; color:var(--green-dark);">{{ $featuredUmkm['alamat'] }}</strong>
                  </div>
                  <div>
                    <span style="font-size:10.5px; font-weight:700; color:var(--muted); text-transform:uppercase; display:block; letter-spacing:0.5px;">Jam Operasional</span>
                    <strong style="font-size:13px; color:var(--green-dark);">{{ $featuredUmkm['jam'] }}</strong>
                  </div>
                </div>

                <!-- DESKRIPSI -->
                <p style="font-size:13.5px; line-height:1.75; color:var(--ink); margin-bottom:20px;">
                  {{ $featuredUmkm['desc'] }}
                </p>

                <!-- PRODUK UTAMA -->
                @if(!empty($featuredUmkm['products']) && count($featuredUmkm['products']) > 0)
                  <div style="margin-bottom:24px;">
                    <span style="font-size:11px; font-weight:800; color:var(--green-dark); text-transform:uppercase; display:block; margin-bottom:8px; letter-spacing:0.5px;">Produk Utama:</span>
                    <div style="display:flex; gap:6px; flex-wrap:wrap;">
                      @foreach($featuredUmkm['products'] as $prod)
                        <span style="background:#e8f5e9; color:var(--green-dark); border:1px solid #c8e6c9; padding:5px 12px; border-radius:16px; font-size:12px; font-weight:600;">
                          {{ $prod }}
                        </span>
                      @endforeach
                    </div>
                  </div>
                @endif
              </div>

              <!-- WHATSAPP CONTACT ACTION BUTTON -->
              <div>
                @if(!empty($featuredUmkm['hp']))
                  <a href="https://wa.me/{{ trim($featuredUmkm['hp']) }}?text=Halo%20{{ urlencode($featuredUmkm['pemilik']) }},%20saya%20tertarik%20dengan%20produk%20{{ urlencode($featuredUmkm['nama']) }}" target="_blank" class="btn btn-wa" style="width:100%; justify-content:center; font-size:14.5px; font-weight:800; padding:13px 22px; border-radius:30px; box-shadow:0 6px 16px rgba(37,211,102,0.25);">
                    💬 Pesan / Hubungi Pemilik via WhatsApp
                  </a>
                @else
                  <div style="font-size:13px; color:var(--muted); font-weight:600; text-align:center; padding:12px; background:#f1f5f9; border-radius:14px;">
                    Kontak WhatsApp Belum Didaftarkan
                  </div>
                @endif
              </div>

            </div>
          </div>
        </div>
      @else
        <div style="text-align:center; padding:50px 20px; background:#ffffff; border-radius:20px; border:1px dashed #cbd5e1; margin-top:20px;">
          <p style="color:var(--muted); font-size:15px; font-weight:600;">Belum ada data UMKM yang diunggah di admin panel.</p>
        </div>
      @endif
    </div>
  </div>

  <!-- KATALOG UMKM LAINNYA SECTION (GRID FOR MULTIPLE UMKMs) -->
  @if($umkms->count() > 1)
    <div class="section section-alt">
      <div class="wrap">
        <div class="eyebrow">Daftar Usaha</div>
        <h2 class="section-title reveal">Katalog UMKM Nagari Lainnya</h2>

        <!-- SEARCH & FILTER TOOLBAR -->
        <div class="toolbar reveal" style="margin-top:20px;">
          <input type="text" id="umkmSearch" placeholder="Cari nama usaha atau produk..." oninput="filterUmkm()">
          <select id="umkmKategori" onchange="filterUmkm()">
            <option value="">Semua Kategori</option>
            <option value="Kuliner">Kuliner &amp; Olahan</option>
            <option value="Kerajinan">Kerajinan Tangan</option>
            <option value="Sembako">Sembako &amp; Hasil Bumi</option>
            <option value="Beras Nagari">Beras Nagari</option>
          </select>
          <select id="umkmSort" onchange="filterUmkm()">
            <option value="az">Urutkan A – Z</option>
            <option value="za">Urutkan Z – A</option>
          </select>
        </div>

        <!-- UMKM GRID -->
        <div class="grid grid-3 reveal" id="umkmGrid" style="margin-top:24px;">
          <!-- Rendered by JS -->
        </div>
      </div>
    </div>
  @endif

  <style>
    @media (max-width: 900px) {
      .umkm-showcase-grid {
        grid-template-columns: 1fr !important;
      }
      #sliderContainer {
        min-height: 300px !important;
      }
    }
  </style>

  <!-- SECTION HUBUNGI KAMI -->
  <x-contact-section />

  <!-- FOOTER -->
  @include('layouts.footer')

  <!-- JS AUTOMATIC SLIDER & CATALOG LOGIC -->
  <script>
    const umkmList = @json($umkms);
    const featuredSlidesCount = {{ !empty($slides) ? count($slides) : 1 }};
    let currentSlide = 0;
    let autoSlideInterval = null;

    function updateSlideUI() {
      const slides = document.querySelectorAll('.umkm-slide-item');
      const thumbs = document.querySelectorAll('#thumbStrip .thumb-item');
      const counter = document.getElementById('slideCounter');

      if (slides.length === 0) return;

      slides.forEach((s, i) => {
        if (i === currentSlide) {
          s.style.opacity = '1';
          s.classList.add('active');
        } else {
          s.style.opacity = '0';
          s.classList.remove('active');
        }
      });

      if (counter) {
        counter.innerText = `${currentSlide + 1} / ${slides.length}`;
      }
    }

    function nextSlide() {
      if (featuredSlidesCount <= 1) return;
      currentSlide = (currentSlide + 1) % featuredSlidesCount;
      updateSlideUI();
    }

    function prevSlide() {
      if (featuredSlidesCount <= 1) return;
      currentSlide = (currentSlide - 1 + featuredSlidesCount) % featuredSlidesCount;
      updateSlideUI();
    }

    function goToSlide(idx) {
      currentSlide = idx;
      updateSlideUI();
    }

    function startAutoSlide() {
      if (featuredSlidesCount > 1 && !autoSlideInterval) {
        // Slider berganti otomatis setiap 2.5 detik (2500 ms) agar nyaman dilihat
        autoSlideInterval = setInterval(nextSlide, 2500);
      }
    }

    function stopAutoSlide() {
      if (autoSlideInterval) {
        clearInterval(autoSlideInterval);
        autoSlideInterval = null;
      }
    }

    function filterUmkm() {
      const qInput = document.getElementById('umkmSearch');
      if (!qInput) return;

      const q = qInput.value.toLowerCase();
      const kat = document.getElementById('umkmKategori').value;
      const sort = document.getElementById('umkmSort').value;

      let filtered = umkmList.filter(item => {
        const matchQ = item.nama.toLowerCase().includes(q) || item.desc.toLowerCase().includes(q);
        const matchK = !kat || item.kategori === kat;
        return matchQ && matchK;
      });

      if (sort === 'az') filtered.sort((a, b) => a.nama.localeCompare(b.nama));
      else if (sort === 'za') filtered.sort((a, b) => b.nama.localeCompare(a.nama));

      renderUmkmGrid(filtered);
    }

    function renderUmkmGrid(items) {
      const grid = document.getElementById('umkmGrid');
      if (!grid) return;

      if (items.length === 0) {
        grid.innerHTML = '<p style="grid-column:1/-1; text-align:center; color:var(--muted); padding:30px;">Tidak ada UMKM yang sesuai pencarian.</p>';
        return;
      }

      grid.innerHTML = items.map(item => `
        <div class="card clickable card-hover">
          <div class="card-img" style="background-image:url('${item.img}')"></div>
          <div class="card-body">
            <span class="pill">${item.kategori}</span>
            <h4 style="margin-top:6px;">${item.nama}</h4>
            <p style="font-size:12.5px; margin-bottom:8px;">Pemilik: <strong>${item.pemilik}</strong></p>
            <p style="font-size:13px; line-height:1.5; color:var(--muted);">${item.desc.substring(0, 75)}...</p>
            <div style="margin-top:12px; font-size:12px; color:var(--green-dark); font-weight:600;">
              Lokasi: ${item.alamat}
            </div>
          </div>
        </div>
      `).join('');
    }

    document.addEventListener('DOMContentLoaded', () => {
      startAutoSlide();
      filterUmkm();
    });
  </script>
@endsection
