@extends('layouts.app')

@section('header_title', 'Kelola Lembaga Nagari')
@section('header_subtitle', 'Ubah nama ketua, jumlah anggota, deskripsi, dan kontak WhatsApp lembaga di bawah ini.')

@section('content')
    <div style="max-width:900px; margin:0 auto;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; flex-wrap:wrap; gap:12px;">
            <div>
                <h3 style="font-size:1.15rem; font-weight:700; color:var(--ink); font-family:'Poppins',sans-serif;">Form Kelola Lembaga Nagari</h3>
            </div>
            <a href="{{ route('lembaga') }}" target="_blank" class="btn" style="background:#e8f5e9; color:var(--green-dark); font-weight:600; border:1px solid var(--green); padding:8px 16px; border-radius:10px; text-decoration:none; font-size:13px; display:inline-flex; align-items:center; gap:6px;">
                Lihat Tampilan Publik
            </a>
        </div>

        @if(session('success'))
            <div style="background:var(--green-light); border:1px solid var(--green); color:var(--green-dark); padding:12px 16px; border-radius:12px; margin-bottom:18px; font-weight:600;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.lembaga.update') }}" method="POST">
            @csrf

            @php $items = $data ?? []; @endphp
            @foreach($items as $index => $item)
                <div class="card" style="padding:24px; margin-bottom:20px; background:#fff; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
                    <h3 style="font-size:16px; color:var(--green-dark); margin-bottom:14px; font-weight:700;">{{ $item['nama'] }}</h3>
                    <input type="hidden" name="items[{{ $index }}][id]" value="{{ $item['id'] }}">
                    <input type="hidden" name="items[{{ $index }}][nama]" value="{{ $item['nama'] }}">

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:12px;">
                        <div class="field">
                            <label style="font-size:12px; font-weight:600; color:var(--muted); display:block; margin-bottom:4px;">Nama Ketua Lembaga</label>
                            <input type="text" name="items[{{ $index }}][ketua]" value="{{ $item['ketua'] }}" style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:8px 12px; font-family:inherit;">
                        </div>
                        <div class="field">
                            <label style="font-size:12px; font-weight:600; color:var(--muted); display:block; margin-bottom:4px;">Jumlah Anggota</label>
                            <input type="text" name="items[{{ $index }}][anggota]" value="{{ $item['anggota'] }}" style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:8px 12px; font-family:inherit;">
                        </div>
                    </div>

                    <div class="field" style="margin-bottom:12px;">
                        <label style="font-size:12px; font-weight:600; color:var(--muted); display:block; margin-bottom:4px;">Nomor WhatsApp Ketua (tanpa tanda +)</label>
                        <input type="text" name="items[{{ $index }}][hp]" value="{{ $item['hp'] }}" style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:8px 12px; font-family:inherit;">
                    </div>

                    <div class="field" style="margin-bottom:0;">
                        <label style="font-size:12px; font-weight:600; color:var(--muted); display:block; margin-bottom:4px;">Deskripsi & Tugas Lembaga</label>
                        <textarea name="items[{{ $index }}][desc]" rows="3" style="width:100%; border:1.5px solid #e0e6e0; border-radius:8px; padding:8px 12px; font-family:inherit; font-size:13.5px;">{{ $item['desc'] }}</textarea>
                    </div>
                </div>
            @endforeach

            <div style="margin-top:24px; margin-bottom:40px;">
                <button type="submit" class="btn btn-primary" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; padding:12px 24px; font-size:15px; font-weight:700; border-radius:12px; width:100%; cursor:pointer; border:none; box-shadow:0 4px 12px rgba(46,125,50,0.25);">
                    Simpan Perubahan Lembaga Nagari
                </button>
            </div>
        </form>
    </div>
@endsection
