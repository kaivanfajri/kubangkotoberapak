@extends('layouts.app')
@section('header_title', 'Kelola Galeri')
@section('header_subtitle', 'Unggah dan kelola foto dokumentasi nagari.')

@section('content')
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; flex-wrap:wrap; gap:12px;">
        <h3 style="font-size:1.1rem; font-weight:700; color:var(--ink); font-family:'Poppins',sans-serif;">Galeri Foto Nagari</h3>
        <a href="{{ route('admin.galeri.create') }}" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; border-radius:24px; padding:10px 20px; font-weight:700; text-decoration:none; font-size:13px;">+ Unggah Foto</a>
    </div>

    @if(session('success'))
        <div style="background:var(--green-light); border:1px solid var(--green); color:var(--green-dark); padding:12px 16px; border-radius:12px; margin-bottom:18px; font-weight:600;">✓ {{ session('success') }}</div>
    @endif

    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(200px, 1fr)); gap:16px;">
        @forelse($galeris as $galeri)
            <div style="background:#fff; border-radius:14px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0;">
                <div style="height:160px; background:url('{{ asset('storage/'.$galeri->gambar) }}') center/cover; position:relative;">
                    <span style="position:absolute; top:8px; left:8px; background:rgba(0,0,0,0.6); color:#fff; padding:3px 10px; border-radius:12px; font-size:10px; font-weight:600;">{{ $galeri->kategori }}</span>
                </div>
                <div style="padding:12px;">
                    <p style="font-size:12px; font-weight:600; color:var(--green-dark); margin-bottom:8px; line-height:1.4;">{{ $galeri->caption }}</p>
                    <form action="{{ route('admin.galeri.destroy', $galeri) }}" method="POST" onsubmit="return confirm('Yakin hapus foto ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:5px 12px; border-radius:16px; font-weight:700; font-size:11px; cursor:pointer; width:100%;">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <div style="grid-column:1/-1; text-align:center; padding:40px; color:var(--muted);">Belum ada foto di galeri.</div>
        @endforelse
    </div>
    <div style="margin-top:20px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
        <div>{{ $galeris->links() }}</div>
        <a href="{{ route('admin.galeri.create') }}" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; border-radius:24px; padding:10px 22px; font-weight:700; text-decoration:none; font-size:13.5px; box-shadow:0 4px 12px rgba(46,125,50,0.25); display:inline-flex; align-items:center; gap:6px;">
            + Unggah Foto Baru
        </a>
    </div>
@endsection
