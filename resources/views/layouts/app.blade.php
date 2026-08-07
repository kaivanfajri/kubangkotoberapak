<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard — Nagari Kubang Koto Berapak</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('icon.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="admin-shell">
        <!-- SIDEBAR -->
        <aside class="admin-sidebar">
            <div class="admin-brand">
                <img src="{{ asset('icon.jpeg') }}" alt="Logo Pesisir Selatan" style="width:38px; height:38px; border-radius:8px; object-fit:contain; background:#ffffff; padding:2px; box-shadow:0 2px 6px rgba(0,0,0,0.15); flex-shrink:0;">
                <div>
                    <strong style="font-size:14px; font-weight:800; color:#fff;">Admin Panel</strong><br>
                    <small style="opacity:0.8; font-size:11px;">Kubang Koto Berapak</small>
                </div>
            </div>

            <nav class="admin-nav">
                <a href="{{ route('dashboard') }}" class="admin-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.berita.index') }}" class="admin-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                    Kelola Berita &amp; Kegiatan
                </a>
                <a href="{{ route('admin.umkm.index') }}" class="admin-link {{ request()->routeIs('admin.umkm.*') ? 'active' : '' }}">
                    Kelola UMKM
                </a>
                <a href="{{ route('admin.kelompok-tani.index') }}" class="admin-link {{ request()->routeIs('admin.kelompok-tani.*') ? 'active' : '' }}">
                    Kelola Kelompok Tani
                </a>
                <a href="{{ route('admin.struktur.edit') }}" class="admin-link {{ request()->routeIs('admin.struktur.*') ? 'active' : '' }}">
                    Kelola Struktur Nagari
                </a>
                <a href="{{ route('admin.lembaga.edit') }}" class="admin-link {{ request()->routeIs('admin.lembaga.*') ? 'active' : '' }}">
                    Kelola Lembaga
                </a>
                <a href="{{ route('admin.galeri.index') }}" class="admin-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                    Kelola Galeri
                </a>
                <a href="{{ route('admin.harvests.index') }}" class="admin-link {{ request()->routeIs('admin.harvests.*') ? 'active' : '' }}">
                    Kelola Data Panen
                </a>
                <a href="{{ route('admin.settings.edit') }}" class="admin-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    Pengaturan Website
                </a>
                <a href="{{ route('profile.edit') }}" class="admin-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    Pengaturan Akun
                </a>
            </nav>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="admin-logout" style="width:100%;">
                    Keluar
                </button>
            </form>
        </aside>

        <!-- MAIN ADMIN CONTENT -->
        <div class="admin-main">
            <div class="admin-topbar">
                <div>
                    <h2>@yield('header_title', 'Dashboard')</h2>
                    <p>@yield('header_subtitle', 'Selamat datang kembali, kelola konten website nagari di sini.')</p>
                </div>
                <div class="admin-profile">
                    <div class="admin-avatar">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div>
                        <strong>{{ Auth::user()->name ?? 'Admin Nagari' }}</strong><br>
                        <small style="color:var(--muted);">{{ Auth::user()->email ?? 'admin@kubangbayang.desa.id' }}</small>
                    </div>
                </div>
            </div>

            @if(session('error'))
                <div style="background:#fef2f2; border:1.5px solid #fca5a5; color:#991b1b; padding:14px 18px; border-radius:12px; margin-bottom:20px; font-weight:600; font-size:14px; box-shadow:0 2px 8px rgba(220,38,38,0.08); display:flex; align-items:center; gap:10px;">
                    <span style="font-size:18px;">⚠️</span>
                    <div>{{ session('error') }}</div>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</body>
</html>
