@extends('layouts.app')

@section('content')
    <div style="max-width:750px; margin:0 auto;">
        <a class="back-link" href="{{ route('admin.harvests.index') }}">← Kembali ke Kelola Data Panen</a>
        
        <div class="card" style="padding:32px; box-shadow:var(--shadow-hover);">
            <h2 style="font-size:22px; font-weight:700; color:var(--green-dark); margin-bottom:20px;">Detail Data Panen & QR Code</h2>

            @if(session('success'))
                <div style="background:var(--green-light); border:1px solid var(--green); color:var(--green-dark); padding:12px 16px; border-radius:12px; margin-bottom:18px; font-weight:600;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <div class="info-grid" style="grid-template-columns:1fr 1fr; margin-bottom:24px;">
                <div class="info-box"><div class="k">Kelompok Tani</div><div class="v">{{ $harvest->nama_kelompok_tani }}</div></div>
                <div class="info-box"><div class="k">Hasil Pertanian</div><div class="v">{{ $harvest->hasil_pertanian }}</div></div>
                <div class="info-box"><div class="k">Varian</div><div class="v">{{ $harvest->varian }}</div></div>
                <div class="info-box"><div class="k">Total Panen</div><div class="v">{{ $harvest->Total_panen }} kg</div></div>
                <div class="info-box"><div class="k">Stok Tersedia</div><div class="v">{{ $harvest->Stok_tersedia }} kg</div></div>
                <div class="info-box"><div class="k">Tanggal Panen</div><div class="v">{{ $harvest->tanggal_panen ? $harvest->tanggal_panen->format('d F Y') : '-' }}</div></div>
                <div class="info-box"><div class="k">Nomor HP</div><div class="v">{{ $harvest->nomor_hp }}</div></div>
                <div class="info-box"><div class="k">Lokasi</div><div class="v">{{ $harvest->lokasi }}</div></div>
            </div>

            <!-- QR CODE BOX -->
            <div style="background:#fafdf9; border:1px dashed var(--green); border-radius:18px; padding:24px; text-align:center; margin-bottom:24px;">
                <h3 style="font-size:16px; color:var(--green-dark); margin-bottom:14px;">QR Code Informasi Publik</h3>
                
                <div id="qr" style="display:flex; justify-content:center; margin-bottom:14px;">
                    {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(240)->generate(route('harvest.public', $harvest->public_code)) !!}
                </div>

                <p style="font-size:13px; color:var(--muted);">Scan QR Code di atas menggunakan ponsel untuk mengakses rincian hasil panen ini.</p>
                <p style="font-size:11px; color:var(--muted); margin-top:4px;">{{ route('harvest.public', $harvest->public_code) }}</p>
            </div>

            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <a href="{{ route('admin.harvests.edit', $harvest) }}" class="btn btn-outline">✏️ Edit Data</a>
                <a href="{{ route('harvest.public', $harvest->public_code) }}" target="_blank" class="btn btn-primary">🌐 Lihat Halaman Publik</a>
                <button onclick="downloadQR()" class="btn btn-gold">📥 Unduh QR Code</button>
            </div>
        </div>
    </div>

    <script>
        function downloadQR() {
            const svg = document.querySelector('#qr svg');
            if(!svg) return;
            const serializer = new XMLSerializer();
            const source = serializer.serializeToString(svg);
            
            const size = 300;      
            const padding = 20;   
            const border = 4;      
            
            const canvas = document.createElement('canvas');
            canvas.width = size;
            canvas.height = size;
            
            const ctx = canvas.getContext('2d');
            ctx.fillStyle = '#ffffff';
            ctx.fillRect(0, 0, size, size);
            const img = new Image();
            img.onload = function () {
                const qrSize = size - (padding * 2);
                ctx.drawImage(img, padding, padding, qrSize, qrSize);
                ctx.strokeStyle = '#000000';
                ctx.lineWidth = border;
                ctx.strokeRect(border / 2, border / 2, size - border, size - border);
                const a = document.createElement('a');
                a.download = 'qr-code-panen-{{ $harvest->id }}.png';
                a.href = canvas.toDataURL('image/png');
                a.click();
            };
            img.src = 'data:image/svg+xml;base64,' + btoa(unescape(encodeURIComponent(source)));
        }
    </script>
@endsection