@extends('layouts.nagari')

@section('title', 'Struktur Pemerintahan — Nagari Kubang Koto Berapak')

@section('content')
  <!-- HERO BANNER -->
  <div class="hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.22), rgba(0, 0, 0, 0.45)), url('{{ asset('kantorwalinagari.jpg') }}'); background-position: center 55%; background-size: cover; min-height: 440px; padding: 75px 20px 50px;">
    <div class="hero-content" style="max-width: 900px; margin: 0 auto; text-align: center;">
      <span class="hero-badge">Pemerintahan Nagari</span>
      <h1 style="font-size: clamp(1.6rem, 3.2vw, 2.5rem); font-weight: 800; color: #fff; margin-bottom: 6px; font-family: 'Poppins', sans-serif; text-shadow: 0 2px 10px rgba(0,0,0,0.7);">
        Struktur Organisasi Nagari
      </h1>
      <p class="hero-sub" style="font-size: 0.95rem; color: rgba(255, 255, 255, 0.95); font-weight: 400; max-width: 600px; margin: 0 auto; text-shadow: 0 1px 6px rgba(0,0,0,0.7);">
        Nagari Kubang Koto Berapak, Kecamatan Bayang, Kabupaten Pesisir Selatan
      </p>
    </div>
  </div>

  @php
    $pemerintah = $strukturData['pemerintah'] ?? [];
    $bamus = $strukturData['bamus'] ?? [];
    $lpmn = $strukturData['lpmn'] ?? [];
    $slogan = $strukturData['slogan'] ?? 'BASAMO MANGKO MANJADI';

    // Separate government roles dynamically
    $wali = current(array_filter($pemerintah, function($p) {
      $j = strtolower($p['jabatan'] ?? '');
      return str_contains($j, 'wali nagari') || (str_contains($j, 'wali') && !str_contains($j, 'kampung'));
    })) ?: ($pemerintah[0] ?? ['jabatan' => 'Wali Nagari', 'nama' => 'Pj. NAZAMI EFENDI']);

    $sekretaris = current(array_filter($pemerintah, function($p) {
      $j = strtolower($p['jabatan'] ?? '');
      return str_contains($j, 'sekretaris');
    })) ?: ($pemerintah[1] ?? ['jabatan' => 'Sekretaris Nagari', 'nama' => 'FITRA S.E']);

    $perangkatStaff = array_filter($pemerintah, function($p) use ($wali, $sekretaris) {
      $j = strtolower($p['jabatan'] ?? '');
      $n = strtolower($p['nama'] ?? '');
      $waliNama = strtolower($wali['nama'] ?? '');
      $sekNama = strtolower($sekretaris['nama'] ?? '');

      if ($n === $waliNama || $n === $sekNama) return false;
      if (str_contains($j, 'wali nagari') || (str_contains($j, 'wali') && !str_contains($j, 'kampung'))) return false;
      if (str_contains($j, 'sekretaris')) return false;
      if (str_contains($j, 'kampung')) return false;

      return true;
    });

    $waliKampung = array_filter($pemerintah, function($p) {
      return str_contains(strtolower($p['jabatan'] ?? ''), 'kampung');
    });

    // Helper for initials avatar
    if (!function_exists('getInitials')) {
      function getInitials($name) {
        $words = array_values(array_filter(explode(' ', trim($name))));
        $initials = '';
        if (count($words) >= 2) {
          $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
        } else if (count($words) === 1) {
          $initials = strtoupper(substr($words[0], 0, 2));
        }
        return $initials ?: 'NN';
      }
    }
  @endphp

  <style>
    .struktur-container {
      padding: 30px 16px;
      max-width: 1280px;
      margin: 0 auto;
      box-sizing: border-box;
    }

    .board-wrapper {
      background: #f7fbf7;
      border: 2.5px solid var(--green);
      border-radius: 20px;
      padding: 24px 20px;
      box-shadow: 0 10px 30px -10px rgba(27, 94, 32, 0.15);
      box-sizing: border-box;
      width: 100%;
      overflow: hidden;
    }

    .board-header {
      text-align: center;
      margin-bottom: 24px;
      padding-bottom: 14px;
      border-bottom: 2px dashed var(--green);
    }

    .board-header h2 {
      font-size: clamp(1.1rem, 2.2vw, 1.4rem);
      color: var(--green-dark);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-weight: 800;
      margin-bottom: 2px;
    }

    .board-header p {
      color: var(--muted);
      font-size: 0.85rem;
      font-weight: 700;
      letter-spacing: 1px;
    }

    /* 3-COLUMN BOARD GRID WITH STRICT MINMAX TO PREVENT OVERFLOW */
    .board-grid {
      display: grid;
      grid-template-columns: minmax(0, 1fr) minmax(0, 1.25fr) minmax(0, 1fr);
      gap: 16px;
      align-items: start;
      width: 100%;
      box-sizing: border-box;
    }

    /* SECTION COLUMNS */
    .board-col {
      background: #ffffff;
      border-radius: 16px;
      padding: 14px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
      box-sizing: border-box;
      width: 100%;
      min-width: 0;
    }

    .col-bamus {
      border: 1.5px solid #0288d1;
    }

    .col-pemerintah {
      border: 1.5px solid var(--green);
    }

    .col-lpmn {
      border: 1.5px solid #d97706;
    }

    .col-title-badge {
      color: #ffffff;
      font-weight: 800;
      text-align: center;
      padding: 8px 10px;
      border-radius: 8px;
      font-size: 0.88rem;
      margin-bottom: 14px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      word-break: break-word;
    }

    .badge-bamus-bg {
      background: #0288d1;
    }

    .badge-pemerintah-bg {
      background: var(--green);
    }

    .badge-lpmn-bg {
      background: #d97706;
    }

    /* MEMBER MINI CARDS WITH AVATAR BADGES */
    .mini-card {
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 10px 10px;
      margin-bottom: 10px;
      background: #fafdfa;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: all 0.2s ease;
      box-sizing: border-box;
      width: 100%;
      min-width: 0;
    }

    .mini-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 14px rgba(0,0,0,0.06);
    }

    .mini-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      flex-shrink: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      font-weight: 800;
      color: #ffffff;
      overflow: hidden;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
      border: 2px solid #ffffff;
    }

    .mini-info {
      flex: 1;
      min-width: 0;
      word-break: break-word;
    }

    .mini-jabatan {
      font-size: 10px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.3px;
      margin-bottom: 1px;
      line-height: 1.2;
    }

    .mini-nama {
      font-size: 12px;
      font-weight: 700;
      color: var(--ink);
      line-height: 1.3;
      white-space: normal;
      word-break: break-word;
    }

    /* FEATURED WALI & SEKRETARIS IN BOARD */
    .featured-leader-card {
      border-radius: 12px;
      padding: 12px 10px;
      margin-bottom: 12px;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      box-sizing: border-box;
      width: 100%;
    }

    .featured-wali {
      border: 2px solid var(--green);
      background: var(--green-light);
    }

    .featured-seknag {
      border: 1.5px solid #0288d1;
      background: #f0f9ff;
    }

    .leader-avatar {
      width: 56px;
      height: 56px;
      font-size: 18px;
      margin-bottom: 6px;
    }

    /* KAUR & KASI GRID INSIDE CENTER */
    .kaur-kasi-grid {
      display: grid;
      grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
      gap: 8px;
      margin-bottom: 12px;
      width: 100%;
      box-sizing: border-box;
    }

    /* WALI KAMPUNG SECTION */
    .wali-kampung-box {
      border-top: 1.5px dashed var(--green);
      padding-top: 12px;
      margin-top: 6px;
      width: 100%;
    }

    .wali-kampung-title {
      font-size: 11px;
      font-weight: 800;
      color: var(--green-dark);
      margin-bottom: 8px;
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    /* SLOGAN BANNER */
    .slogan-card {
      background: linear-gradient(135deg, #1B5E20, #2E7D32);
      border-radius: 14px;
      padding: 14px 20px;
      text-align: center;
      color: #ffffff;
      max-width: 480px;
      margin: 24px auto 0;
      box-shadow: 0 6px 18px rgba(27, 94, 32, 0.2);
    }

    .slogan-text {
      font-family: 'Poppins', sans-serif;
      font-size: 1.15rem;
      font-weight: 800;
      font-style: italic;
      color: var(--gold);
    }

    @media (max-width: 1024px) {
      .board-grid {
        grid-template-columns: 1fr;
      }
      .kaur-kasi-grid {
        grid-template-columns: 1fr;
      }
      .board-wrapper {
        padding: 16px;
      }
    }
  </style>

  <div class="struktur-container">
    
    <!-- BOARD DISPLAY CONTAINER -->
    <div class="board-wrapper">
      
      <!-- BOARD HEADER -->
      <div class="board-header">
        <h2>Struktur Pemerintahan Nagari Kubang Koto Berapak</h2>
        <p>KECAMATAN BAYANG</p>
      </div>

      <!-- 3 COLUMNS BOARD GRID -->
      <div class="board-grid">
        
        <!-- LEFT COLUMN: BAMUS NAGARI -->
        <div class="board-col col-bamus">
          <div class="col-title-badge badge-bamus-bg">
            <i class="bi bi-building-fill"></i> BAMUS NAGARI
          </div>
          @foreach($bamus as $b)
            <div class="mini-card" style="border-left: 3px solid #0288d1;">
              <div class="mini-avatar" style="background: linear-gradient(135deg, #0288d1, #0284c7);">
                {{ getInitials($b['nama']) }}
              </div>
              <div class="mini-info">
                <div class="mini-jabatan" style="color: #0288d1;">{{ $b['jabatan'] }}</div>
                <div class="mini-nama">{{ $b['nama'] }}</div>
              </div>
            </div>
          @endforeach
        </div>

        <!-- CENTER COLUMN: PEMERINTAH NAGARI -->
        <div class="board-col col-pemerintah">
          <div class="col-title-badge badge-pemerintah-bg">
            <i class="bi bi-bank2"></i> PEMERINTAH NAGARI
          </div>

          <!-- WALI NAGARI -->
          <div class="featured-leader-card featured-wali">
            <div class="mini-avatar leader-avatar" style="background: linear-gradient(135deg, #1B5E20, #2E7D32);">
              {{ getInitials($wali['nama']) }}
            </div>
            <div class="mini-jabatan" style="color: var(--green-dark); font-size: 11px; font-weight: 800;">{{ $wali['jabatan'] }}</div>
            <div style="font-size: 14.5px; font-weight: 800; color: var(--green-dark); margin-top: 1px; word-break: break-word;">{{ $wali['nama'] }}</div>
          </div>

          <!-- SEKRETARIS NAGARI -->
          <div class="featured-leader-card featured-seknag">
            <div class="mini-avatar leader-avatar" style="background: linear-gradient(135deg, #0288d1, #0369a1); width: 46px; height: 46px; font-size: 15px;">
              {{ getInitials($sekretaris['nama']) }}
            </div>
            <div class="mini-jabatan" style="color: #0288d1; font-size: 10.5px;">{{ $sekretaris['jabatan'] }}</div>
            <div style="font-size: 13px; font-weight: 800; color: var(--ink); margin-top: 1px; word-break: break-word;">{{ $sekretaris['nama'] }}</div>
          </div>

          <!-- KAUR & KASI GRID -->
          <div class="kaur-kasi-grid">
            @foreach($perangkatStaff as $p)
              <div class="mini-card" style="margin-bottom: 0;">
                <div class="mini-avatar" style="background: linear-gradient(135deg, #388e3c, #66bb6a); width: 36px; height: 36px; font-size: 11px;">
                  {{ getInitials($p['nama']) }}
                </div>
                <div class="mini-info">
                  <div class="mini-jabatan" style="color: var(--green); font-size: 9px;">{{ $p['jabatan'] }}</div>
                  <div class="mini-nama" style="font-size: 11px;">{{ $p['nama'] }}</div>
                </div>
              </div>
            @endforeach
          </div>

          <!-- WALI KAMPUNG -->
          @if(count($waliKampung) > 0)
            <div class="wali-kampung-box">
              <div class="wali-kampung-title">WALI KAMPUNG NAGARI</div>
              <div class="kaur-kasi-grid">
                @foreach($waliKampung as $wk)
                  <div class="mini-card" style="border-left: 3px solid var(--gold-dark); background: #fffdf5; margin-bottom: 0;">
                    <div class="mini-avatar" style="background: linear-gradient(135deg, #d97706, #f59e0b); width: 36px; height: 36px; font-size: 11px;">
                      {{ getInitials($wk['nama']) }}
                    </div>
                    <div class="mini-info">
                      <div class="mini-jabatan" style="color: #b45309; font-size: 9px;">{{ $wk['jabatan'] }}</div>
                      <div class="mini-nama" style="font-size: 11px;">{{ $wk['nama'] }}</div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @endif

        </div>

        <!-- RIGHT COLUMN: LPMN NAGARI -->
        <div class="board-col col-lpmn">
          <div class="col-title-badge badge-lpmn-bg">
            <i class="bi bi-people-fill"></i> LPMN NAGARI
          </div>
          @foreach($lpmn as $l)
            <div class="mini-card" style="border-left: 3px solid #d97706; background: #fffdf5;">
              <div class="mini-avatar" style="background: linear-gradient(135deg, #b45309, #d97706);">
                {{ getInitials($l['nama']) }}
              </div>
              <div class="mini-info">
                <div class="mini-jabatan" style="color: #d97706;">{{ $l['jabatan'] }}</div>
                <div class="mini-nama">{{ $l['nama'] }}</div>
              </div>
            </div>
          @endforeach
        </div>

      </div>

      <!-- SLOGAN BANNER -->
      <div class="slogan-card">
        <div class="slogan-text">
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
