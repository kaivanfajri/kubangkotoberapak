@extends('layouts.app')
@section('header_title', 'Edit Berita')
@section('header_subtitle', 'Perbarui isi, kategori, atau status berita.')

@section('content')
    <div style="max-width:800px; margin:0 auto;">
        <a href="{{ route('admin.berita.index') }}" style="color:var(--green-dark); font-weight:600; text-decoration:none; font-size:13px;">← Kembali ke Daftar Berita</a>

        <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data" style="margin-top:20px;">
            @csrf @method('PUT')
            <div class="card" style="padding:24px; background:#fff; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
                @if($errors->any())
                    <div style="background:#fee2e2; border:1px solid #fca5a5; color:#dc2626; padding:12px; border-radius:10px; margin-bottom:16px; font-size:13px;">
                        @foreach($errors->all() as $error)<div>• {{ $error }}</div>@endforeach
                    </div>
                @endif

                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Judul Berita</label>
                    <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit; font-weight:600;">
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; margin-bottom:16px;">
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Kategori</label>
                        <select name="kategori" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                            @foreach(['Kegiatan','Pertanian','Peternakan','UMKM','Pemerintahan'] as $kat)
                                <option value="{{ $kat }}" {{ old('kategori', $berita->kategori) == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Tanggal Terbit</label>
                        <input type="date" name="tanggal_terbit" value="{{ old('tanggal_terbit', $berita->tanggal_terbit->format('Y-m-d')) }}" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Status</label>
                        <select name="status" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                            <option value="Terbit" {{ old('status', $berita->status) == 'Terbit' ? 'selected' : '' }}>Terbit</option>
                            <option value="Draft" {{ old('status', $berita->status) == 'Draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Gambar Sampul (kosongkan jika tidak ingin ganti)</label>
                    @if($berita->gambar)
                        <div style="margin-bottom:8px;"><img src="{{ asset('storage/'.$berita->gambar) }}" style="max-height:120px; border-radius:10px;"></div>
                    @endif
                    <input type="file" name="gambar" accept="image/*" style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Isi Konten Berita</label>
                    <textarea name="konten" rows="12" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit; font-size:14px; line-height:1.7;">{{ old('konten', $berita->konten) }}</textarea>
                </div>

                <button type="submit" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; padding:12px 28px; font-size:15px; font-weight:700; border-radius:24px; width:100%; cursor:pointer; border:none; box-shadow:0 4px 12px rgba(46,125,50,0.25);">
                    Simpan Perubahan Berita
                </button>
            </div>
        </form>
    </div>
@endsection
