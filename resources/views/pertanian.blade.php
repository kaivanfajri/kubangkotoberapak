@extends('layouts.nagari')

@section('title', 'Potensi Pertanian — Nagari Kubang Koto Berapak')

@section('content')
  <!-- HERO BANNER -->
  <div class="hero" style="background-image: url('{{ asset('pertanian1.JPG') }}')">
    <div class="hero-content">
      <span class="hero-badge">Potensi Nagari</span>
      <h1>Pertanian Nagari Kubang Koto Berapak</h1>
      <p class="hero-sub">Lahan dataran rendah subur dan jaringan irigasi sungai pembawa keberkahan hasil panen padi dan hortikultura.</p>
    </div>
  </div>

  <!-- OVERVIEW SECTION -->
  <div class="section">
    <div class="wrap">
      <div class="eyebrow">Pertanian di Nagari Kubang Bayang</div>
      <p class="section-lead reveal">
        Nagari Kubang Koto Berapak memiliki bentang alam yang sangat mendukung kegiatan pertanian sawah. Ketersediaan lahan dataran rendah yang luas, kesuburan tanah, serta dukungan sumber air dari aliran sungai menjadikan nagari ini sebagai lumbung padi utama di Kecamatan Bayang. Sektor pertanian ditopang oleh tujuh kelompok tani aktif yang menerapkan teknologi tepat guna dan kearifan lokal.
      </p>

      <!-- 7 KOMODITAS UNGGULAN -->
      <div class="eyebrow" style="margin-top: 54px;">Komoditi</div>
      <h2 class="section-title reveal">Tujuh Komoditas Unggulan</h2>
      <div class="grid grid-3 reveal" style="margin-top: 26px;">
        <div class="card card-hover">
          <div class="card-img" style="background-image:url('{{ asset('Durian taba.jpeg') }}')"></div>
          <div class="card-body">
            <h4 style="margin-top: 8px;">1. Padi Sawah</h4>
            <p>Tulang punggung ketahanan pangan nagari. Ditanam di persawahan irigasi teknis dengan varietas unggul seperti Cisokan dan Sokan.</p>
          </div>
        </div>

        <div class="card card-hover">
          <div class="card-img" style="background-image:url('{{ asset('Komoditi2.jpeg') }}')"></div>
          <div class="card-body">
            <h4 style="margin-top: 8px;">2. Semangka</h4>
            <p>Hortikultura musiman pasca panen padi, dimanfaatkan menjelang bulan Ramadhan dengan hasil manis dan permintaan pasar tinggi.</p>
          </div>
        </div>

        <div class="card card-hover">
          <div class="card-img" style="background-image:url('{{ asset('Komoditi3.jpeg') }}')"></div>
          <div class="card-body">
            <h4 style="margin-top: 8px;">3. Pinang</h4>
            <p>Komoditas perkebunan bernilai ekonomi tinggi untuk komoditas pasar domestik dan ekspor industri pertekstilan & farmasi.</p>
          </div>
        </div>

        <div class="card card-hover">
          <div class="card-img" style="background-image:url('{{ asset('Komoditi4.jpeg') }}')"></div>
          <div class="card-body">
            <h4 style="margin-top: 8px;">4. Pala</h4>
            <p>Tanaman rempah beraroma khas bernilai jual tinggi yang dikelola secara turun-temurun di kebun perbukitan warga.</p>
          </div>
        </div>

        <div class="card card-hover">
          <div class="card-img" style="background-image:url('{{ asset('Komoditi6.jpeg') }}')"></div>
          <div class="card-body">
            <h4 style="margin-top: 8px;">5. Karet</h4>
            <p>Perkebunan rakyat penopang pendapatan harian warga melalui penyadapan getah karet secara rutin.</p>
          </div>
        </div>

        <div class="card card-hover">
          <div class="card-img" style="background-image:url('{{ asset('Komoditi7.jpeg') }}')"></div>
          <div class="card-body">
            <h4 style="margin-top: 8px;">6. Jagung</h4>
            <p>Tanaman rotasi lahan kering dan sumber pakan ternak pakan konsentrat peternakan sapi lokal.</p>
          </div>
        </div>
      </div>

      <!-- KELOMPOK TANI GRID -->
      <div id="kelompok-tani" style="scroll-margin-top: 100px;"></div>
      <div class="eyebrow" style="margin-top: 60px;">Informasi Kelompok Tani</div>
      <h2 class="section-title reveal">Tujuh Kelompok Tani Aktif</h2>
      <p style="color:var(--muted); font-size:14px; margin-bottom: 24px;">Klik pada salah satu kelompok tani untuk melihat detail anggota, lokasi peta, dan kontak ketua.</p>

      <div class="grid grid-3 reveal" id="taniGrid">
        <!-- Javascript dynamic render -->
      </div>
    </div>
  </div>

  <!-- DETAIL KELOMPOK TANI MODAL / SECTION -->
  <div class="section section-alt" id="taniDetailSection" style="display:none; scroll-margin-top: 90px;">
    <div class="wrap">
      <a class="back-link" onclick="closeTaniDetail()">← Kembali ke Daftar Kelompok Tani</a>
      <h2 class="section-title" id="tdNama">Detail Kelompok Tani</h2>
      
      <div class="info-grid">
        <div class="info-box"><div class="k">Ketua Kelompok</div><div class="v" id="tdKetua">-</div></div>
        <div class="info-box"><div class="k">Lokasi Jorong</div><div class="v" id="tdAlamat">-</div></div>
        <div class="info-box"><div class="k">Jumlah Anggota</div><div class="v" id="tdAnggota">-</div></div>
        <div class="info-box"><div class="k">Luas Lahan</div><div class="v" id="tdLuas">-</div></div>
        <div class="info-box"><div class="k">Komoditas Utama</div><div class="v" id="tdKomoditas">-</div></div>
        <div class="info-box"><div class="k">Estimasi Panen</div><div class="v" id="tdProduktivitas">-</div></div>
      </div>

      <h3 style="color:var(--green-dark); margin:36px 0 14px; font-size:18px;">Daftar Anggota Petani</h3>
      <div class="table-wrap">
        <table>
          <thead>
            <tr><th>Nama Petani</th><th>Komoditas</th><th>Luas Lahan</th><th>Status</th></tr>
          </thead>
          <tbody id="tdMembersTable">
            <!-- Rendered by JS -->
          </tbody>
        </table>
      </div>

      <h3 style="color:var(--green-dark); margin:36px 0 14px; font-size:18px;">Galeri Kegiatan Kelompok Tani</h3>
      <div class="grid grid-3">
        <img src="{{ asset('Pertanian3.JPG') }}" style="border-radius:14px; box-shadow:var(--shadow); height:180px; object-fit:cover; width:100%;">
        <img src="{{ asset('Pertanian4.JPG') }}" style="border-radius:14px; box-shadow:var(--shadow); height:180px; object-fit:cover; width:100%;">
        <img src="{{ asset('Pertanian5.JPG') }}" style="border-radius:14px; box-shadow:var(--shadow); height:180px; object-fit:cover; width:100%;">
      </div>

      <h3 style="color:var(--green-dark); margin:36px 0 14px; font-size:18px;">Lokasi Lahan Pertanian</h3>
      <div class="map-embed" style="height:260px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.680552856706!2d100.563779!3d-1.21577!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd35538fb68881d%3A0xec799774440129c0!2sKantor%20Wali%20Nagari%20Kubang%20Koto%20berapak!5e0!3m2!1sid!2sid!4v1775002302337!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>

      <div style="margin-top: 24px;">
        <a class="btn btn-wa" id="tdWaBtn" href="#" target="_blank">Hubungi Ketua via WhatsApp</a>
      </div>
    </div>
  </div>

  <!-- SECTION HUBUNGI KAMI -->
  <x-contact-section />

  <!-- FOOTER -->
  @include('layouts.footer')

  <!-- JS KELOMPOK TANI INTERACTIVE LOGIC -->
  <script>
    // Build from database, fallback to static data
    const kelompokTaniDB = @json($kelompokTanis);

    const kelompokTaniFallback = [
      { id: 'durian-taba', nama: 'Kelompok Tani Durian Taba', ketua: 'H. Zulkifli', hp: '', alamat: 'Jorong Durian Taba', anggota: 22, luas: '20 Ha', komoditas: 'Padi Sokan', produktivitas: '6.1 Ton/Ha', status: 'Aktif', members: [['Zulkifli', 'Padi', '1.2 Ha', 'Aktif'], ['Rahman', 'Padi', '0.9 Ha', 'Aktif'], ['Yusra', 'Padi', '1.5 Ha', 'Aktif'], ['Budi', 'Padi & Semangka', '1.0 Ha', 'Aktif']] },
      { id: 'sungai-tapuh', nama: 'Kelompok Tani Sungai Tapuh', ketua: 'Ridwan', hp: '', alamat: 'Jorong Sungai Tapuh', anggota: 19, luas: '23 Ha', komoditas: 'Padi Cisokan', produktivitas: '7.2 Ton/Ha', status: 'Aktif', members: [['Ridwan', 'Padi', '1.4 Ha', 'Aktif'], ['Fitri', 'Padi', '1.1 Ha', 'Aktif'], ['Anton', 'Padi', '1.0 Ha', 'Aktif']] },
      { id: 'pintu-rayo-1', nama: 'Kelompok Tani Pintu Rayo I', ketua: 'Basri', hp: '', alamat: 'Jorong Pintu Rayo', anggota: 20, luas: '20 Ha', komoditas: 'Padi & Semangka', produktivitas: '6.7 Ton/Ha', status: 'Aktif', members: [['Basri', 'Padi', '1.3 Ha', 'Aktif'], ['Hasan', 'Semangka', '0.8 Ha', 'Aktif'], ['Syamsul', 'Padi', '1.2 Ha', 'Aktif']] },
      { id: 'pintu-rayo-2', nama: 'Kelompok Tani Pintu Rayo II', ketua: 'Nurdin', hp: '', alamat: 'Jorong Pintu Rayo', anggota: 18, luas: '18 Ha', komoditas: 'Padi Sawah', produktivitas: '6.3 Ton/Ha', status: 'Aktif', members: [['Nurdin', 'Padi', '1.1 Ha', 'Aktif'], ['Mardi', 'Padi', '0.9 Ha', 'Aktif'], ['Zainal', 'Padi', '1.4 Ha', 'Aktif']] },
      { id: 'sawah-balik', nama: 'Kelompok Tani Sawah Balik', ketua: 'Syafril', hp: '', alamat: 'Jorong Sawah Balik', anggota: 25, luas: '27 Ha', komoditas: 'Padi & Jagung', produktivitas: '7.0 Ton/Ha', status: 'Aktif', members: [['Syafril', 'Padi', '1.6 Ha', 'Aktif'], ['Arman', 'Jagung', '1.2 Ha', 'Aktif'], ['Kadir', 'Padi', '1.0 Ha', 'Aktif']] },
      { id: 'anak-aia', nama: 'Kelompok Tani Anak Aia', ketua: 'Bachtiar', hp: '', alamat: 'Jorong Anak Aia', anggota: 21, luas: '22 Ha', komoditas: 'Padi & Hortikultura', produktivitas: '6.5 Ton/Ha', status: 'Aktif', members: [['Bachtiar', 'Padi', '1.5 Ha', 'Aktif'], ['Eri', 'Hortikultura', '0.7 Ha', 'Aktif'], ['Joni', 'Padi', '1.1 Ha', 'Aktif']] },
      { id: 'ikua-koto', nama: 'Kelompok Tani Ikua Koto', ketua: 'Darmansyah', hp: '', alamat: 'Jorong Ikua Koto', anggota: 24, luas: '25 Ha', komoditas: 'Padi Sawah', produktivitas: '6.8 Ton/Ha', status: 'Aktif', members: [['Darmansyah', 'Padi', '1.7 Ha', 'Aktif'], ['Taufik', 'Padi', '1.2 Ha', 'Aktif'], ['Wandra', 'Padi', '1.1 Ha', 'Aktif']] }
    ];

    const kelompokTaniData = kelompokTaniDB.length > 0 ? kelompokTaniDB : kelompokTaniFallback;

    function renderTaniGrid() {
      const grid = document.getElementById('taniGrid');
      grid.innerHTML = kelompokTaniData.map(item => `
        <div class="card clickable card-hover" onclick="showTaniDetail('${item.id}')">
          <div class="card-body">
            <span class="pill pill-gold">${item.status || 'Aktif'}</span>
            <h4 style="margin-top:8px;">${item.nama}</h4>
            <p style="font-size:13px; margin-bottom:10px;">Ketua: <strong>${item.ketua}</strong></p>
            <div style="font-size:12.5px; color:var(--muted); display:flex; justify-content:space-between; border-top:1px solid #f0f4f0; padding-top:8px;">
              <span>Lokasi: ${item.alamat}</span>
              <span>Anggota: ${item.anggota}</span>
            </div>
          </div>
        </div>
      `).join('');
    }

    function showTaniDetail(id) {
      const item = kelompokTaniData.find(x => x.id === id);
      if(!item) return;

      document.getElementById('tdNama').innerText = item.nama;
      document.getElementById('tdKetua').innerText = item.ketua;
      document.getElementById('tdAlamat').innerText = item.alamat;
      document.getElementById('tdAnggota').innerText = item.anggota + ' Petani';
      document.getElementById('tdLuas').innerText = item.luas;
      document.getElementById('tdKomoditas').innerText = item.komoditas;
      document.getElementById('tdProduktivitas').innerText = item.produktivitas;
      
      const waBtn = document.getElementById('tdWaBtn');
      if (item.hp && item.hp.trim() !== '') {
        waBtn.style.display = 'inline-flex';
        waBtn.href = `https://wa.me/${item.hp.trim()}?text=Halo%20Ketua%20${encodeURIComponent(item.nama)}`;
      } else {
        waBtn.style.display = 'none';
      }

      const tbody = document.getElementById('tdMembersTable');
      tbody.innerHTML = item.members.map(m => `
        <tr>
          <td style="font-weight:600; color:var(--green-dark);">${m[0]}</td>
          <td>${m[1]}</td>
          <td>${m[2]}</td>
          <td><span class="pill">${m[3]}</span></td>
        </tr>
      `).join('');

      const sec = document.getElementById('taniDetailSection');
      sec.style.display = 'block';
      sec.scrollIntoView({ behavior: 'smooth' });
    }

    function closeTaniDetail() {
      document.getElementById('taniDetailSection').style.display = 'none';
      document.getElementById('kelompok-tani').scrollIntoView({ behavior: 'smooth' });
    }

    document.addEventListener('DOMContentLoaded', renderTaniGrid);
  </script>
@endsection