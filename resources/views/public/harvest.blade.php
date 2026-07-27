<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Panen — {{ $harvest->hasil_pertanian }} ({{ $harvest->nama_kelompok_tani }})</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background:#f4f7f4; padding: 40px 16px;">
    <div style="max-width: 680px; margin: 0 auto;">
        <div class="card" style="overflow:hidden; box-shadow:var(--shadow-hover);">
            
            <!-- HEADER HERO -->
            <div style="background:linear-gradient(135deg, var(--green-dark), #0f2b10); padding:40px 24px; text-align:center; color:#fff; position:relative;">
                <span class="hero-badge" style="margin-bottom:10px;">Verifikasi Data Panen Publik</span>
                <h1 style="font-size:26px; font-weight:800; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">Informasi Hasil Panen Nagari</h1>
                <p style="font-size:13.5px; opacity:.85; margin-top:6px;">Nagari Kubang Koto Berapak, Kec. Bayang, Kab. Pesisir Selatan</p>
            </div>

            <!-- LOGO COLLABORATION ROW -->
            <div style="display:flex; justify-content:center; gap:14px; margin-top:-30px; position:relative; z-index:10;">
                <div style="width:60px; height:60px; border-radius:50%; border:3px solid #fff; overflow:hidden; background:#fff; box-shadow:var(--shadow);">
                    <img src="{{ asset('ESokan.jpeg') }}" style="width:100%; height:100%; object-fit:cover;" title="KKN Periode 1">
                </div>
                <div style="width:60px; height:60px; border-radius:50%; border:3px solid #fff; overflow:hidden; background:#fff; box-shadow:var(--shadow);">
                    <img src="{{ asset('Unand.png') }}" style="width:100%; height:100%; object-fit:cover;" title="Universitas Andalas">
                </div>
                <div style="width:60px; height:60px; border-radius:50%; border:3px solid #fff; overflow:hidden; background:#fff; box-shadow:var(--shadow);">
                    <img src="{{ asset('icon.jpeg') }}" style="width:100%; height:100%; object-fit:cover;" title="KKN Periode 2">
                </div>
            </div>

            <div style="padding: 28px 24px;">
                <!-- HARVEST INFO GRID -->
                <div class="info-grid" style="grid-template-columns:1fr 1fr; margin-bottom:24px;">
                    <div class="info-box">
                        <div class="k">Kelompok Tani</div>
                        <div class="v">{{ $harvest->nama_kelompok_tani }}</div>
                    </div>
                    <div class="info-box">
                        <div class="k">Lokasi / Jorong</div>
                        <div class="v">{{ $harvest->lokasi }}</div>
                    </div>
                    <div class="info-box">
                        <div class="k">Hasil Pertanian</div>
                        <div class="v">{{ $harvest->hasil_pertanian }}</div>
                    </div>
                    <div class="info-box">
                        <div class="k">Varian</div>
                        <div class="v">{{ $harvest->varian }}</div>
                    </div>
                    <div class="info-box">
                        <div class="k">Total Panen</div>
                        <div class="v">{{ $harvest->Total_panen }} kg</div>
                    </div>
                    <div class="info-box">
                        <div class="k">Stok Tersedia</div>
                        <div class="v">{{ $harvest->Stok_tersedia }} kg</div>
                    </div>
                    <div class="info-box">
                        <div class="k">Tanggal Panen</div>
                        <div class="v">{{ $harvest->tanggal_panen ? $harvest->tanggal_panen->format('d F Y') : '-' }}</div>
                    </div>
                    <div class="info-box">
                        <div class="k">Kontak HP / WA</div>
                        <div class="v">{{ $harvest->nomor_hp }}</div>
                    </div>
                </div>

                <!-- MAP EMBED -->
                <div class="map-embed" style="height:220px; margin-bottom:20px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.680552856706!2d100.563779!3d-1.21577!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd35538fb68881d%3A0xec799774440129c0!2sKantor%20Wali%20Nagari%20Kubang%20Koto%20berapak!5e0!3m2!1sid!2sid!4v1775002302337!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

                <!-- VERIFICATION BADGE -->
                <div style="background:var(--green-light); border:1px solid var(--green); border-radius:14px; padding:14px 18px; font-size:13px; color:var(--green-dark); font-weight:600; text-align:center;">
                    ✓ Data ini telah terverifikasi resmi dalam Sistem Manajemen Data Pertanian Nagari Kubang Koto Berapak.
                </div>

                <div style="margin-top:20px; text-align:center;">
                    <a href="{{ route('home') }}" class="btn btn-outline">🌐 Kunjungi Website Utama Nagari</a>
                </div>
            </div>

            <!-- FOOTER BAR -->
            <div style="background:#12251a; padding:16px; text-align:center; color:rgba(255,255,255,0.7); font-size:12.5px;">
                Sistem Manajemen Data Pertanian · © {{ date('Y') }} Nagari Kubang Bayang Koto Berapak
            </div>
        </div>
    </div>
</body>
</html>