@extends('layouts.app')

@section('content')
    <div style="max-width:900px; margin:0 auto;">
        <h2 style="font-size:22px; font-weight:700; color:var(--green-dark); margin-bottom:6px;">Kelola Daftar Lembaga Nagari</h2>
        <p style="color:var(--muted); font-size:13.5px; margin-bottom:20px;">Ubah nama ketua, jumlah anggota, deskripsi, dan kontak WhatsApp lembaga di bawah ini.</p>

        @if(session('success'))
            <div style="background:var(--green-light); border:1px solid var(--green); color:var(--green-dark); padding:12px 16px; border-radius:12px; margin-bottom:18px; font-weight:600;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.lembaga.update') }}" method="POST">
            @csrf

            @php $items = $data ?? []; @endphp
            @foreach($items as $index => $item)
                <div class="card" style="padding:24px; margin-bottom:20px;">
                    <h3 style="font-size:16px; color:var(--green-dark); margin-bottom:14px;">{{ $item['nama'] }}</h3>
                    <input type="hidden" name="items[{{ $index }}][id]" value="{{ $item['id'] }}">
                    <input type="hidden" name="items[{{ $index }}][nama]" value="{{ $item['nama'] }}">

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                        <div class="field">
                            <label>Nama Ketua Lembaga</label>
                            <input type="text" name="items[{{ $index }}][ketua]" value="{{ $item['ketua'] }}">
                        </div>
                        <div class="field">
                            <label>Jumlah Anggota</label>
                            <input type="text" name="items[{{ $index }}][anggota]" value="{{ $item['anggota'] }}">
                        </div>
                    </div>

                    <div class="field">
                        <label>Nomor WhatsApp Ketua (tanpa tanda +)</label>
                        <input type="text" name="items[{{ $index }}][hp]" value="{{ $item['hp'] }}">
                    </div>

                    <div class="field">
                        <label>Deskripsi & Tugas Lembaga</label>
                        <textarea name="items[{{ $index }}][desc]" rows="3" style="width:100%; border:1.5px solid #e0e6e0; border-radius:10px; padding:10px; font-family:inherit; font-size:13.5px;">{{ $item['desc'] }}</textarea>
                    </div>
                </div>
            @endforeach

            <div style="margin-top:24px;">
                <button type="submit" class="btn btn-primary">Simpan Perubahan Lembaga Nagari</button>
            </div>
        </form>
    </div>
@endsection
