@extends('layouts.nagari')

@section('title', 'Kelembagaan — Nagari Kubang Koto Berapak')

@section('content')
  <!-- HERO BANNER -->
  <div class="hero" style="background-image: url('{{ asset('kantorwalinagari.jpg') }}')">
    <div class="hero-content">
      <span class="hero-badge">Kelembagaan</span>
      <h1>Lembaga Nagari Kubang Koto Berapak</h1>
      <p class="hero-sub">Lembaga pemerintahan &amp; adat, keagamaan, pendidikan, kesehatan, serta kepemudaan yang menyokong stabilitas &amp; pembangunan nagari.</p>
    </div>
  </div>

  @php
    $items = $lembagaData ?? [
      ['id' => 'bamus', 'kategori' => 'Pemerintahan & Adat', 'nama' => 'BAMUS (Badan Musyawarah Nagari)', 'ketua' => 'WAHYU RESTU SAPUTRA Pnk. Dt Bagindo Rajo', 'anggota' => '5 Orang', 'hp' => '', 'desc' => 'BAMUS merupakan lembaga perwujudan demokrasi dalam penyelenggaraan pemerintahan nagari yang menyalurkan aspirasi masyarakat dan menetapkan Peraturan Nagari bersama Wali Nagari.'],
      ['id' => 'kan', 'kategori' => 'Pemerintahan & Adat', 'nama' => 'KAN (Kerapatan Adat Nagari)', 'ketua' => 'Datuk Sitia', 'anggota' => '12 Ninik Mamak', 'hp' => '', 'desc' => 'KAN adalah lembaga tinggi adat yang mengurus dan menyelesaikan sengketa adat, mengayomi hukum adat Minangkabau berlandaskan Adat Basandi Syarak, Syarak Basandi Kitabullah.'],
      ['id' => 'lpmn', 'kategori' => 'Pemerintahan & Adat', 'nama' => 'LPMN (Lembaga Pemberdayaan Masyarakat Nagari)', 'ketua' => 'Yusmardi DT. Mandaro Kayo', 'anggota' => '3 Pengurus', 'hp' => '', 'desc' => 'LPMN membantu pemerintah nagari dalam merencanakan dan melaksanakan pembangunan secara bergotong royong.'],
      ['id' => 'paud', 'kategori' => 'Pendidikan & Keagamaan', 'nama' => 'PAUD / TK Nagari Kubang', 'ketua' => 'Ibu Nurbaiti S.Pd', 'anggota' => '45 Murid', 'hp' => '', 'desc' => 'Lembaga pendidikan anak usia dini untuk membentuk karakter dasar, kreativitas, dan kesiapan belajar anak-anak nagari.'],
      ['id' => 'sd', 'kategori' => 'Pendidikan & Keagamaan', 'nama' => 'SD Negeri Nagari Kubang', 'ketua' => 'Kepala Sekolah SD', 'anggota' => '120 Murid', 'hp' => '', 'desc' => 'Sekolah Dasar negeri penyelenggara pendidikan dasar 6 tahun bagi putra-putri Nagari Kubang Koto Berapak.'],
      ['id' => 'tpa', 'kategori' => 'Pendidikan & Keagamaan', 'nama' => 'TPA / TPQ Masjid Nagari', 'ketua' => 'Ust. Ahmad', 'anggota' => '60 Santri', 'hp' => '', 'desc' => 'Taman Pendidikan Al-Qur\'an wadah pembentukan akhlak karimah, baca tulis Al-Qur\'an, dan pendidikan agama Islam bagi anak-anak.'],
      ['id' => 'posyandu', 'kategori' => 'Kesehatan & Sosial', 'nama' => 'Posyandu Balita & Lansia', 'ketua' => 'Kader Kesehatan Nagari', 'anggota' => '15 Kader', 'hp' => '', 'desc' => 'Pelayanan kesehatan kemasyarakatan berkala untuk pemantauan tumbuh kembang balita, imunisasi, dan pemeriksaan kesehatan lansia.'],
      ['id' => 'pkk', 'kategori' => 'Kesehatan & Sosial', 'nama' => 'TP-PKK Nagari', 'ketua' => 'Ibu Ratna', 'anggota' => '25 Anggota', 'hp' => '', 'desc' => 'Tim Penggerak PKK berperan aktif dalam membina kesejahteraan keluarga, posyandu balita & lansia, serta pemberdayaan ekonomi perempuan di nagari.'],
      ['id' => 'kt', 'kategori' => 'Pemuda & Ekonomi', 'nama' => 'Karang Taruna Tunas Muda', 'ketua' => 'Rizki Bayang', 'anggota' => '35 Pemuda', 'hp' => '', 'desc' => 'Wadah pengembangan generasi muda nagari dalam bidang olahraga, seni budaya Randai, serta aksi kemanusiaan dan tanggap bencana.'],
      ['id' => 'bumnag', 'kategori' => 'Pemuda & Ekonomi', 'nama' => 'BUMNag Kubang Berkah', 'ketua' => 'Dedi Saputra', 'anggota' => '7 Pengurus', 'hp' => '', 'desc' => 'Badan Usaha Milik Nagari yang mengelola unit usaha pemasaran hasil tani, simpan pinjam, dan sarana produksi pertanian.']
    ];
  @endphp

  <!-- LEMBAGA GRID SECTION -->
  <div class="section">
    <div class="wrap">
      <div class="eyebrow">Kelembagaan Nagari</div>
      <h2 class="section-title reveal">Daftar Lembaga Nagari &amp; Pendidikan</h2>
      <p style="color:var(--muted); font-size:14px; margin-bottom:20px;">Klik kategori di bawah untuk memfilter lembaga sesuai bidangnya.</p>

      <!-- FILTER CATEGORY BUTTONS -->
      <div class="filter-bar reveal" id="lembagaFilter" style="margin-bottom:28px;">
        <button class="filter-btn active" onclick="filterLembaga('all', this)">Semua Lembaga</button>
        <button class="filter-btn" onclick="filterLembaga('Pemerintahan & Adat', this)">Pemerintahan &amp; Adat</button>
        <button class="filter-btn" onclick="filterLembaga('Pendidikan & Keagamaan', this)">Pendidikan &amp; Keagamaan</button>
        <button class="filter-btn" onclick="filterLembaga('Kesehatan & Sosial', this)">Kesehatan &amp; Sosial</button>
        <button class="filter-btn" onclick="filterLembaga('Pemuda & Ekonomi', this)">Pemuda &amp; Ekonomi</button>
      </div>

      <div class="grid grid-3 reveal" id="lembagaGrid">
        <!-- Rendered by JS -->
      </div>
    </div>
  </div>

  <!-- DETAIL LEMBAGA SECTION -->
  <div class="section section-alt" id="lembagaDetailSection" style="display:none; scroll-margin-top: 90px;">
    <div class="wrap" style="max-width:820px;">
      <a class="back-link" onclick="closeLembagaDetail()">← Kembali ke Daftar Lembaga</a>
      <h2 class="section-title" id="ldNama">Detail Lembaga</h2>

      <div class="info-grid">
        <div class="info-box"><div class="k">Ketua / Pimpinan</div><div class="v" id="ldKetua">-</div></div>
        <div class="info-box"><div class="k">Kategori</div><div class="v" id="ldKategori">-</div></div>
        <div class="info-box"><div class="k">Jumlah Anggota</div><div class="v" id="ldAnggota">-</div></div>
      </div>

      <p style="color:var(--muted); line-height:1.8; font-size:15px; margin:24px 0;" id="ldDesc"></p>

      <div style="margin-top:24px;">
        <a class="btn btn-wa" id="ldWaBtn" href="#" target="_blank">Hubungi Pimpinan Lembaga via WA</a>
      </div>
    </div>
  </div>

  <!-- SECTION HUBUNGI KAMI -->
  <x-contact-section />

  <!-- FOOTER -->
  @include('layouts.footer')

  <!-- JS LEMBAGA INTERACTIVE LOGIC -->
  <script>
    const lembagaItems = @json($items);
    let activeCategory = 'all';

    function filterLembaga(cat, btnEl) {
      activeCategory = cat;
      if (btnEl) {
        document.querySelectorAll('#lembagaFilter .filter-btn').forEach(b => b.classList.remove('active'));
        btnEl.classList.add('active');
      }

      let filtered = lembagaItems;
      if (cat !== 'all') {
        filtered = lembagaItems.filter(item => (item.kategori || '').toLowerCase() === cat.toLowerCase());
      }

      renderLembagaGrid(filtered);
    }

    function renderLembagaGrid(items) {
      const grid = document.getElementById('lembagaGrid');
      if (items.length === 0) {
        grid.innerHTML = '<p style="grid-column:1/-1; text-align:center; color:var(--muted); padding:30px;">Belum ada lembaga untuk kategori ini.</p>';
        return;
      }

      const imgPemerintahan = "{{ asset('kantorwalinagari.jpg') }}";
      const imgPendidikan = "{{ asset('Sejarah4.jpeg') }}";
      const imgKesehatan = "{{ asset('Profil2.JPG') }}";
      const imgPemuda = "{{ asset('Profil3.JPG') }}";

      grid.innerHTML = items.map(item => {
        const kat = item.kategori || 'Lembaga Nagari';
        let pillClass = 'pill-gold';
        let fallbackImg = imgPemerintahan;
        if (kat.includes('Pendidikan')) {
          pillClass = 'pill-blue';
          fallbackImg = imgPendidikan;
        } else if (kat.includes('Kesehatan')) {
          pillClass = 'pill-green';
          fallbackImg = imgKesehatan;
        } else if (kat.includes('Pemuda')) {
          pillClass = 'pill-gold';
          fallbackImg = imgPemuda;
        }

        // Gunakan foto lokasi asli jika ada, fallback ke foto kategori
        const cardBgImg = (item.foto && item.foto.trim() !== '')
          ? '/storage/' + item.foto
          : fallbackImg;

        return `
          <div class="card clickable card-hover" onclick="showLembagaDetail('${item.id}')" style="overflow:hidden; display:flex; flex-direction:column;">
            <div class="card-img" style="height:150px; background-image:url('${cardBgImg}'); background-size:cover; background-position:center;"></div>
            <div class="card-body" style="flex:1; display:flex; flex-direction:column; justify-content:space-between; padding:20px;">
              <div>
                <span class="pill ${pillClass}">${kat}</span>
                <h4 style="margin-top:10px;">${item.nama}</h4>
                <p style="font-size:13px; margin-bottom:10px;">Ketua/Pimpinan: <strong>${item.ketua}</strong></p>
                <p style="font-size:13px; color:var(--muted); line-height:1.5;">${(item.desc || '').substring(0, 85)}...</p>
              </div>
              <div style="margin-top:12px; font-size:12px; color:var(--green-dark); font-weight:600;">
                Kapasitas / Anggota: ${item.anggota}
              </div>
            </div>
          </div>
        `;
      }).join('');
    }

    function showLembagaDetail(id) {
      const item = lembagaItems.find(x => x.id === id);
      if(!item) return;

      document.getElementById('ldNama').innerText = item.nama;
      document.getElementById('ldKetua').innerText = item.ketua;
      document.getElementById('ldKategori').innerText = item.kategori || 'Lembaga Nagari';
      document.getElementById('ldAnggota').innerText = item.anggota;
      document.getElementById('ldDesc').innerText = item.desc;

      const waBtn = document.getElementById('ldWaBtn');
      if (item.hp && item.hp.trim() !== '') {
        waBtn.style.display = 'inline-flex';
        waBtn.href = `https://wa.me/${item.hp.trim()}?text=Halo%20Pimpinan%20${encodeURIComponent(item.nama)}`;
      } else {
        waBtn.style.display = 'none';
      }

      const sec = document.getElementById('lembagaDetailSection');
      sec.style.display = 'block';
      sec.scrollIntoView({ behavior: 'smooth' });
    }

    function closeLembagaDetail() {
      document.getElementById('lembagaDetailSection').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', () => filterLembaga('all'));
  </script>
@endsection
