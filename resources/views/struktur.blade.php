@extends('layouts.nagari')

@section('title', 'Struktur Pemerintahan — Nagari Kubang Koto Berapak')

@section('content')
  <!-- HERO BANNER -->
  <div class="hero" style="background-image: url('https://images.unsplash.com/photo-1590650046871-92c887180603?q=80&w=1600&auto=format&fit=crop')">
    <div class="hero-content">
      <span class="hero-badge">Pemerintahan Nagari</span>
      <h1>Struktur Pemerintahan Nagari Kubang Koto Berapak</h1>
      <p class="hero-sub">Kecamatan Bayang, Kabupaten Pesisir Selatan</p>
    </div>
  </div>

  @php
    $pemerintah = $strukturData['pemerintah'] ?? [
      ['jabatan' => 'Wali Nagari', 'nama' => 'NOVRIADI'],
      ['jabatan' => 'Sekretaris Nagari', 'nama' => 'FITRA S.E'],
      ['jabatan' => 'Kaur Perencanaan', 'nama' => 'IRWANSYAH'],
      ['jabatan' => 'Kaur Keuangan', 'nama' => 'IBNU NURSIDIQ'],
      ['jabatan' => 'Kaur TU & Umum', 'nama' => 'DAYU NIRMALA DEWI S.E'],
      ['jabatan' => 'Kasi Pemerintahan', 'nama' => 'LIRA MARLINA'],
      ['jabatan' => 'Kasi Kesejahteraan dan Pelayanan', 'nama' => 'DITA MILENIA S.Si'],
      ['jabatan' => 'Staf Nagari', 'nama' => 'ALVI MAHENDRA'],
      ['jabatan' => 'Staf Bamus', 'nama' => 'WELLA SILVIKA S.Pd.I'],
      ['jabatan' => 'Wali Kampung Kubang', 'nama' => 'EM ROMI'],
      ['jabatan' => 'Wali Kampung Lembah Gumanti', 'nama' => 'WAN FEBRINDO S.Pd']
    ];

    $bamus = $strukturData['bamus'] ?? [
      ['jabatan' => 'Ketua', 'nama' => 'WAHYU RESTU SAPUTRA Pnk. Dt Bagindo Rajo'],
      ['jabatan' => 'Wakil Ketua', 'nama' => 'VENDRIANTO'],
      ['jabatan' => 'Sekretaris', 'nama' => 'NELLA AMELIA'],
      ['jabatan' => 'Anggota', 'nama' => 'SANJU YUSAFRINANDA'],
      ['jabatan' => 'Anggota', 'nama' => 'ILHAM S.Pd.I']
    ];

    $lpmn = $strukturData['lpmn'] ?? [
      ['jabatan' => 'Ketua', 'nama' => 'Yusmardi DT. Mandaro Kayo'],
      ['jabatan' => 'Sekretaris', 'nama' => 'Marjuliadi'],
      ['jabatan' => 'Bendahara', 'nama' => 'Marjan Delmi PNK. DT. Rky Basa']
    ];

    $slogan = $strukturData['slogan'] ?? 'Basamo Mangko Manjadi';
  @endphp

  <!-- STRUKTUR BOARD SECTION -->
  <div class="section">
    <div class="wrap">
      <div class="eyebrow center">Pemerintah Nagari</div>
      <h2 class="section-title center reveal">Struktur Organisasi Pemerintahan Nagari</h2>

      <!-- BOARD DISPLAY CONTAINER -->
      <div style="background:#f7fbf7; border:2px solid var(--green); border-radius:24px; padding:32px 24px; margin-top:30px; box-shadow:var(--shadow-hover);" class="reveal">
        <div style="text-align:center; margin-bottom:34px; padding-bottom:18px; border-bottom:2px dashed var(--green);">
          <h3 style="font-size:22px; color:var(--green-dark); text-transform:uppercase; letter-spacing:1px; font-weight:800;">
            STRUKTUR PEMERINTAHAN NAGARI KUBANG KOTO BERAPAK
          </h3>
          <p style="color:var(--muted); font-size:14px; font-weight:600;">KECAMATAN BAYANG</p>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1.6fr 1fr; gap:24px; align-items:start;">
          
          <!-- LEFT: BAMUS NAGARI -->
          <div style="background:#fff; border:1.5px solid #0288d1; border-radius:16px; padding:20px; box-shadow:var(--shadow);">
            <div style="background:#0288d1; color:#fff; font-weight:700; text-align:center; padding:10px; border-radius:10px; font-size:15px; margin-bottom:16px; text-transform:uppercase;">
              BAMUS NAGARI
            </div>
            @foreach($bamus as $b)
              <div style="border:1px solid #e0e0e0; border-radius:10px; padding:10px; margin-bottom:10px; background:#fcfdfe;">
                <div style="font-size:11px; color:#0288d1; font-weight:700; text-transform:uppercase;">{{ $b['jabatan'] }}</div>
                <div style="font-size:13.5px; font-weight:700; color:var(--ink); margin-top:2px;">{{ $b['nama'] }}</div>
              </div>
            @endforeach
          </div>

          <!-- CENTER: PEMERINTAH NAGARI -->
          <div style="background:#fff; border:1.5px solid var(--green); border-radius:16px; padding:20px; box-shadow:var(--shadow);">
            <div style="background:var(--green); color:#fff; font-weight:700; text-align:center; padding:10px; border-radius:10px; font-size:15px; margin-bottom:16px; text-transform:uppercase;">
              PEMERINTAH NAGARI
            </div>

            <!-- Wali Nagari -->
            @php $wali = current(array_filter($pemerintah, fn($p) => strtolower($p['jabatan']) == 'wali nagari')) ?: ['jabatan' => 'Wali Nagari', 'nama' => 'NOVRIADI']; @endphp
            <div style="border:2px solid var(--green); border-radius:12px; padding:12px; text-align:center; background:var(--green-light); margin-bottom:14px;">
              <div style="font-size:11px; color:var(--green); font-weight:800; text-transform:uppercase;">{{ $wali['jabatan'] }}</div>
              <div style="font-size:16px; font-weight:800; color:var(--green-dark); margin-top:2px;">{{ $wali['nama'] }}</div>
            </div>

            <!-- Sekretaris Nagari -->
            @php $seknag = current(array_filter($pemerintah, fn($p) => strtolower($p['jabatan']) == 'sekretaris nagari')) ?: ['jabatan' => 'Sekretaris Nagari', 'nama' => 'FITRA S.E']; @endphp
            <div style="border:1.5px solid var(--green); border-radius:10px; padding:10px; text-align:center; background:#fff; margin-bottom:16px;">
              <div style="font-size:11px; color:var(--green); font-weight:700; text-transform:uppercase;">{{ $seknag['jabatan'] }}</div>
              <div style="font-size:14.5px; font-weight:700; color:var(--green-dark); margin-top:2px;">{{ $seknag['nama'] }}</div>
            </div>

            <!-- Kaur & Kasi Grid -->
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px; margin-bottom:14px;">
              @foreach($pemerintah as $p)
                @if(!in_array(strtolower($p['jabatan']), ['wali nagari', 'sekretaris nagari', 'wali kampung kubang', 'wali kampung lembah gumanti']))
                  <div style="border:1px solid #d4e8d5; border-radius:8px; padding:8px; background:#fafdfa;">
                    <div style="font-size:10px; color:var(--green); font-weight:700; text-transform:uppercase;">{{ $p['jabatan'] }}</div>
                    <div style="font-size:12.5px; font-weight:700; color:var(--ink); margin-top:2px;">{{ $p['nama'] }}</div>
                  </div>
                @endif
              @endforeach
            </div>

            <!-- Wali Kampung -->
            <div style="border-top:1.5px dashed var(--green); padding-top:14px;">
              <div style="font-size:12px; font-weight:700; color:var(--green-dark); margin-bottom:8px; text-align:center;">WALI KAMPUNG NAGARI</div>
              <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px;">
                @foreach($pemerintah as $p)
                  @if(str_contains(strtolower($p['jabatan']), 'kampung'))
                    <div style="border:1.5px solid var(--gold); border-radius:8px; padding:8px; background:#fffdf5; text-align:center;">
                      <div style="font-size:10px; color:#8a6d00; font-weight:700; text-transform:uppercase;">{{ $p['jabatan'] }}</div>
                      <div style="font-size:12.5px; font-weight:700; color:var(--ink); margin-top:2px;">{{ $p['nama'] }}</div>
                    </div>
                  @endif
                @endforeach
              </div>
            </div>

          </div>

          <!-- RIGHT: LPMN NAGARI -->
          <div style="background:#fff; border:1.5px solid #d97706; border-radius:16px; padding:20px; box-shadow:var(--shadow);">
            <div style="background:#d97706; color:#fff; font-weight:700; text-align:center; padding:10px; border-radius:10px; font-size:15px; margin-bottom:16px; text-transform:uppercase;">
              LPMN NAGARI
            </div>
            @foreach($lpmn as $l)
              <div style="border:1px solid #fef3c7; border-radius:10px; padding:10px; margin-bottom:10px; background:#fffdf5;">
                <div style="font-size:11px; color:#d97706; font-weight:700; text-transform:uppercase;">{{ $l['jabatan'] }}</div>
                <div style="font-size:13.5px; font-weight:700; color:var(--ink); margin-top:2px;">{{ $l['nama'] }}</div>
              </div>
            @endforeach
          </div>

        </div>

        <!-- SLOGAN BANNER -->
        <div style="margin-top:34px; background:linear-gradient(135deg,#c0392b,#962d22); color:#fff; border-radius:14px; padding:14px; text-align:center; font-family:'Poppins',sans-serif; font-size:22px; font-weight:800; font-style:italic; letter-spacing:1px; box-shadow:0 6px 16px rgba(192,57,43,0.3);">
          "{{ $slogan }}"
        </div>

      </div>
    </div>
  </div>

  <!-- SECTION HUBUNGI KAMI -->
  <x-contact-section />

  <!-- FOOTER -->
  @include('layouts.footer')
@endsection
