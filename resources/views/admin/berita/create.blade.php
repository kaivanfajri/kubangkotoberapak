@extends('layouts.app')
@section('header_title', 'Tambah Berita Baru')
@section('header_subtitle', 'Tulis berita nagari atau tautkan link artikel berita dari situs berita.')

@section('content')
    <div style="max-width:800px; margin:0 auto;">
        <a href="{{ route('admin.berita.index') }}" style="color:var(--green-dark); font-weight:600; text-decoration:none; font-size:13px;">← Kembali ke Daftar Berita</a>

        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" style="margin-top:20px;">
            @csrf
            <div class="card" style="padding:24px; background:#fff; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
                @if($errors->any())
                    <div style="background:#fee2e2; border:1px solid #fca5a5; color:#dc2626; padding:12px; border-radius:10px; margin-bottom:16px; font-size:13px;">
                        @foreach($errors->all() as $error)<div>• {{ $error }}</div>@endforeach
                    </div>
                @endif

                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Judul Berita</label>
                    <input type="text" name="judul" value="{{ old('judul') }}" required placeholder="Tuliskan judul artikel berita..." style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit; font-weight:600;">
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; margin-bottom:16px;">
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Kategori</label>
                        <select name="kategori" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                            <option value="">Pilih...</option>
                            <option value="Kegiatan" {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            <option value="Pertanian" {{ old('kategori') == 'Pertanian' ? 'selected' : '' }}>Pertanian</option>
                            <option value="Peternakan" {{ old('kategori') == 'Peternakan' ? 'selected' : '' }}>Peternakan</option>
                            <option value="UMKM" {{ old('kategori') == 'UMKM' ? 'selected' : '' }}>UMKM</option>
                            <option value="Pemerintahan" {{ old('kategori') == 'Pemerintahan' ? 'selected' : '' }}>Pemerintahan</option>
                        </select>
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Tanggal Terbit</label>
                        <input type="date" name="tanggal_terbit" value="{{ old('tanggal_terbit', date('Y-m-d')) }}" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Status</label>
                        <select name="status" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                            <option value="Terbit" {{ old('status') == 'Terbit' ? 'selected' : '' }}>Terbit</option>
                            <option value="Draft" {{ old('status', 'Draft') == 'Draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Link Artikel Berita Luar (opsional)</label>
                    <input type="url" name="link_artikel" value="{{ old('link_artikel') }}" placeholder="https://contoh-situs-berita.com/artikel-123" style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                    <small style="color:var(--muted); font-size:11.5px;">Isi jika berita berasal dari portal berita eksternal (Antara, Berita Daerah, dll).</small>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Gambar Sampul (opsional)</label>
                    <input type="file" name="gambar" accept="image/*" style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                </div>

                <div style="margin-bottom:20px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Isi Konten Berita (opsional jika menggunakan link artikel)</label>
                    <textarea name="konten" rows="10" placeholder="Tuliskan berita lengkap di sini..." style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit; font-size:14px; line-height:1.7;">{{ old('konten') }}</textarea>
                </div>

                <div style="text-align:right;">
                    <button type="submit" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; padding:10px 24px; font-size:14px; font-weight:700; border-radius:24px; cursor:pointer; border:none; box-shadow:0 4px 12px rgba(46,125,50,0.25); display:inline-flex; align-items:center; gap:6px;">
                        ✓ Simpan Berita
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
