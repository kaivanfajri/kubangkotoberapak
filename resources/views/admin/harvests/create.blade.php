@extends('layouts.app')

@section('content')
    <div style="max-width:700px; margin:0 auto;">
        <a class="back-link" href="{{ route('admin.harvests.index') }}">← Kembali ke Kelola Data Panen</a>
        
        <div class="card" style="padding:32px; box-shadow:var(--shadow-hover);">
            <h2 style="font-size:22px; font-weight:700; color:var(--green-dark); margin-bottom:20px;">Tambah Data Panen Baru</h2>

            <form action="{{ route('admin.harvests.store') }}" method="POST">
                @csrf

                <div class="field">
                    <label>Nama Kelompok Tani</label>
                    <input type="text" name="nama_kelompok_tani" value="{{ old('nama_kelompok_tani') }}" placeholder="Contoh: Kelompok Tani Durian Taba">
                    @error('nama_kelompok_tani') <p style="color:#c0392b; font-size:12px; margin-top:4px;">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <label>Hasil Pertanian</label>
                    <input type="text" name="hasil_pertanian" value="{{ old('hasil_pertanian') }}" placeholder="Contoh: Padi, Semangka, Jagung">
                    @error('hasil_pertanian') <p style="color:#c0392b; font-size:12px; margin-top:4px;">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <label>Varian</label>
                    <input type="text" name="varian" value="{{ old('varian') }}" placeholder="Contoh: Cisokan, Sokan, Ketan">
                    @error('varian') <p style="color:#c0392b; font-size:12px; margin-top:4px;">{{ $message }}</p> @enderror
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                    <div class="field">
                        <label>Total Panen (kg)</label>
                        <input type="text" name="Total_panen" value="{{ old('Total_panen') }}" placeholder="Contoh: 1000">
                        @error('Total_panen') <p style="color:#c0392b; font-size:12px; margin-top:4px;">{{ $message }}</p> @enderror
                    </div>

                    <div class="field">
                        <label>Stok Tersedia (kg)</label>
                        <input type="text" name="Stok_tersedia" value="{{ old('Stok_tersedia') }}" placeholder="Contoh: 800">
                        @error('Stok_tersedia') <p style="color:#c0392b; font-size:12px; margin-top:4px;">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                    <div class="field">
                        <label>Nomor HP / WhatsApp</label>
                        <input type="text" name="nomor_hp" value="{{ old('nomor_hp') }}" placeholder="Contoh: 081234567890">
                        @error('nomor_hp') <p style="color:#c0392b; font-size:12px; margin-top:4px;">{{ $message }}</p> @enderror
                    </div>

                    <div class="field">
                        <label>Tanggal Panen</label>
                        <input type="date" name="tanggal_panen" value="{{ old('tanggal_panen') }}">
                        @error('tanggal_panen') <p style="color:#c0392b; font-size:12px; margin-top:4px;">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="field">
                    <label>Lokasi / Jorong</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi') }}" placeholder="Contoh: Jorong Durian Taba, Nagari Kubang">
                    @error('lokasi') <p style="color:#c0392b; font-size:12px; margin-top:4px;">{{ $message }}</p> @enderror
                </div>

                <div style="display:flex; gap:12px; margin-top:24px;">
                    <button type="submit" class="btn btn-primary">Simpan Data Panen</button>
                    <a href="{{ route('admin.harvests.index') }}" class="btn btn-outline">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection