@extends('layouts.app')

@section('content')
    <div class="grid grid-4" style="margin-bottom:28px;">
        <div class="admin-stat">
            <div class="as-num">4</div>
            <div class="as-lbl">UMKM Terdaftar</div>
        </div>
        <div class="admin-stat">
            <div class="as-num">7</div>
            <div class="as-lbl">Kelompok Tani Aktif</div>
        </div>
        <div class="admin-stat">
            <div class="as-num">6</div>
            <div class="as-lbl">Lembaga Nagari</div>
        </div>
        <div class="admin-stat">
            <div class="as-num">{{ \App\Models\Harvest::count() }}</div>
            <div class="as-lbl">Data Hasil Panen</div>
        </div>
    </div>

    <div class="grid grid-2" style="margin-bottom:28px;">
        <div class="card" style="padding:24px;">
            <h4 style="margin-bottom:14px; font-size:17px;">Aktivitas Sistem</h4>
            <div class="admin-activity">
                <div class="act-row">
                    <span class="act-dot"></span>
                    <span>Sistem Administrasi Nagari Kubang Koto Berapak Aktif</span>
                    <span class="act-time">Hari ini</span>
                </div>
                <div class="act-row">
                    <span class="act-dot"></span>
                    <span>Data Panen Terintegrasi QR Code Publik</span>
                    <span class="act-time">Terhubung</span>
                </div>
                <div class="act-row">
                    <span class="act-dot"></span>
                    <span>Modul Struktur & Lembaga Nagari Dinamis Aktif</span>
                    <span class="act-time">Terbit</span>
                </div>
            </div>
        </div>

        <div class="card" style="padding:24px;">
            <h4 style="margin-bottom:14px; font-size:17px;">Aksi Cepat</h4>
            <div style="display:flex; flex-direction:column; gap:10px;">
                <a class="btn btn-primary" href="{{ route('admin.harvests.create') }}">+ Tambah Data Hasil Panen</a>
                <a class="btn btn-outline" href="{{ route('admin.struktur.edit') }}">Edit Struktur Nagari</a>
                <a class="btn btn-outline" href="{{ route('admin.lembaga.edit') }}">Edit Lembaga Nagari</a>
                <a class="btn btn-outline" href="{{ route('home') }}" target="_blank">Buka Website Utama</a>
            </div>
        </div>
    </div>

    <!-- DEMONSTRASI PENGGUNAAN WEBSITE VIDEO CARD -->
    <div class="card" style="padding:24px;">
        <h4 style="margin-bottom:14px; font-size:17px;">Panduan Demonstrasi Penggunaan Website</h4>
        <div style="border-radius:14px; overflow:hidden; box-shadow:var(--shadow);">
            <video controls style="width:100%; max-height:450px; background:#000;">
                <source src="{{ asset('DEMONSTRASI PENGGUNAAN WEBSITE.mp4') }}" type="video/mp4">
                Browser Anda tidak mendukung tag video.
            </video>
        </div>
    </div>
@endsection
