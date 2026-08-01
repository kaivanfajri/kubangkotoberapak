@extends('layouts.app')
@section('header_title', 'Edit UMKM')
@section('header_subtitle', 'Perbarui data usaha UMKM nagari.')

@section('content')
    <div style="max-width:800px; margin:0 auto;">
        <a href="{{ route('admin.umkm.index') }}" style="color:var(--green-dark); font-weight:600; text-decoration:none; font-size:13px;">← Kembali ke Daftar UMKM</a>
        <form action="{{ route('admin.umkm.update', $umkm) }}" method="POST" enctype="multipart/form-data" style="margin-top:20px;">
            @csrf @method('PUT')
            <div class="card" style="padding:24px; background:#fff; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
                @if($errors->any())
                    <div style="background:#fee2e2; border:1px solid #fca5a5; color:#dc2626; padding:12px; border-radius:10px; margin-bottom:16px; font-size:13px;">
                        @foreach($errors->all() as $error)<div>• {{ $error }}</div>@endforeach
                    </div>
                @endif

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:16px;">
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Nama Usaha</label>
                        <input type="text" name="nama_usaha" value="{{ old('nama_usaha', $umkm->nama_usaha) }}" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit; font-weight:600;">
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Pemilik</label>
                        <input type="text" name="pemilik" value="{{ old('pemilik', $umkm->pemilik) }}" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; margin-bottom:16px;">
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Kategori</label>
                        <select name="kategori" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                            @foreach(['Kuliner','Kerajinan','Sembako','Beras Nagari','Lainnya'] as $kat)
                                <option value="{{ $kat }}" {{ old('kategori', $umkm->kategori) == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Nomor WhatsApp (opsional)</label>
                        <input type="text" name="nomor_wa" value="{{ old('nomor_wa', $umkm->nomor_wa) }}" style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Jam Operasional</label>
                        <input type="text" name="jam_operasional" value="{{ old('jam_operasional', $umkm->jam_operasional) }}" style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                    </div>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Alamat / Jorong</label>
                    <input type="text" name="alamat" value="{{ old('alamat', $umkm->alamat) }}" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Foto Sampul Utama (kosongkan jika tidak ganti)</label>
                    @if($umkm->foto)
                        <div style="margin-bottom:8px;"><img src="{{ asset('storage/'.$umkm->foto) }}" style="max-height:100px; border-radius:10px;"></div>
                    @endif
                    <input type="file" name="foto" accept="image/*" style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Tambah Foto Galeri &amp; Slider (Bisa Pilih Banyak Foto 📸)</label>
                    @if(!empty($umkm->galeri_foto) && is_array($umkm->galeri_foto))
                        <div style="display:flex; gap:8px; margin-bottom:10px; flex-wrap:wrap;">
                            @foreach($umkm->galeri_foto as $gFoto)
                                <img src="{{ asset('storage/'.$gFoto) }}" style="width:70px; height:70px; object-fit:cover; border-radius:8px; border:1px solid #ddd;">
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name="galeri_foto[]" multiple accept="image/*" style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                    <small style="color:var(--muted); font-size:11.5px;">Foto yang diunggah baru akan ditambahkan ke galeri slider UMKM.</small>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Produk Utama (pisahkan dengan koma)</label>
                    <input type="text" name="produk_utama" value="{{ old('produk_utama', is_array($umkm->produk_utama) ? implode(', ', $umkm->produk_utama) : $umkm->produk_utama) }}" style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Deskripsi Usaha</label>
                    <textarea name="deskripsi" rows="4" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit; font-size:14px; line-height:1.7;">{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                </div>

                <div style="text-align:right;">
                    <button type="submit" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; padding:10px 24px; font-size:14px; font-weight:700; border-radius:24px; cursor:pointer; border:none; box-shadow:0 4px 12px rgba(46,125,50,0.25); display:inline-flex; align-items:center; gap:6px;">
                        ✓ Simpan Perubahan UMKM
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
