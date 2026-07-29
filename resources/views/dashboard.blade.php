@extends('layouts.app')

@section('header_title', 'Dashboard')
@section('header_subtitle', 'Selamat datang kembali, kelola konten website nagari di sini.')

@section('content')
    @php
        $totalUmkm = \App\Models\Umkm::count();
        $totalKelompokTani = \App\Models\KelompokTani::count();
        $totalLembaga = \App\Models\Lembaga::count();
        $totalGaleri = \App\Models\Galeri::count();
        $totalBerita = \App\Models\Berita::count();
    @endphp

    <!-- 4 STAT CARDS GRID -->
    <div class="grid grid-4" style="margin-bottom:28px;">
        <div class="admin-stat">
            <div class="as-num">{{ $totalUmkm }}</div>
            <div class="as-lbl">UMKM Terdaftar</div>
        </div>
        <div class="admin-stat">
            <div class="as-num">{{ $totalKelompokTani }}</div>
            <div class="as-lbl">Kelompok Tani</div>
        </div>
        <div class="admin-stat">
            <div class="as-num">{{ $totalBerita }}</div>
            <div class="as-lbl">Berita Terbit</div>
        </div>
        <div class="admin-stat">
            <div class="as-num">{{ $totalGaleri }}</div>
            <div class="as-lbl">Foto Galeri</div>
        </div>
    </div>

    <!-- 2 COLUMN LAYOUT: AKTIVITAS TERBARU & AKSI CEPAT -->
    <div class="grid grid-2" style="margin-bottom:28px;">
        <div class="card" style="padding:24px; background:#fff; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
            <h3 style="margin-bottom:16px; font-size:1.1rem; font-weight:700; color:var(--ink); font-family:'Poppins',sans-serif;">Berita Terbaru</h3>
            <div class="admin-activity">
                @php $latestBeritas = \App\Models\Berita::latest()->take(4)->get(); @endphp
                @forelse($latestBeritas as $b)
                    <div class="act-row">
                        <span class="act-dot"></span>
                        <span>{{ Str::limit($b->judul, 40) }}</span>
                        <span class="act-time">{{ $b->created_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <div class="act-row">
                        <span style="color:var(--muted);">Belum ada berita.</span>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="card" style="padding:24px; background:#fff; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
            <h3 style="margin-bottom:16px; font-size:1.1rem; font-weight:700; color:var(--ink); font-family:'Poppins',sans-serif;">Aksi Cepat</h3>
            <div style="display:flex; flex-direction:column; gap:12px;">
                <a class="btn btn-primary" href="{{ route('admin.berita.create') }}" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; border-radius:24px; padding:12px 20px; font-weight:700; text-align:center; box-shadow:0 4px 12px rgba(46,125,50,0.25); text-decoration:none;">
                    + Tulis Berita / Kegiatan
                </a>
                <a class="btn btn-outline" href="{{ route('admin.umkm.create') }}" style="border:1.5px solid var(--green); color:var(--green-dark); border-radius:24px; padding:11px 20px; font-weight:700; text-align:center; background:#fff; text-decoration:none;">
                    + Tambah UMKM
                </a>
                <a class="btn btn-outline" href="{{ route('admin.galeri.create') }}" style="border:1.5px solid var(--green); color:var(--green-dark); border-radius:24px; padding:11px 20px; font-weight:700; text-align:center; background:#fff; text-decoration:none;">
                    + Unggah Foto Galeri
                </a>
            </div>
        </div>
    </div>
@endsection
