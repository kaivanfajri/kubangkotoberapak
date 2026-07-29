@extends('layouts.nagari')

@section('title', 'Katalog UMKM & Beras Nagari — Nagari Kubang Koto Berapak')

@section('content')
  <!-- HERO BANNER -->
  <div class="hero" style="background-image: url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1600&auto=format&fit=crop')">
    <div class="hero-content">
      <span class="hero-badge">Ekonomi Nagari</span>
      <h1>Katalog Digital UMKM Nagari Kubang</h1>
      <p class="hero-sub">Pemasaran produk usaha mikro masyarakat, olahan pangan lokal, kerajinan tangan, dan produk Beras Nagari unggulan.</p>
    </div>
  </div>

  <!-- TOOLBAR & CATALOG SECTION -->
  <div class="section">
    <div class="wrap">
      <!-- SEARCH & FILTER TOOLBAR -->
      <div class="toolbar reveal">
        <input type="text" id="umkmSearch" placeholder="Cari nama usaha atau produk..." oninput="filterUmkm()">
        <select id="umkmKategori" onchange="filterUmkm()">
          <option value="">Semua Kategori</option>
          <option value="Beras Nagari">Beras Nagari</option>
          <option value="Kuliner">Kuliner & Olahan</option>
          <option value="Kerajinan">Kerajinan Tangan</option>
          <option value="Sembako">Sembako & Hasil Bumi</option>
        </select>
        <select id="umkmSort" onchange="filterUmkm()">
          <option value="az">Urutkan A – Z</option>
          <option value="za">Urutkan Z – A</option>
        </select>
      </div>

      <!-- UMKM GRID -->
      <div class="grid grid-4 reveal" id="umkmGrid">
        <!-- Rendered by JS -->
      </div>

      <!-- KATALOG BERAS NAGARI SECTION -->
      <div class="eyebrow" style="margin-top: 60px;">Komoditas Unggulan</div>
      <h2 class="section-title reveal">Katalog Beras Nagari Kubang</h2>
      <p style="color:var(--muted); font-size:14px; margin-bottom: 24px;">Beras kuliner khas hasil panen persawahan Nagari Kubang yang diproses secara alami dan perah.</p>

      <div class="grid grid-3 reveal" id="berasGrid">
        <div class="card clickable card-hover">
          <div class="card-img" style="background-image:url('{{ asset('Durian taba.jpeg') }}')"></div>
          <div class="card-body">
            <span class="pill pill-gold">Beras Unggulan</span>
            <h4 style="margin-top:6px;">Beras Cisokan Kubang</h4>
            <div style="font-size:18px; font-weight:800; color:var(--gold-dark); margin:4px 0;">Rp 16.000 <span style="font-size:12px; color:var(--muted); font-weight:400;">/ kg</span></div>
            <p style="font-size:13px;">Beras tekstur perah khas Minang, sangat cocok untuk hidangan rumah makan dan nasi padang.</p>
            <a class="btn btn-wa btn-sm" style="margin-top:12px;" href="https://wa.me/6281234567890?text=Saya%20ingin%20memesan%20Beras%20Cisokan%20Kubang" target="_blank">Pesan via WA</a>
          </div>
        </div>

        <div class="card clickable card-hover">
          <div class="card-img" style="background-image:url('{{ asset('pertanian1.JPG') }}')"></div>
          <div class="card-body">
            <span class="pill pill-gold">Beras Super</span>
            <h4 style="margin-top:6px;">Beras Sokan Solok-Bayang</h4>
            <div style="font-size:18px; font-weight:800; color:var(--gold-dark); margin:4px 0;">Rp 17.500 <span style="font-size:12px; color:var(--muted); font-weight:400;">/ kg</span></div>
            <p style="font-size:13px;">Aroma wangi dan putih bersih tanpa pemutih buatan, dipanen langsung dari persawahan irigasi nagari.</p>
            <a class="btn btn-wa btn-sm" style="margin-top:12px;" href="https://wa.me/6281234567890?text=Saya%20ingin%20memesan%20Beras%20Sokan" target="_blank">Pesan via WA</a>
          </div>
        </div>

        <div class="card clickable card-hover">
          <div class="card-img" style="background-image:url('{{ asset('sawah balik.jpeg') }}')"></div>
          <div class="card-body">
            <span class="pill">Beras Organik</span>
            <h4 style="margin-top:6px;">Beras Merah Organik</h4>
            <div style="font-size:18px; font-weight:800; color:var(--gold-dark); margin:4px 0;">Rp 20.000 <span style="font-size:12px; color:var(--muted); font-weight:400;">/ kg</span></div>
            <p style="font-size:13px;">Kaya serat dan serat nutrisi tinggi, diproduksi khusus oleh kelompok tani secara alami.</p>
            <a class="btn btn-wa btn-sm" style="margin-top:12px;" href="https://wa.me/6281234567890?text=Saya%20ingin%20memesan%20Beras%20Merah%20Organik" target="_blank">Pesan via WA</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- DETAIL UMKM MODAL SECTION -->
  <div class="section section-alt" id="umkmDetailSection" style="display:none; scroll-margin-top: 90px;">
    <div class="wrap" style="max-width:860px;">
      <a class="back-link" onclick="closeUmkmDetail()">← Kembali ke Katalog UMKM</a>
      <h2 class="section-title" id="udTitle">Detail Usaha UMKM</h2>

      <div class="info-grid">
        <div class="info-box"><div class="k">Pemilik Usaha</div><div class="v" id="udPemilik">-</div></div>
        <div class="info-box"><div class="k">Kategori</div><div class="v" id="udKategori">-</div></div>
        <div class="info-box"><div class="k">Kontak WA</div><div class="v" id="udWaText">-</div></div>
      </div>

      <p style="color:var(--muted); line-height:1.8; font-size:14.5px; margin:20px 0;" id="udDesc"></p>

      <h3 style="color:var(--green-dark); margin:26px 0 12px; font-size:17px;">Produk Utama</h3>
      <div id="udProducts" style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:24px;"></div>

      <h3 style="color:var(--green-dark); margin:26px 0 12px; font-size:17px;">Peta & Lokasi Usaha</h3>
      <div class="map-embed" style="height:230px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.680552856706!2d100.563779!3d-1.21577!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd35538fb68881d%3A0xec799774440129c0!2sKantor%20Wali%20Nagari%20Kubang%20Koto%20berapak!5e0!3m2!1sid!2sid!4v1775002302337!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>

      <div style="margin-top:24px;">
        <a class="btn btn-wa" id="udWaBtn" href="#" target="_blank">Hubungi Pemilik via WhatsApp</a>
      </div>
    </div>
  </div>

  <!-- SECTION HUBUNGI KAMI -->
  <x-contact-section />

  <!-- FOOTER -->
  @include('layouts.footer')

  <!-- JS SEARCH, FILTER & DETAIL LOGIC -->
  <script>
    // Build UMKM list from database data passed via Blade
    const umkmList = @json($umkms->map(function($u) {
        return [
            'id' => 'u'.$u->id,
            'nama' => $u->nama_usaha,
            'kategori' => $u->kategori,
            'pemilik' => $u->pemilik,
            'hp' => $u->nomor_wa,
            'alamat' => $u->alamat,
            'img' => $u->foto ? '/storage/'.$u->foto : 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=600&auto=format&fit=crop',
            'desc' => $u->deskripsi,
            'products' => $u->produk_utama ?? [],
        ];
    })->values());

    function filterUmkm() {
      const q = document.getElementById('umkmSearch').value.toLowerCase();
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
      if (items.length === 0) {
        grid.innerHTML = '<p style="grid-column:1/-1; text-align:center; color:var(--muted); padding:30px;">Tidak ada UMKM yang sesuai pencarian.</p>';
        return;
      }

      grid.innerHTML = items.map(item => `
        <div class="card clickable card-hover" onclick="showUmkmDetail('${item.id}')">
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

    function showUmkmDetail(id) {
      const item = umkmList.find(x => x.id === id);
      if(!item) return;

      document.getElementById('udTitle').innerText = item.nama;
      document.getElementById('udPemilik').innerText = item.pemilik;
      document.getElementById('udKategori').innerText = item.kategori;
      document.getElementById('udWaText').innerText = '+' + item.hp;
      document.getElementById('udDesc').innerText = item.desc;
      document.getElementById('udWaBtn').href = `https://wa.me/${item.hp}?text=Halo%20${encodeURIComponent(item.pemilik)},%20saya%20tertarik%20dengan%20produk%20${encodeURIComponent(item.nama)}`;

      const pDiv = document.getElementById('udProducts');
      const products = Array.isArray(item.products) ? item.products : [];
      pDiv.innerHTML = products.map(p => `<span class="pill pill-gold">${p}</span>`).join('');

      const sec = document.getElementById('umkmDetailSection');
      sec.style.display = 'block';
      sec.scrollIntoView({ behavior: 'smooth' });
    }

    function closeUmkmDetail() {
      document.getElementById('umkmDetailSection').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', () => filterUmkm());
  </script>
@endsection
