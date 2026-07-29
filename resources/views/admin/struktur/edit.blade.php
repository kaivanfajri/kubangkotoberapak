@extends('layouts.app')

@section('header_title', 'Kelola Struktur Nagari')
@section('header_subtitle', 'Kelola data aparatur, posisi, serta pemotongan & unggah foto pengurus nagari.')

@section('content')
    <!-- CROPPER.JS STYLES & SCRIPT -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>

    <div style="max-width:1100px; margin:0 auto;">
        
        @if(session('success'))
            <div style="background:var(--green-light); border:1px solid var(--green); color:var(--green-dark); padding:12px 16px; border-radius:12px; margin-bottom:20px; font-weight:600;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.struktur.update') }}" method="POST" enctype="multipart/form-data">
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
                        <small style="color:var(--muted);">Wali Nagari, Sekretaris Nagari, Kaur, Kasi, Staf & Wali Kampung</small>
                    </div>
                    <button type="button" onclick="addAparaturRow('pemerintahList', 'pemerintah')" class="btn" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; font-weight:700; padding:9px 18px; font-size:13px; border-radius:24px; border:none; cursor:pointer; box-shadow:0 4px 12px rgba(46,125,50,0.25);">
                        + Tambah Aparatur
                    </button>
                </div>

                <div class="table-wrap" style="overflow-x:auto;">
                    <table style="width:100%; border-collapse:collapse; font-size:13px;">
                        <thead>
                            <tr style="background:#e8f5e9; color:var(--green-dark); text-align:left; font-size:12px; text-transform:uppercase; letter-spacing:0.5px;">
                                <th style="padding:12px; border-radius:10px 0 0 10px; width:110px;">FOTO</th>
                                <th style="padding:12px;">NAMA LENGKAP</th>
                                <th style="padding:12px;">JABATAN</th>
                                <th style="padding:12px; text-align:center; width:140px; border-radius:0 10px 10px 0;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="pemerintahList">
                            @php $pemerintah = $data['pemerintah'] ?? []; @endphp
                            @foreach($pemerintah as $index => $item)
                                <tr class="row-item" style="border-bottom:1px solid #f0f4f0;">
                                    <td style="padding:12px; vertical-align:middle;">
                                        <div style="display:flex; flex-direction:column; align-items:center; gap:6px;">
                                            <div class="avatar-preview-box" style="width:52px; height:52px; border-radius:50%; background:#e8f5e9; border:2px solid var(--green); overflow:hidden; display:flex; align-items:center; justify-content:center; font-weight:800; color:var(--green-dark); font-size:16px;">
                                                @if(!empty($item['foto']))
                                                    <img src="{{ asset('storage/'.$item['foto']) }}" alt="{{ $item['nama'] }}" style="width:100%; height:100%; object-fit:cover;">
                                                @else
                                                    {{ strtoupper(substr($item['nama'] ?? 'A', 0, 1)) }}
                                                @endif
                                            </div>
                                            <input type="hidden" name="pemerintah[{{ $index }}][foto_existing]" value="{{ $item['foto'] ?? '' }}">
                                            <input type="hidden" name="pemerintah[{{ $index }}][foto_cropped]" class="foto-cropped-input" value="">
                                            <label style="font-size:10.5px; color:var(--green-dark); font-weight:700; cursor:pointer; background:#e8f5e9; padding:3px 10px; border-radius:12px; border:1px solid #c8e6c9;">
                                                ✂ Crop &amp; Upload
                                                <input type="file" name="pemerintah[{{ $index }}][foto_file]" accept="image/*" style="display:none;" onchange="openCropperModal(this)">
                                            </label>
                                        </div>
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
                                            <button type="button" onclick="this.closest('tr').remove()" class="btn btn-danger btn-sm" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:6px 12px; border-radius:20px; cursor:pointer; font-weight:700; font-size:12px;">
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
                                <th style="padding:12px; border-radius:10px 0 0 10px; width:110px;">FOTO</th>
                                <th style="padding:12px;">NAMA LENGKAP</th>
                                <th style="padding:12px;">JABATAN</th>
                                <th style="padding:12px; text-align:center; width:140px; border-radius:0 10px 10px 0;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="bamusList">
                            @php $bamus = $data['bamus'] ?? []; @endphp
                            @foreach($bamus as $index => $item)
                                <tr class="row-item" style="border-bottom:1px solid #f0f4f0;">
                                    <td style="padding:12px; vertical-align:middle;">
                                        <div style="display:flex; flex-direction:column; align-items:center; gap:6px;">
                                            <div class="avatar-preview-box" style="width:52px; height:52px; border-radius:50%; background:#e0f2fe; border:2px solid #0288d1; overflow:hidden; display:flex; align-items:center; justify-content:center; font-weight:800; color:#0369a1; font-size:16px;">
                                                @if(!empty($item['foto']))
                                                    <img src="{{ asset('storage/'.$item['foto']) }}" alt="{{ $item['nama'] }}" style="width:100%; height:100%; object-fit:cover;">
                                                @else
                                                    {{ strtoupper(substr($item['nama'] ?? 'B', 0, 1)) }}
                                                @endif
                                            </div>
                                            <input type="hidden" name="bamus[{{ $index }}][foto_existing]" value="{{ $item['foto'] ?? '' }}">
                                            <input type="hidden" name="bamus[{{ $index }}][foto_cropped]" class="foto-cropped-input" value="">
                                            <label style="font-size:10.5px; color:#0369a1; font-weight:700; cursor:pointer; background:#e0f2fe; padding:3px 10px; border-radius:12px; border:1px solid #bae6fd;">
                                                ✂ Crop &amp; Upload
                                                <input type="file" name="bamus[{{ $index }}][foto_file]" accept="image/*" style="display:none;" onchange="openCropperModal(this)">
                                            </label>
                                        </div>
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
                                            <button type="button" onclick="this.closest('tr').remove()" class="btn btn-danger btn-sm" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:6px 12px; border-radius:20px; cursor:pointer; font-weight:700; font-size:12px;">
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
                                <th style="padding:12px; border-radius:10px 0 0 10px; width:110px;">FOTO</th>
                                <th style="padding:12px;">NAMA LENGKAP</th>
                                <th style="padding:12px;">JABATAN</th>
                                <th style="padding:12px; text-align:center; width:140px; border-radius:0 10px 10px 0;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="lpmnList">
                            @php $lpmn = $data['lpmn'] ?? []; @endphp
                            @foreach($lpmn as $index => $item)
                                <tr class="row-item" style="border-bottom:1px solid #f0f4f0;">
                                    <td style="padding:12px; vertical-align:middle;">
                                        <div style="display:flex; flex-direction:column; align-items:center; gap:6px;">
                                            <div class="avatar-preview-box" style="width:52px; height:52px; border-radius:50%; background:#fef3c7; border:2px solid #d97706; overflow:hidden; display:flex; align-items:center; justify-content:center; font-weight:800; color:#b45309; font-size:16px;">
                                                @if(!empty($item['foto']))
                                                    <img src="{{ asset('storage/'.$item['foto']) }}" alt="{{ $item['nama'] }}" style="width:100%; height:100%; object-fit:cover;">
                                                @else
                                                    {{ strtoupper(substr($item['nama'] ?? 'L', 0, 1)) }}
                                                @endif
                                            </div>
                                            <input type="hidden" name="lpmn[{{ $index }}][foto_existing]" value="{{ $item['foto'] ?? '' }}">
                                            <input type="hidden" name="lpmn[{{ $index }}][foto_cropped]" class="foto-cropped-input" value="">
                                            <label style="font-size:10.5px; color:#b45309; font-weight:700; cursor:pointer; background:#fef3c7; padding:3px 10px; border-radius:12px; border:1px solid #fde68a;">
                                                ✂ Crop &amp; Upload
                                                <input type="file" name="lpmn[{{ $index }}][foto_file]" accept="image/*" style="display:none;" onchange="openCropperModal(this)">
                                            </label>
                                        </div>
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
                                            <button type="button" onclick="this.closest('tr').remove()" class="btn btn-danger btn-sm" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:6px 12px; border-radius:20px; cursor:pointer; font-weight:700; font-size:12px;">
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
                    Simpan Perubahan &amp; Hasil Potongan Foto Struktur Nagari
                </button>
            </div>
        </form>
    </div>

    <!-- MODAL POPUP CROPPER -->
    <div id="cropperModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.75); z-index:9999; backdrop-filter:blur(5px); align-items:center; justify-content:center; padding:20px;">
        <div style="background:#ffffff; border-radius:20px; padding:24px; max-width:550px; width:100%; box-shadow:0 20px 40px rgba(0,0,0,0.3); position:relative;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; border-bottom:1px solid #eef2f0; padding-bottom:12px;">
                <h3 style="font-size:1.15rem; font-weight:800; color:var(--ink); font-family:'Poppins',sans-serif; margin:0;">
                    ✂ Potong &amp; Atur Posisi Foto
                </h3>
                <button type="button" onclick="closeCropperModal()" style="background:none; border:none; font-size:20px; cursor:pointer; color:var(--muted); font-weight:700;">✕</button>
            </div>

            <div style="max-height:360px; overflow:hidden; background:#111; border-radius:12px; margin-bottom:16px; display:flex; align-items:center; justify-content:center;">
                <img id="cropperImage" src="" style="max-width:100%; display:block;">
            </div>

            <div style="display:flex; justify-content:center; gap:8px; margin-bottom:20px;">
                <button type="button" onclick="rotateCropper(-90)" class="btn" style="background:#f1f5f9; padding:6px 14px; border-radius:8px; font-weight:700; font-size:13px;">↶ Putar Kiri</button>
                <button type="button" onclick="rotateCropper(90)" class="btn" style="background:#f1f5f9; padding:6px 14px; border-radius:8px; font-weight:700; font-size:13px;">↷ Putar Kanan</button>
                <button type="button" onclick="resetCropper()" class="btn" style="background:#f1f5f9; padding:6px 14px; border-radius:8px; font-weight:700; font-size:13px;">↺ Reset</button>
            </div>

            <div style="display:flex; justify-content:flex-end; gap:12px;">
                <button type="button" onclick="closeCropperModal()" class="btn" style="background:#f1f5f9; color:var(--muted); padding:10px 20px; border-radius:20px; font-weight:700; border:none; cursor:pointer;">
                    Batal
                </button>
                <button type="button" onclick="cropAndApply()" class="btn" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; padding:10px 24px; border-radius:20px; font-weight:800; border:none; cursor:pointer; box-shadow:0 4px 12px rgba(46,125,50,0.25);">
                    ✓ Potong &amp; Gunakan Foto
                </button>
            </div>
        </div>
    </div>

    <script>
        let cropperInstance = null;
        let activeRowTarget = null;

        function addAparaturRow(containerId, prefix) {
            const container = document.getElementById(containerId);
            const index = Date.now();
            const tr = document.createElement('tr');
            tr.className = 'row-item';
            tr.style.cssText = 'border-bottom:1px solid #f0f4f0;';
            tr.innerHTML = `
                <td style="padding:12px; vertical-align:middle;">
                    <div style="display:flex; flex-direction:column; align-items:center; gap:6px;">
                        <div class="avatar-preview-box" style="width:52px; height:52px; border-radius:50%; background:#e8f5e9; border:2px solid var(--green); overflow:hidden; display:flex; align-items:center; justify-content:center; font-weight:800; color:var(--green-dark); font-size:16px;">
                            ?
                        </div>
                        <input type="hidden" name="${prefix}[${index}][foto_existing]" value="">
                        <input type="hidden" name="${prefix}[${index}][foto_cropped]" class="foto-cropped-input" value="">
                        <label style="font-size:10.5px; color:var(--green-dark); font-weight:700; cursor:pointer; background:#e8f5e9; padding:3px 10px; border-radius:12px; border:1px solid #c8e6c9;">
                            ✂ Crop &amp; Upload
                            <input type="file" name="${prefix}[${index}][foto_file]" accept="image/*" style="display:none;" onchange="openCropperModal(this)">
                        </label>
                    </div>
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
                        <button type="button" onclick="this.closest('tr').remove()" class="btn btn-danger btn-sm" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:6px 12px; border-radius:20px; cursor:pointer; font-weight:700; font-size:12px;">
                            Hapus
                        </button>
                    </div>
                </td>
            `;
            container.appendChild(tr);
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

        function openCropperModal(input) {
            if (input.files && input.files[0]) {
                activeRowTarget = input.closest('tr');
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('cropperImage');
                    img.src = e.target.result;
                    document.getElementById('cropperModal').style.display = 'flex';

                    if (cropperInstance) {
                        cropperInstance.destroy();
                    }

                    cropperInstance = new Cropper(img, {
                        aspectRatio: 1,
                        viewMode: 1,
                        background: false,
                        autoCropArea: 0.9,
                        responsive: true
                    });
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function closeCropperModal() {
            document.getElementById('cropperModal').style.display = 'none';
            if (cropperInstance) {
                cropperInstance.destroy();
                cropperInstance = null;
            }
        }

        function rotateCropper(degree) {
            if (cropperInstance) {
                cropperInstance.rotate(degree);
            }
        }

        function resetCropper() {
            if (cropperInstance) {
                cropperInstance.reset();
            }
        }

        function cropAndApply() {
            if (cropperInstance && activeRowTarget) {
                const canvas = cropperInstance.getCroppedCanvas({
                    width: 400,
                    height: 400,
                    imageSmoothingEnabled: true,
                    imageSmoothingQuality: 'high',
                });

                if (canvas) {
                    const croppedBase64 = canvas.toDataURL('image/jpeg', 0.9);
                    const avatarBox = activeRowTarget.querySelector('.avatar-preview-box');
                    const hiddenInput = activeRowTarget.querySelector('.foto-cropped-input');

                    avatarBox.innerHTML = `<img src="${croppedBase64}" style="width:100%; height:100%; object-fit:cover;">`;
                    hiddenInput.value = croppedBase64;
                }
            }
            closeCropperModal();
        }
    </script>
@endsection
