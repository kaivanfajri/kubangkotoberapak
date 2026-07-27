@extends('layouts.app')

@section('content')
    <div style="max-width:960px; margin:0 auto;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; flex-wrap:wrap; gap:12px;">
            <div>
                <h2 style="font-size:22px; font-weight:700; color:var(--green-dark); margin-bottom:6px;">Kelola Struktur Nagari</h2>
                <p style="color:var(--muted); font-size:13.5px; margin:0;">Ubah jajaran kepengurusan Pemerintah Nagari, BAMUS, dan LPMN di bawah ini saat terjadi pergantian pengurus.</p>
            </div>
            <a href="{{ route('struktur') }}" target="_blank" class="btn" style="background:#e8f5e9; color:var(--green-dark); font-weight:600; border:1px solid var(--green); padding:8px 16px; border-radius:10px; text-decoration:none; font-size:13px; display:inline-flex; align-items:center; gap:6px;">
                <span>👁️</span> Lihat Tampilan Publik
            </a>
        </div>

        @if(session('success'))
            <div style="background:var(--green-light); border:1px solid var(--green); color:var(--green-dark); padding:12px 16px; border-radius:12px; margin-bottom:18px; font-weight:600;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.struktur.update') }}" method="POST">
            @csrf

            <!-- SLOGAN NAGARI -->
            <div class="card" style="padding:24px; margin-bottom:20px; border-radius:16px;">
                <h3 style="font-size:16px; color:var(--green-dark); margin-bottom:12px; font-weight:700;">Slogan Nagari</h3>
                <div class="field" style="margin-bottom:0;">
                    <label style="font-weight:600;">Slogan (di bagian bawah bagan)</label>
                    <input type="text" name="slogan" value="{{ old('slogan', $data['slogan'] ?? 'Basamo Mangko Manjadi') }}" required style="font-weight:600;">
                </div>
            </div>

            <!-- PEMERINTAH NAGARI -->
            <div class="card" style="padding:24px; margin-bottom:20px; border-radius:16px;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; flex-wrap:wrap; gap:10px;">
                    <div>
                        <h3 style="font-size:16px; color:var(--green-dark); margin:0; font-weight:700;">Jajaran Pemerintah Nagari</h3>
                        <small style="color:var(--muted);">Termasuk Wali Nagari, Sekretaris, Kaur, Kasi, Staf, dan Wali Kampung</small>
                    </div>
                    <button type="button" onclick="addRow('pemerintahList', 'pemerintah')" class="btn" style="background:#e8f5e9; color:var(--green-dark); font-weight:700; padding:8px 14px; font-size:12.5px; border-radius:10px; border:1px solid var(--green); cursor:pointer;">
                        + Tambah Pejabat Nagari
                    </button>
                </div>

                <div id="pemerintahList">
                    @php $pemerintah = $data['pemerintah'] ?? []; @endphp
                    @foreach($pemerintah as $index => $item)
                        <div class="row-item" style="display:grid; grid-template-columns:1fr 1.2fr auto; gap:12px; margin-bottom:12px; align-items:end; border-bottom:1px solid #f0f4f0; padding-bottom:12px;">
                            <div class="field" style="margin-bottom:0;">
                                <label style="font-size:11px; font-weight:600; color:var(--muted);">Jabatan</label>
                                <input type="text" name="pemerintah[{{ $index }}][jabatan]" value="{{ $item['jabatan'] ?? '' }}" placeholder="Jabatan (contoh: Wali Nagari)" required>
                            </div>
                            <div class="field" style="margin-bottom:0;">
                                <label style="font-size:11px; font-weight:600; color:var(--muted);">Nama Pejabat / Pengurus</label>
                                <input type="text" name="pemerintah[{{ $index }}][nama]" value="{{ $item['nama'] ?? '' }}" placeholder="Nama lengkap & gelar" required>
                            </div>
                            <button type="button" onclick="this.closest('.row-item').remove()" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:9px 13px; border-radius:8px; cursor:pointer; font-weight:700;" title="Hapus Pengurus">
                                ✕
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- BAMUS NAGARI -->
            <div class="card" style="padding:24px; margin-bottom:20px; border-radius:16px;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; flex-wrap:wrap; gap:10px;">
                    <div>
                        <h3 style="font-size:16px; color:#0288d1; margin:0; font-weight:700;">Jajaran BAMUS Nagari</h3>
                        <small style="color:var(--muted);">Badan Musyawarah Nagari</small>
                    </div>
                    <button type="button" onclick="addRow('bamusList', 'bamus')" class="btn" style="background:#e0f2fe; color:#0369a1; font-weight:700; padding:8px 14px; font-size:12.5px; border-radius:10px; border:1px solid #0288d1; cursor:pointer;">
                        + Tambah Anggota Bamus
                    </button>
                </div>
                <div id="bamusList">
                    @php $bamus = $data['bamus'] ?? []; @endphp
                    @foreach($bamus as $index => $item)
                        <div class="row-item" style="display:grid; grid-template-columns:1fr 1.2fr auto; gap:12px; margin-bottom:12px; align-items:end; border-bottom:1px solid #f0f4f0; padding-bottom:12px;">
                            <div class="field" style="margin-bottom:0;">
                                <label style="font-size:11px; font-weight:600; color:var(--muted);">Jabatan</label>
                                <input type="text" name="bamus[{{ $index }}][jabatan]" value="{{ $item['jabatan'] ?? '' }}" placeholder="Jabatan (contoh: Ketua)" required>
                            </div>
                            <div class="field" style="margin-bottom:0;">
                                <label style="font-size:11px; font-weight:600; color:var(--muted);">Nama Pengurus</label>
                                <input type="text" name="bamus[{{ $index }}][nama]" value="{{ $item['nama'] ?? '' }}" placeholder="Nama lengkap & gelar" required>
                            </div>
                            <button type="button" onclick="this.closest('.row-item').remove()" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:9px 13px; border-radius:8px; cursor:pointer; font-weight:700;" title="Hapus Pengurus">
                                ✕
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- LPMN NAGARI -->
            <div class="card" style="padding:24px; margin-bottom:20px; border-radius:16px;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; flex-wrap:wrap; gap:10px;">
                    <div>
                        <h3 style="font-size:16px; color:#d97706; margin:0; font-weight:700;">Jajaran LPMN Nagari</h3>
                        <small style="color:var(--muted);">Lembaga Pemberdayaan Masyarakat Nagari</small>
                    </div>
                    <button type="button" onclick="addRow('lpmnList', 'lpmn')" class="btn" style="background:#fef3c7; color:#b45309; font-weight:700; padding:8px 14px; font-size:12.5px; border-radius:10px; border:1px solid #d97706; cursor:pointer;">
                        + Tambah Anggota LPMN
                    </button>
                </div>
                <div id="lpmnList">
                    @php $lpmn = $data['lpmn'] ?? []; @endphp
                    @foreach($lpmn as $index => $item)
                        <div class="row-item" style="display:grid; grid-template-columns:1fr 1.2fr auto; gap:12px; margin-bottom:12px; align-items:end; border-bottom:1px solid #f0f4f0; padding-bottom:12px;">
                            <div class="field" style="margin-bottom:0;">
                                <label style="font-size:11px; font-weight:600; color:var(--muted);">Jabatan</label>
                                <input type="text" name="lpmn[{{ $index }}][jabatan]" value="{{ $item['jabatan'] ?? '' }}" placeholder="Jabatan (contoh: Ketua)" required>
                            </div>
                            <div class="field" style="margin-bottom:0;">
                                <label style="font-size:11px; font-weight:600; color:var(--muted);">Nama Pengurus</label>
                                <input type="text" name="lpmn[{{ $index }}][nama]" value="{{ $item['nama'] ?? '' }}" placeholder="Nama lengkap & gelar" required>
                            </div>
                            <button type="button" onclick="this.closest('.row-item').remove()" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:9px 13px; border-radius:8px; cursor:pointer; font-weight:700;" title="Hapus Pengurus">
                                ✕
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <div style="margin-top:24px; margin-bottom:40px;">
                <button type="submit" class="btn btn-primary" style="padding:12px 24px; font-size:15px; font-weight:700; border-radius:12px; width:100%;">
                    💾 Simpan Perubahan Struktur Nagari
                </button>
            </div>
        </form>
    </div>

    <script>
        function addRow(containerId, prefix) {
            const container = document.getElementById(containerId);
            const index = Date.now();
            const div = document.createElement('div');
            div.className = 'row-item';
            div.style.cssText = 'display:grid; grid-template-columns:1fr 1.2fr auto; gap:12px; margin-bottom:12px; align-items:end; border-bottom:1px solid #f0f4f0; padding-bottom:12px;';
            div.innerHTML = `
                <div class="field" style="margin-bottom:0;">
                    <label style="font-size:11px; font-weight:600; color:var(--muted);">Jabatan</label>
                    <input type="text" name="${prefix}[${index}][jabatan]" value="" placeholder="Jabatan" required>
                </div>
                <div class="field" style="margin-bottom:0;">
                    <label style="font-size:11px; font-weight:600; color:var(--muted);">Nama Pengurus / Pejabat</label>
                    <input type="text" name="${prefix}[${index}][nama]" value="" placeholder="Nama lengkap & gelar" required>
                </div>
                <button type="button" onclick="this.closest('.row-item').remove()" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:9px 13px; border-radius:8px; cursor:pointer; font-weight:700;" title="Hapus Pengurus">
                    ✕
                </button>
            `;
            container.appendChild(div);
        }
    </script>
@endsection

