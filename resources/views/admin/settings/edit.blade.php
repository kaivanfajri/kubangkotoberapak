@extends('layouts.app')
@section('header_title', 'Pengaturan Website')
@section('header_subtitle', 'Kelola informasi umum dan konten statis website nagari.')

@section('content')
    @if(session('success'))
        <div style="background:var(--green-light); border:1px solid var(--green); color:var(--green-dark); padding:12px 16px; border-radius:12px; margin-bottom:18px; font-weight:600;">✓ {{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        <div style="display:flex; flex-direction:column; gap:20px;">
            @foreach($settings as $key => $setting)
                <div style="background:#fff; border-radius:16px; padding:20px 24px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
                    <label for="setting-{{ $key }}" style="display:block; font-weight:700; font-size:14px; color:var(--ink); margin-bottom:6px; font-family:'Poppins',sans-serif;">
                        {{ $setting['label'] }}
                    </label>

                    @if(!empty($setting['help']))
                        <p style="font-size:12px; color:var(--muted); margin-bottom:10px; line-height:1.5;">{{ $setting['help'] }}</p>
                    @endif

                    @if($setting['type'] === 'textarea')
                        <textarea
                            id="setting-{{ $key }}"
                            name="{{ $key }}"
                            rows="4"
                            placeholder="{{ $setting['placeholder'] }}"
                            style="width:100%; padding:12px 16px; border:1.5px solid #e0e7e3; border-radius:12px; font-size:14px; font-family:'Inter',sans-serif; resize:vertical; color:var(--ink); background:#fafbfa; transition:border 0.2s;"
                            onfocus="this.style.borderColor='var(--green)'"
                            onblur="this.style.borderColor='#e0e7e3'"
                        >{{ $setting['value'] }}</textarea>
                    @else
                        <input
                            type="{{ $setting['type'] === 'email' ? 'email' : ($setting['type'] === 'url' ? 'url' : 'text') }}"
                            id="setting-{{ $key }}"
                            name="{{ $key }}"
                            value="{{ $setting['value'] }}"
                            placeholder="{{ $setting['placeholder'] }}"
                            style="width:100%; padding:12px 16px; border:1.5px solid #e0e7e3; border-radius:12px; font-size:14px; font-family:'Inter',sans-serif; color:var(--ink); background:#fafbfa; transition:border 0.2s;"
                            onfocus="this.style.borderColor='var(--green)'"
                            onblur="this.style.borderColor='#e0e7e3'"
                        >
                    @endif
                </div>
            @endforeach
        </div>

        <div style="margin-top:24px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
            <button type="submit" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; border:none; border-radius:24px; padding:12px 28px; font-weight:700; font-size:14px; cursor:pointer; box-shadow:0 4px 12px rgba(46,125,50,0.25); font-family:'Poppins',sans-serif;">
                💾 Simpan Pengaturan
            </button>
            <span style="font-size:12px; color:var(--muted);">Perubahan akan langsung tampil di halaman publik setelah disimpan.</span>
        </div>
    </form>
@endsection
