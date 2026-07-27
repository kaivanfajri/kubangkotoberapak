@extends('layouts.nagari')

@section('title', 'Kelembagaan — Nagari Kubang Koto Berapak')

@section('content')
  <!-- HERO BANNER -->
  <div class="hero" style="background-image: url('https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=1600&auto=format&fit=crop')">
    <div class="hero-content">
      <span class="hero-badge">Kelembagaan</span>
      <h1>Lembaga Nagari Kubang Koto Berapak</h1>
      <p class="hero-sub">Lembaga kemasyarakatan dan adat yang menyokong pembangunan dan stabilitas sosial masyarakat.</p>
    </div>
  </div>

  @php
    $items = $lembagaData ?? [
      ['id' => 'bamus', 'nama' => 'BAMUS (Badan Musyawarah Nagari)', 'ketua' => 'WAHYU RESTU SAPUTRA Pnk. Dt Bagindo Rajo', 'anggota' => '5 Orang', 'hp' => '6281234567890', 'desc' => 'BAMUS merupakan lembaga perwujudan demokrasi dalam penyelenggaraan pemerintahan nagari yang menyalurkan aspirasi masyarakat dan menetapkan Peraturan Nagari bersama Wali Nagari.'],
      ['id' => 'kan', 'nama' => 'KAN (Kerapatan Adat Nagari)', 'ketua' => 'Datuk Sitia', 'anggota' => '12 Ninik Mamak', 'hp' => '6281234567891', 'desc' => 'KAN adalah lembaga tinggi adat yang mengurus dan menyelesaikan sengketa adat, mengayomi hukum adat Minangkabau berlandaskan Adat Basandi Syarak, Syarak Basandi Kitabullah.'],
      ['id' => 'lpmn', 'nama' => 'LPMN (Lembaga Pemberdayaan Masyarakat Nagari)', 'ketua' => 'Yusmardi DT. Mandaro Kayo', 'anggota' => '3 Pengurus', 'hp' => '6281234567894', 'desc' => 'LPMN membantu pemerintah nagari dalam merencanakan dan melaksanakan pembangunan secara bergotong royong.'],
      ['id' => 'pkk', 'nama' => 'TP-PKK Nagari', 'ketua' => 'Ibu Ratna', 'anggota' => '25 Anggota', 'hp' => '6281234567892', 'desc' => 'Tim Penggerak PKK berperan aktif dalam membina kesejahteraan keluarga, posyandu balita & lansia, serta pemberdayaan ekonomi perempuan di nagari.'],
      ['id' => 'kt', 'nama' => 'Karang Taruna Tunas Muda', 'ketua' => 'Rizki Bayang', 'anggota' => '35 Pemuda', 'hp' => '6281234567893', 'desc' => 'Wadah pengembangan generasi muda nagari dalam bidang olahraga, seni budaya Randai, serta aksi kemanusiaan dan tanggap bencana.'],
      ['id' => 'bumnag', 'nama' => 'BUMNag Kubang Berkah', 'ketua' => 'Dedi Saputra', 'anggota' => '7 Pengurus', 'hp' => '6281234567895', 'desc' => 'Badan Usaha Milik Nagari yang mengelola unit usaha pemasaran hasil tani, simpan pinjam, dan sarana produksi pertanian.']
    ];
  @endphp

  <!-- LEMBAGA GRID SECTION -->
  <div class="section">
    <div class="wrap">
      <div class="eyebrow">Kelembagaan Nagari</div>
      <h2 class="section-title reveal">Daftar Lembaga Kemasyarakatan & Adat</h2>
      <p style="color:var(--muted); font-size:14px; margin-bottom:24px;">Klik pada salah satu lembaga untuk melihat detail pengurus, fungsi, dan kontak WhatsApp.</p>

      <div class="grid grid-3 reveal">
        @foreach($items as $item)
          <div class="card clickable card-hover" onclick="showLembagaDetail('{{ $item['id'] }}')">
            <div class="card-body">
              <span class="pill pill-gold">Lembaga Nagari</span>
              <h4 style="margin-top:10px;">{{ $item['nama'] }}</h4>
              <p style="font-size:13px; margin-bottom:10px;">Ketua: <strong>{{ $item['ketua'] }}</strong></p>
              <p style="font-size:13px; color:var(--muted); line-height:1.5;">{{ Str::limit($item['desc'], 85) }}</p>
              <div style="margin-top:12px; font-size:12px; color:var(--green-dark); font-weight:600;">
                Anggota: {{ $item['anggota'] }}
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- DETAIL LEMBAGA SECTION -->
  <div class="section section-alt" id="lembagaDetailSection" style="display:none; scroll-margin-top: 90px;">
    <div class="wrap" style="max-width:820px;">
      <a class="back-link" onclick="closeLembagaDetail()">← Kembali ke Daftar Lembaga</a>
      <h2 class="section-title" id="ldNama">Detail Lembaga</h2>

      <div class="info-grid">
        <div class="info-box"><div class="k">Ketua Lembaga</div><div class="v" id="ldKetua">-</div></div>
        <div class="info-box"><div class="k">Jumlah Anggota</div><div class="v" id="ldAnggota">-</div></div>
        <div class="info-box"><div class="k">Status Aktivitas</div><div class="v" style="color:var(--green);">Aktif</div></div>
      </div>

      <p style="color:var(--muted); line-height:1.8; font-size:15px; margin:24px 0;" id="ldDesc"></p>

      <div style="margin-top:24px;">
        <a class="btn btn-wa" id="ldWaBtn" href="#" target="_blank">Hubungi Ketua Lembaga via WA</a>
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

    function showLembagaDetail(id) {
      const item = lembagaItems.find(x => x.id === id);
      if(!item) return;

      document.getElementById('ldNama').innerText = item.nama;
      document.getElementById('ldKetua').innerText = item.ketua;
      document.getElementById('ldAnggota').innerText = item.anggota;
      document.getElementById('ldDesc').innerText = item.desc;
      document.getElementById('ldWaBtn').href = `https://wa.me/${item.hp}?text=Halo%20Ketua%20${encodeURIComponent(item.nama)}`;

      const sec = document.getElementById('lembagaDetailSection');
      sec.style.display = 'block';
      sec.scrollIntoView({ behavior: 'smooth' });
    }

    function closeLembagaDetail() {
      document.getElementById('lembagaDetailSection').style.display = 'none';
    }
  </script>
@endsection
