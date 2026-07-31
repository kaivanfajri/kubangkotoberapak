@extends('layouts.app')

@section('header_title', 'Kelola Struktur Nagari')
@section('header_subtitle', 'Kelola data aparatur dan jabatan pengurus nagari.')

@section('content')
    <div style="max-width:1100px; margin:0 auto;">
        
        @if(session('success'))
            <div style="background:var(--green-light); border:1px solid var(--green); color:var(--green-dark); padding:12px 16px; border-radius:12px; margin-bottom:20px; font-weight:600;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.struktur.update') }}" method="POST">
            @csrf

            <!-- TOP ACTION BAR & SLOGAN -->
            <div class="card" style="padding:20px 24px; margin-bottom:24px; border-radius:16px; background:#fff; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
                <div style="flex:1; min-width:280px;">
                    <label style="font-size:12px; font-weight:700; color:var(--muted); text-transform:uppercase; display:block; margin-bottom:4px;">Slogan / Motto Nagari</label>
                    <input type="text" name="slogan" value="{{ old('slogan', $data['slogan'] ?? 'Basamo Mangko Manjadi') }}" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px 14px; font-weight:700; color:var(--green-dark); font-family:inherit;">
                </div>
                <div>
                    <a href="{{ route('struktur') }}" target="_blank" class="btn" style="background:#e8f5e9; color:var(--green-dark); font-weight:700; border:1px solid var(--green); padding:10px 18px; border-radius:24px; text-decoration:none; font-size:13px; display:inline-flex; align-items:center; gap:6px;">
                        Lihat Tampilan Publik ↗
                    </a>
                </div>
            </div>

            <!-- 1. PEMERINTAH NAGARI -->
            <div class="card" style="padding:24px; margin-bottom:28px; border-radius:16px; background:#fff; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; flex-wrap:wrap; gap:12px;">
                    <div>
                        <h3 style="font-size:1.1rem; color:var(--green-dark); font-weight:800; font-family:'Poppins',sans-serif; margin:0;">
                            Pemerintah Nagari
                        </h3>
                        <small style="color:var(--muted);">Wali Nagari, Sekretaris Nagari, Kaur, Kasi, Staf &amp; Wali Kampung</small>
                    </div>
                    <button type="button" onclick="addAparaturRow('pemerintahList', 'pemerintah')" class="btn" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; font-weight:700; padding:9px 18px; font-size:13px; border-radius:24px; border:none; cursor:pointer; box-shadow:0 4px 12px rgba(46,125,50,0.25);">
                        + Tambah Aparatur
                    </button>
                </div>

                <div class="table-wrap" style="overflow-x:auto;">
                    <table style="width:100%; border-collapse:collapse; font-size:13px;">
                        <thead>
                            <tr style="background:#e8f5e9; color:var(--green-dark); text-align:left; font-size:12px; text-transform:uppercase; letter-spacing:0.5px;">
                                <th style="padding:12px; border-radius:10px 0 0 10px; width:50px; text-align:center;">NO</th>
                                <th style="padding:12px;">NAMA LENGKAP</th>
                                <th style="padding:12px;">JABATAN</th>
                                <th style="padding:12px; text-align:center; width:140px; border-radius:0 10px 10px 0;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="pemerintahList">
                            @php $pemerintah = $data['pemerintah'] ?? []; @endphp
                            @foreach($pemerintah as $index => $item)
                                <tr class="row-item" style="border-bottom:1px solid #f0f4f0;">
                                    <td style="padding:12px; text-align:center; font-weight:700; color:var(--muted); vertical-align:middle;" class="row-num">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td style="padding:12px; vertical-align:middle;">
                                        <input type="text" name="pemerintah[{{ $index }}][nama]" value="{{ $item['nama'] ?? '' }}" placeholder="Nama pengurus & gelar" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit; font-weight:600;">
                                    </td>
                                    <td style="padding:12px; vertical-align:middle;">
                                        <input type="text" name="pemerintah[{{ $index }}][jabatan]" value="{{ $item['jabatan'] ?? '' }}" placeholder="Jabatan (contoh: Wali Nagari)" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit;">
                                    </td>
                                    <td style="padding:12px; text-align:center; vertical-align:middle;">
                                        <div style="display:inline-flex; gap:6px;">
                                            <button type="button" onclick="focusRowEdit(this)" class="btn btn-outline btn-sm" style="border:1px solid var(--green); color:var(--green-dark); padding:6px 12px; border-radius:20px; font-weight:700; font-size:12px; cursor:pointer; background:#fff;">
                                                Edit
                                            </button>
                                            <button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:6px 12px; border-radius:20px; cursor:pointer; font-weight:700; font-size:12px;">
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 2. BAMUS NAGARI -->
            <div class="card" style="padding:24px; margin-bottom:28px; border-radius:16px; background:#fff; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; flex-wrap:wrap; gap:12px;">
                    <div>
                        <h3 style="font-size:1.1rem; color:#0288d1; font-weight:800; font-family:'Poppins',sans-serif; margin:0;">
                            BAMUS Nagari
                        </h3>
                        <small style="color:var(--muted);">Badan Musyawarah Nagari</small>
                    </div>
                    <button type="button" onclick="addAparaturRow('bamusList', 'bamus')" class="btn" style="background:#0288d1; color:#fff; font-weight:700; padding:9px 18px; font-size:13px; border-radius:24px; border:none; cursor:pointer; box-shadow:0 4px 12px rgba(2,136,209,0.25);">
                        + Tambah Bamus
                    </button>
                </div>

                <div class="table-wrap" style="overflow-x:auto;">
                    <table style="width:100%; border-collapse:collapse; font-size:13px;">
                        <thead>
                            <tr style="background:#e0f2fe; color:#0369a1; text-align:left; font-size:12px; text-transform:uppercase; letter-spacing:0.5px;">
                                <th style="padding:12px; border-radius:10px 0 0 10px; width:50px; text-align:center;">NO</th>
                                <th style="padding:12px;">NAMA LENGKAP</th>
                                <th style="padding:12px;">JABATAN</th>
                                <th style="padding:12px; text-align:center; width:140px; border-radius:0 10px 10px 0;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="bamusList">
                            @php $bamus = $data['bamus'] ?? []; @endphp
                            @foreach($bamus as $index => $item)
                                <tr class="row-item" style="border-bottom:1px solid #f0f4f0;">
                                    <td style="padding:12px; text-align:center; font-weight:700; color:var(--muted); vertical-align:middle;" class="row-num">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td style="padding:12px; vertical-align:middle;">
                                        <input type="text" name="bamus[{{ $index }}][nama]" value="{{ $item['nama'] ?? '' }}" placeholder="Nama pengurus & gelar" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit; font-weight:600;">
                                    </td>
                                    <td style="padding:12px; vertical-align:middle;">
                                        <input type="text" name="bamus[{{ $index }}][jabatan]" value="{{ $item['jabatan'] ?? '' }}" placeholder="Jabatan (contoh: Ketua)" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit;">
                                    </td>
                                    <td style="padding:12px; text-align:center; vertical-align:middle;">
                                        <div style="display:inline-flex; gap:6px;">
                                            <button type="button" onclick="focusRowEdit(this)" class="btn btn-outline btn-sm" style="border:1px solid #0288d1; color:#0369a1; padding:6px 12px; border-radius:20px; font-weight:700; font-size:12px; cursor:pointer; background:#fff;">
                                                Edit
                                            </button>
                                            <button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:6px 12px; border-radius:20px; cursor:pointer; font-weight:700; font-size:12px;">
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 3. LPMN NAGARI -->
            <div class="card" style="padding:24px; margin-bottom:28px; border-radius:16px; background:#fff; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; flex-wrap:wrap; gap:12px;">
                    <div>
                        <h3 style="font-size:1.1rem; color:#d97706; font-weight:800; font-family:'Poppins',sans-serif; margin:0;">
                            LPMN Nagari
                        </h3>
                        <small style="color:var(--muted);">Lembaga Pemberdayaan Masyarakat Nagari</small>
                    </div>
                    <button type="button" onclick="addAparaturRow('lpmnList', 'lpmn')" class="btn" style="background:#d97706; color:#fff; font-weight:700; padding:9px 18px; font-size:13px; border-radius:24px; border:none; cursor:pointer; box-shadow:0 4px 12px rgba(217,119,6,0.25);">
                        + Tambah LPMN
                    </button>
                </div>

                <div class="table-wrap" style="overflow-x:auto;">
                    <table style="width:100%; border-collapse:collapse; font-size:13px;">
                        <thead>
                            <tr style="background:#fef3c7; color:#b45309; text-align:left; font-size:12px; text-transform:uppercase; letter-spacing:0.5px;">
                                <th style="padding:12px; border-radius:10px 0 0 10px; width:50px; text-align:center;">NO</th>
                                <th style="padding:12px;">NAMA LENGKAP</th>
                                <th style="padding:12px;">JABATAN</th>
                                <th style="padding:12px; text-align:center; width:140px; border-radius:0 10px 10px 0;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="lpmnList">
                            @php $lpmn = $data['lpmn'] ?? []; @endphp
                            @foreach($lpmn as $index => $item)
                                <tr class="row-item" style="border-bottom:1px solid #f0f4f0;">
                                    <td style="padding:12px; text-align:center; font-weight:700; color:var(--muted); vertical-align:middle;" class="row-num">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td style="padding:12px; vertical-align:middle;">
                                        <input type="text" name="lpmn[{{ $index }}][nama]" value="{{ $item['nama'] ?? '' }}" placeholder="Nama pengurus & gelar" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit; font-weight:600;">
                                    </td>
                                    <td style="padding:12px; vertical-align:middle;">
                                        <input type="text" name="lpmn[{{ $index }}][jabatan]" value="{{ $item['jabatan'] ?? '' }}" placeholder="Jabatan (contoh: Ketua)" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit;">
                                    </td>
                                    <td style="padding:12px; text-align:center; vertical-align:middle;">
                                        <div style="display:inline-flex; gap:6px;">
                                            <button type="button" onclick="focusRowEdit(this)" class="btn btn-outline btn-sm" style="border:1px solid #d97706; color:#b45309; padding:6px 12px; border-radius:20px; font-weight:700; font-size:12px; cursor:pointer; background:#fff;">
                                                Edit
                                            </button>
                                            <button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:6px 12px; border-radius:20px; cursor:pointer; font-weight:700; font-size:12px;">
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SUBMIT BUTTON -->
            <div style="margin-top:24px; margin-bottom:40px;">
                <button type="submit" class="btn btn-primary" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; padding:14px 28px; font-size:16px; font-weight:800; border-radius:30px; width:100%; cursor:pointer; border:none; box-shadow:0 6px 20px rgba(46,125,50,0.3);">
                    Simpan Perubahan Struktur Nagari
                </button>
            </div>
        </form>
    </div>

    <script>
        function addAparaturRow(containerId, prefix) {
            const container = document.getElementById(containerId);
            const index = Date.now();
            const count = container.querySelectorAll('tr').length + 1;
            const tr = document.createElement('tr');
            tr.className = 'row-item';
            tr.style.cssText = 'border-bottom:1px solid #f0f4f0;';
            tr.innerHTML = `
                <td style="padding:12px; text-align:center; font-weight:700; color:var(--muted); vertical-align:middle;" class="row-num">
                    ${count}
                </td>
                <td style="padding:12px; vertical-align:middle;">
                    <input type="text" name="${prefix}[${index}][nama]" value="" placeholder="Nama pengurus & gelar" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit; font-weight:600;">
                </td>
                <td style="padding:12px; vertical-align:middle;">
                    <input type="text" name="${prefix}[${index}][jabatan]" value="" placeholder="Jabatan" required style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:9px 12px; font-family:inherit;">
                </td>
                <td style="padding:12px; text-align:center; vertical-align:middle;">
                    <div style="display:inline-flex; gap:6px;">
                        <button type="button" onclick="focusRowEdit(this)" class="btn btn-outline btn-sm" style="border:1px solid var(--green); color:var(--green-dark); padding:6px 12px; border-radius:20px; font-weight:700; font-size:12px; cursor:pointer; background:#fff;">
                            Edit
                        </button>
                        <button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:6px 12px; border-radius:20px; cursor:pointer; font-weight:700; font-size:12px;">
                            Hapus
                        </button>
                    </div>
                </td>
            `;
            container.appendChild(tr);
            updateRowNumbers(containerId);
        }

        function deleteRow(btn) {
            const tbody = btn.closest('tbody');
            const tbodyId = tbody.id;
            btn.closest('tr').remove();
            updateRowNumbers(tbodyId);
        }

        function updateRowNumbers(containerId) {
            const container = document.getElementById(containerId);
            if (container) {
                const rows = container.querySelectorAll('tr');
                rows.forEach((row, i) => {
                    const numCell = row.querySelector('.row-num');
                    if (numCell) numCell.innerText = i + 1;
                });
            }
        }

        function focusRowEdit(btn) {
            const tr = btn.closest('tr');
            const namaInput = tr.querySelector('input[name*="[nama]"]');
            if (namaInput) {
                namaInput.focus();
                tr.style.transition = 'background 0.3s ease';
                tr.style.background = '#f4fbf5';
                setTimeout(() => { tr.style.background = 'transparent'; }, 1000);
            }
        }
    </script>
@endsection
