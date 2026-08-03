@extends('layouts.app')

@section('header_title', 'Kelola Lembaga Nagari')
@section('header_subtitle', 'Tambah, ubah kategori, nama pimpinan, anggota, dan deskripsi lembaga nagari.')

@section('content')
    <div style="max-width:950px; margin:0 auto;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; flex-wrap:wrap; gap:12px;">
            <div>
                <h3 style="font-size:1.15rem; font-weight:700; color:var(--ink); font-family:'Poppins',sans-serif;">Daftar Lembaga Nagari</h3>
            </div>
            <div>
                <a href="{{ route('lembaga') }}" target="_blank" class="btn" style="background:#e8f5e9; color:var(--green-dark); font-weight:700; border:1px solid var(--green); padding:8px 16px; border-radius:24px; text-decoration:none; font-size:13px; display:inline-flex; align-items:center; gap:6px;">
                    Lihat Tampilan Publik ↗
                </a>
            </div>
        </div>

        @if(session('success'))
            <div style="background:var(--green-light); border:1px solid var(--green); color:var(--green-dark); padding:12px 16px; border-radius:12px; margin-bottom:18px; font-weight:600;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.lembaga.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div id="lembagaListContainer">
                @php $items = $data ?? []; @endphp
                @foreach($items as $index => $item)
                    <div class="card lembaga-item-card" style="padding:24px; margin-bottom:20px; background:#fff; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0; position:relative;">
                        
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
                            <span style="font-size:11px; font-weight:700; color:var(--muted); text-transform:uppercase; letter-spacing:0.5px;">
                                Lembaga #<span class="card-num">{{ $loop->iteration }}</span>
                            </span>
                            <button type="button" onclick="this.closest('.lembaga-item-card').remove(); updateCardNumbers();" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:4px 12px; border-radius:16px; font-weight:700; font-size:11px; cursor:pointer;">
                                Hapus Lembaga
                            </button>
                        </div>

                        <input type="hidden" name="items[{{ $index }}][id]" value="{{ $item['id'] ?? 'lembaga_'.time().'_'.$index }}">

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:14px;">
                            <div class="field">
                                <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Nama Lembaga</label>
                                <input type="text" name="items[{{ $index }}][nama]" value="{{ $item['nama'] ?? '' }}" placeholder="Contoh: PAUD Nagari Kubang" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit; font-weight:700; color:var(--green-dark);">
                            </div>
                            <div class="field">
                                <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Kategori Lembaga</label>
                                <select name="items[{{ $index }}][kategori]" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit; font-weight:600;">
                                    @php $katVal = $item['kategori'] ?? 'Pemerintahan & Adat'; @endphp
                                    <option value="Pemerintahan & Adat" {{ $katVal == 'Pemerintahan & Adat' ? 'selected' : '' }}>Pemerintahan &amp; Adat</option>
                                    <option value="Pendidikan & Keagamaan" {{ $katVal == 'Pendidikan & Keagamaan' ? 'selected' : '' }}>Pendidikan &amp; Keagamaan (PAUD, SD, TPA)</option>
                                    <option value="Kesehatan & Sosial" {{ $katVal == 'Kesehatan & Sosial' ? 'selected' : '' }}>Kesehatan &amp; Sosial (Posyandu, PKK)</option>
                                    <option value="Pemuda & Ekonomi" {{ $katVal == 'Pemuda & Ekonomi' ? 'selected' : '' }}>Pemuda &amp; Ekonomi (Karang Taruna, BUMNag)</option>
                                </select>
                            </div>
                        </div>

                        <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; margin-bottom:14px;">
                            <div class="field">
                                <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Nama Ketua / Pimpinan</label>
                                <input type="text" name="items[{{ $index }}][ketua]" value="{{ $item['ketua'] ?? '' }}" placeholder="Nama ketua" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit;">
                            </div>
                            <div class="field">
                                <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Jumlah Anggota / Murid</label>
                                <input type="text" name="items[{{ $index }}][anggota]" value="{{ $item['anggota'] ?? '' }}" placeholder="Contoh: 45 Murid / 12 Pengurus" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit;">
                            </div>
                            <div class="field">
                                <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">No. WA Kontak (opsional)</label>
                                <input type="text" name="items[{{ $index }}][hp]" value="{{ $item['hp'] ?? '' }}" placeholder="628xxxx (opsional)" style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit;">
                            </div>
                        </div>

                        <div class="field" style="margin-bottom:0;">
                            <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Deskripsi &amp; Tugas Lembaga</label>
                            <textarea name="items[{{ $index }}][desc]" rows="3" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit; font-size:13.5px; line-height:1.6;">{{ $item['desc'] ?? '' }}</textarea>
                        </div>

                        <div class="field" style="margin-top:14px; margin-bottom:0;">
                            <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:6px;">📷 Foto Lokasi Lembaga</label>
                            @if(!empty($item['foto']))
                                <div style="margin-bottom:8px;">
                                    <img src="{{ asset('storage/' . $item['foto']) }}" alt="Foto Lokasi" style="width:100%; max-height:160px; object-fit:cover; border-radius:10px; border:1.5px solid #e0e6e0;">
                                    <p style="font-size:11px; color:var(--muted); margin-top:4px;">Foto saat ini. Upload baru untuk mengganti.</p>
                                </div>
                            @else
                                <div style="background:#f8faf8; border:1.5px dashed #c0d5c0; border-radius:10px; padding:12px; margin-bottom:8px; text-align:center; color:var(--muted); font-size:12px;">
                                    Belum ada foto lokasi
                                </div>
                            @endif
                            <input type="file" name="foto[{{ $index }}]" accept="image/*" style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:8px 12px; font-family:inherit; font-size:13px; background:#fff; cursor:pointer;">
                            <small style="color:var(--muted); font-size:11px;">Format: JPG, PNG, WEBP. Maks 2MB. Kosongkan jika tidak ingin mengganti.</small>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- BOTTOM ACTION BAR: TAMBAH & SIMPAN -->
            <div style="margin-top:20px; margin-bottom:40px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:14px;">
                <button type="button" onclick="addLembagaCard()" class="btn" style="background:#e8f5e9; color:var(--green-dark); font-weight:700; border:1.5px solid var(--green); padding:10px 20px; border-radius:24px; font-size:13.5px; cursor:pointer;">
                    + Tambah Lembaga Baru
                </button>

                <button type="submit" class="btn btn-primary" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; padding:11px 26px; font-size:14px; font-weight:800; border-radius:24px; cursor:pointer; border:none; box-shadow:0 4px 12px rgba(46,125,50,0.25); display:inline-flex; align-items:center; gap:6px;">
                    ✓ Simpan Perubahan Lembaga
                </button>
            </div>
        </form>
    </div>

    <script>
        function addLembagaCard() {
            const container = document.getElementById('lembagaListContainer');
            const index = Date.now();
            const count = container.querySelectorAll('.lembaga-item-card').length + 1;
            
            const card = document.createElement('div');
            card.className = 'card lembaga-item-card';
            card.style.cssText = 'padding:24px; margin-bottom:20px; background:#fff; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0; position:relative;';
            
            card.innerHTML = `
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
                    <span style="font-size:11px; font-weight:700; color:var(--muted); text-transform:uppercase; letter-spacing:0.5px;">
                        Lembaga Baru #<span class="card-num">${count}</span>
                    </span>
                    <button type="button" onclick="this.closest('.lembaga-item-card').remove(); updateCardNumbers();" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:4px 12px; border-radius:16px; font-weight:700; font-size:11px; cursor:pointer;">
                        Hapus Lembaga
                    </button>
                </div>

                <input type="hidden" name="items[${index}][id]" value="lembaga_${index}">

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:14px;">
                    <div class="field">
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Nama Lembaga</label>
                        <input type="text" name="items[${index}][nama]" value="" placeholder="Contoh: TPA Masjid Nagari" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit; font-weight:700; color:var(--green-dark);">
                    </div>
                    <div class="field">
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Kategori Lembaga</label>
                        <select name="items[${index}][kategori]" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-family:inherit; font-weight:600;">
                            <option value="Pemerintahan & Adat">Pemerintahan &amp; Adat</option>
                            <option value="Pendidikan & Keagamaan" selected>Pendidikan &amp; Keagamaan (PAUD, SD, TPA)</option>
                            <option value="Kesehatan & Sosial">Kesehatan &amp; Sosial (Posyandu, PKK)</option>
                            <option value="Pemuda & Ekonomi">Pemuda &amp; Ekonomi (Karang Taruna, BUMNag)</option>
                        </select>
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; margin-bottom:14px;">
                    <div class="field">
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Nama Ketua / Pimpinan</label>
                        <input type="text" name="items[${index}][ketua]" value="" placeholder="Nama pimpinan" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit;">
                    </div>
                    <div class="field">
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Jumlah Anggota / Murid</label>
                        <input type="text" name="items[${index}][anggota]" value="" placeholder="Contoh: 60 Santri" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit;">
                    </div>
                    <div class="field">
                        <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">No. WA Kontak (opsional)</label>
                        <input type="text" name="items[${index}][hp]" value="" placeholder="628xxxx (opsional)" style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit;">
                    </div>
                </div>

                <div class="field" style="margin-bottom:0;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">Deskripsi &amp; Tugas Lembaga</label>
                    <textarea name="items[${index}][desc]" rows="3" placeholder="Tuliskan tugas, fungsi, dan profil singkat..." required style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit; font-size:13.5px; line-height:1.6;"></textarea>
                </div>

                <div class="field" style="margin-top:14px; margin-bottom:0;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); display:block; margin-bottom:6px;">📷 Foto Lokasi Lembaga</label>
                    <div style="background:#f8faf8; border:1.5px dashed #c0d5c0; border-radius:10px; padding:12px; margin-bottom:8px; text-align:center; color:var(--muted); font-size:12px;">
                        Belum ada foto lokasi
                    </div>
                    <input type="file" name="foto[${index}]" accept="image/*" style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:8px 12px; font-family:inherit; font-size:13px; background:#fff; cursor:pointer;">
                    <small style="color:var(--muted); font-size:11px;">Format: JPG, PNG, WEBP. Maks 2MB.</small>
                </div>
            `;
            
            container.appendChild(card);
            updateCardNumbers();
            card.scrollIntoView({ behavior: 'smooth' });
        }

        function updateCardNumbers() {
            const cards = document.querySelectorAll('.lembaga-item-card');
            cards.forEach((card, i) => {
                const numSpan = card.querySelector('.card-num');
                if (numSpan) numSpan.innerText = i + 1;
            });
        }
    </script>
@endsection
