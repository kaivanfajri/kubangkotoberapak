@extends('layouts.app')
@section('header_title', 'Tambah Kelompok Tani')
@section('header_subtitle', 'Daftarkan kelompok tani baru di nagari.')

@section('content')
    <div style="max-width:800px; margin:0 auto;">
        <a href="{{ route('admin.kelompok-tani.index') }}" style="color:var(--green-dark); font-weight:600; text-decoration:none; font-size:13px;">← Kembali ke Daftar Kelompok Tani</a>
        <form action="{{ route('admin.kelompok-tani.store') }}" method="POST" style="margin-top:20px;">
            @csrf
            <div class="card" style="padding:24px; background:#fff; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
                @if($errors->any())
                    <div style="background:#fee2e2; border:1px solid #fca5a5; color:#dc2626; padding:12px; border-radius:10px; margin-bottom:16px; font-size:13px;">
                        @foreach($errors->all() as $error)<div>• {{ $error }}</div>@endforeach
                    </div>
                @endif

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:16px;">
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Nama Kelompok</label>
                        <input type="text" name="nama_kelompok" value="{{ old('nama_kelompok') }}" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit; font-weight:600;">
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Nama Ketua</label>
                        <input type="text" name="ketua" value="{{ old('ketua') }}" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; margin-bottom:16px;">
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Jorong</label>
                        <input type="text" name="jorong" value="{{ old('jorong') }}" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Jumlah Anggota</label>
                        <input type="number" name="jumlah_anggota" value="{{ old('jumlah_anggota') }}" min="1" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Luas Lahan</label>
                        <input type="text" name="luas_lahan" value="{{ old('luas_lahan') }}" placeholder="20 Ha" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; margin-bottom:16px;">
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Komoditas Utama</label>
                        <input type="text" name="komoditas_utama" value="{{ old('komoditas_utama') }}" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Produktivitas</label>
                        <input type="text" name="produktivitas" value="{{ old('produktivitas') }}" placeholder="6.7 Ton/Ha/Musim" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Status</label>
                        <select name="status" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit;">
                            <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Non-Aktif" {{ old('status') == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
                        </select>
                    </div>
                </div>

                <div style="text-align:right;">
                    <button type="submit" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; padding:10px 24px; font-size:14px; font-weight:700; border-radius:24px; cursor:pointer; border:none; box-shadow:0 4px 12px rgba(46,125,50,0.25); display:inline-flex; align-items:center; gap:6px;">
                        ✓ Simpan Data Kelompok Tani
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
