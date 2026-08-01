@extends('layouts.app')
@section('header_title', 'Unggah Foto Galeri')
@section('header_subtitle', 'Tambahkan foto dokumentasi baru ke galeri nagari.')

@section('content')
    <div style="max-width:600px; margin:0 auto;">
        <a href="{{ route('admin.galeri.index') }}" style="color:var(--green-dark); font-weight:600; text-decoration:none; font-size:13px;">← Kembali ke Galeri</a>
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" style="margin-top:20px;">
            @csrf
            <div class="card" style="padding:24px; background:#fff; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
                @if($errors->any())
                    <div style="background:#fee2e2; border:1px solid #fca5a5; color:#dc2626; padding:12px; border-radius:10px; margin-bottom:16px; font-size:13px;">
                        @foreach($errors->all() as $error)<div>• {{ $error }}</div>@endforeach
                    </div>
                @endif

                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Caption / Judul Foto</label>
                    <input type="text" name="caption" value="{{ old('caption') }}" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit; font-weight:600;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Kategori</label>
                    <select name="kategori" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                        <option value="">Pilih kategori...</option>
                        @foreach(['Pertanian','Peternakan','Adat & Sejarah','Peta Wilayah','Kegiatan Nagari','Pemerintahan'] as $kat)
                            <option value="{{ $kat }}" {{ old('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">File Foto (maks 3 MB)</label>
                    <input type="file" name="gambar" accept="image/*" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                </div>

                <div style="text-align:right;">
                    <button type="submit" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; padding:10px 24px; font-size:14px; font-weight:700; border-radius:24px; cursor:pointer; border:none; box-shadow:0 4px 12px rgba(46,125,50,0.25); display:inline-flex; align-items:center; gap:6px;">
                        ✓ Unggah Foto ke Galeri
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
