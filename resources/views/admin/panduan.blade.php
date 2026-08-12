@extends('layouts.app')

@section('header_title', 'Panduan Penggunaan')
@section('header_subtitle', 'Video demonstrasi dan panduan singkat penggunaan panel admin website nagari.')

@section('content')
    {{-- VIDEO DEMONSTRASI --}}
    <div class="card" style="padding:28px; margin-bottom:24px; background:#fff; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
        <h3 style="font-size:1.1rem; font-weight:700; color:var(--ink); font-family:'Poppins',sans-serif; margin-bottom:6px;">Video Demonstrasi Website</h3>
        <p style="font-size:13.5px; color:var(--muted); margin-bottom:18px;">Tonton video berikut untuk memahami cara mengelola konten website Nagari Kubang Koto Berapak.</p>

        <div style="width:100%; border-radius:14px; overflow:hidden; background:#000; box-shadow:0 8px 28px rgba(0,0,0,0.12);">
            <video
                controls
                style="width:100%; max-height:520px; display:block; border-radius:14px;"
                preload="metadata"
                poster="{{ asset('kantorwalinagari.jpg') }}">
                <source src="{{ asset('DEMONSTRASI PENGGUNAAN WEBSITE.mp4') }}" type="video/mp4">
                Browser Anda tidak mendukung pemutaran video HTML5.
            </video>
        </div>
    </div>

    {{-- PANDUAN SINGKAT PER FITUR --}}
    <div class="card" style="padding:28px; background:#fff; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
        <h3 style="font-size:1.1rem; font-weight:700; color:var(--ink); font-family:'Poppins',sans-serif; margin-bottom:18px;">Panduan Singkat per Fitur</h3>

        <div style="display:flex; flex-direction:column; gap:14px;">
            @php
            $panduan = [
                ['no'=>'01','judul'=>'Dashboard','isi'=>'Halaman utama admin. Menampilkan ringkasan statistik website (jumlah berita, UMKM, galeri, dll) dan aksi cepat untuk membuat konten baru.'],
                ['no'=>'02','judul'=>'Kelola Berita & Kegiatan','isi'=>'Tulis, edit, dan hapus artikel berita atau kegiatan nagari. Berita yang berstatus "Terbit" akan muncul otomatis di halaman publik.'],
                ['no'=>'03','judul'=>'Kelola UMKM','isi'=>'Tambah, ubah, dan hapus data usaha mikro kecil menengah warga nagari. Data ditampilkan di halaman /umkm untuk dikunjungi masyarakat umum.'],
                ['no'=>'04','judul'=>'Kelola Kelompok Tani','isi'=>'Kelola data kelompok tani aktif nagari — mencakup nama kelompok, ketua, jorong, jumlah anggota, luas lahan, komoditas, dan produktivitas.'],
                ['no'=>'05','judul'=>'Kelola Struktur Nagari','isi'=>'Edit nama dan jabatan seluruh perangkat nagari (Pemerintah, BAMUS, LPMN). Perubahan langsung tampil di halaman publik /struktur.'],
                ['no'=>'06','judul'=>'Kelola Lembaga','isi'=>'Tambah, ubah, dan hapus data lembaga nagari (PAUD, Posyandu, PKK, dll). Bisa mengunggah foto lokasi untuk setiap lembaga.'],
                ['no'=>'07','judul'=>'Kelola Galeri','isi'=>'Unggah foto dokumentasi kegiatan nagari. Foto yang diunggah akan muncul di halaman Galeri yang bisa diakses masyarakat umum.'],
                ['no'=>'08','judul'=>'Kelola Data Panen','isi'=>'Catat data hasil panen nagari per musim untuk pemantauan produktivitas pertanian.'],
                ['no'=>'09','judul'=>'Pengaturan Website','isi'=>'Ubah konten umum website seperti slogan, visi, misi, email nagari, jam kerja, dan alamat kantor — tanpa perlu mengubah kode program.'],
                ['no'=>'10','judul'=>'Pengaturan Akun','isi'=>'Ubah nama, email, dan password akun admin Anda. Pastikan password selalu dijaga kerahasiaannya dan tidak dibagikan kepada pihak lain.'],
            ];
            @endphp

            @foreach($panduan as $p)
            <div style="display:flex; gap:16px; align-items:flex-start; padding:16px; background:#f8faf8; border-radius:12px; border:1px solid #e8f0e8;">
                <div style="min-width:36px; height:36px; background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">
                    {{ $p['no'] }}
                </div>
                <div>
                    <div style="font-size:13.5px; font-weight:700; color:var(--ink); margin-bottom:4px;">{{ $p['judul'] }}</div>
                    <div style="font-size:13px; color:var(--muted); line-height:1.7;">{{ $p['isi'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
