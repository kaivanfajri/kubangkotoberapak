<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard — Nagari Kubang Koto Berapak</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="admin-shell">
        <!-- SIDEBAR -->
        <aside class="admin-sidebar">
            <div class="admin-brand">
                <div>
                    <strong>Admin Panel</strong><br>
                    <small style="opacity:0.8;">Kubang Koto Berapak</small>
                </div>
            </div>

            <nav class="admin-nav">
                <a href="{{ route('dashboard') }}" class="admin-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.harvests.index') }}" class="admin-link {{ request()->routeIs('admin.harvests.*') ? 'active' : '' }}">
                    Kelola Data Panen
                </a>
                <a href="{{ route('admin.struktur.edit') }}" class="admin-link {{ request()->routeIs('admin.struktur.*') ? 'active' : '' }}">
                    Kelola Struktur Nagari
                </a>
                <a href="{{ route('admin.lembaga.edit') }}" class="admin-link {{ request()->routeIs('admin.lembaga.*') ? 'active' : '' }}">
                    Kelola Lembaga Nagari
                </a>
                <a href="{{ route('home') }}" class="admin-link" target="_blank">
                    Lihat Website Utama
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
                    <h2>Panel Administrasi Nagari</h2>
                    <p>Selamat datang kembali, kelola data panen, struktur, dan lembaga nagari di sini.</p>
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

            @yield('content')
        </div>
    </div>
</body>
</html>
