@extends('layouts.app')
@section('header_title', 'Kelola Berita & Kegiatan')
@section('header_subtitle', 'Publikasikan berita, pengumuman, dan dokumentasi kegiatan nagari.')

@section('content')
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; flex-wrap:wrap; gap:12px;">
        <h3 style="font-size:1.1rem; font-weight:700; color:var(--ink); font-family:'Poppins',sans-serif;">Daftar Berita</h3>
        <a href="{{ route('admin.berita.create') }}" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; border-radius:24px; padding:10px 20px; font-weight:700; text-decoration:none; font-size:13px;">+ Tambah Berita</a>
    </div>

    @if(session('success'))
        <div style="background:var(--green-light); border:1px solid var(--green); color:var(--green-dark); padding:12px 16px; border-radius:12px; margin-bottom:18px; font-weight:600;">✓ {{ session('success') }}</div>
    @endif

    <div style="background:#fff; border-radius:16px; padding:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse; font-size:13px;">
            <thead>
                <tr style="border-bottom:2px solid #eef2f0; text-align:left; color:var(--muted); font-size:12px; text-transform:uppercase;">
                    <th style="padding:12px;">Judul</th>
                    <th style="padding:12px;">Kategori</th>
                    <th style="padding:12px;">Tanggal</th>
                    <th style="padding:12px;">Status</th>
                    <th style="padding:12px; text-align:center; width:140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritas as $berita)
                    <tr style="border-bottom:1px solid #f0f4f0;">
                        <td style="padding:12px; font-weight:600; color:var(--green-dark);">{{ Str::limit($berita->judul, 50) }}</td>
                        <td style="padding:12px;"><span style="background:#fef3c7; color:#b45309; padding:4px 10px; border-radius:12px; font-weight:600; font-size:11px;">{{ $berita->kategori }}</span></td>
                        <td style="padding:12px;">{{ $berita->tanggal_terbit->format('d M Y') }}</td>
                        <td style="padding:12px;">
                            @if($berita->status === 'Terbit')
                                <span style="background:#dcfce7; color:#166534; padding:4px 10px; border-radius:12px; font-weight:600; font-size:11px;">Terbit</span>
                            @else
                                <span style="background:#f1f5f9; color:#64748b; padding:4px 10px; border-radius:12px; font-weight:600; font-size:11px;">Draft</span>
                            @endif
                        </td>
                        <td style="padding:12px; text-align:center;">
                            <div style="display:inline-flex; gap:6px;">
                                <a href="{{ route('admin.berita.edit', $berita) }}" style="border:1px solid var(--green); color:var(--green-dark); padding:6px 12px; border-radius:20px; font-weight:700; text-decoration:none; font-size:12px;">Edit</a>
                                <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" onsubmit="return confirm('Yakin hapus berita ini?')" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:6px 12px; border-radius:20px; font-weight:700; font-size:12px; cursor:pointer;">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" style="text-align:center; padding:30px; color:var(--muted);">Belum ada berita. Klik "+ Tambah Berita" untuk memulai.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top:20px;">{{ $beritas->links() }}</div>
@endsection
