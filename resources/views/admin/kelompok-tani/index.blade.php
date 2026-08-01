@extends('layouts.app')
@section('header_title', 'Kelola Kelompok Tani')
@section('header_subtitle', 'Kelola data kelompok tani aktif di Nagari Kubang Koto Berapak.')

@section('content')
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; flex-wrap:wrap; gap:12px;">
        <h3 style="font-size:1.1rem; font-weight:700; color:var(--ink); font-family:'Poppins',sans-serif;">Daftar Kelompok Tani</h3>
        <a href="{{ route('admin.kelompok-tani.create') }}" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; border-radius:24px; padding:10px 20px; font-weight:700; text-decoration:none; font-size:13px;">+ Tambah Kelompok Tani</a>
    </div>

    @if(session('success'))
        <div style="background:var(--green-light); border:1px solid var(--green); color:var(--green-dark); padding:12px 16px; border-radius:12px; margin-bottom:18px; font-weight:600;">✓ {{ session('success') }}</div>
    @endif

    <div style="background:#fff; border-radius:16px; padding:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse; font-size:13px;">
            <thead>
                <tr style="border-bottom:2px solid #eef2f0; text-align:left; color:var(--muted); font-size:12px; text-transform:uppercase;">
                    <th style="padding:12px;">Nama Kelompok</th>
                    <th style="padding:12px;">Ketua</th>
                    <th style="padding:12px;">Jorong</th>
                    <th style="padding:12px;">Anggota</th>
                    <th style="padding:12px;">Luas Lahan</th>
                    <th style="padding:12px;">Komoditas</th>
                    <th style="padding:12px;">Status</th>
                    <th style="padding:12px; text-align:center; width:140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kelompokTanis as $kt)
                    <tr style="border-bottom:1px solid #f0f4f0;">
                        <td style="padding:12px; font-weight:600; color:var(--green-dark);">{{ $kt->nama_kelompok }}</td>
                        <td style="padding:12px;">{{ $kt->ketua }}</td>
                        <td style="padding:12px;">{{ $kt->jorong }}</td>
                        <td style="padding:12px; text-align:center;">{{ $kt->jumlah_anggota }}</td>
                        <td style="padding:12px;">{{ $kt->luas_lahan }}</td>
                        <td style="padding:12px;">{{ $kt->komoditas_utama }}</td>
                        <td style="padding:12px;">
                            @if($kt->status === 'Aktif')
                                <span style="background:#dcfce7; color:#166534; padding:4px 10px; border-radius:12px; font-weight:600; font-size:11px;">Aktif</span>
                            @else
                                <span style="background:#f1f5f9; color:#64748b; padding:4px 10px; border-radius:12px; font-weight:600; font-size:11px;">Non-Aktif</span>
                            @endif
                        </td>
                        <td style="padding:12px; text-align:center;">
                            <div style="display:inline-flex; gap:6px;">
                                <a href="{{ route('admin.kelompok-tani.edit', $kt) }}" style="border:1px solid var(--green); color:var(--green-dark); padding:6px 12px; border-radius:20px; font-weight:700; text-decoration:none; font-size:12px;">Edit</a>
                                <form action="{{ route('admin.kelompok-tani.destroy', $kt) }}" method="POST" onsubmit="return confirm('Yakin hapus kelompok tani ini?')" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:6px 12px; border-radius:20px; font-weight:700; font-size:12px; cursor:pointer;">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" style="text-align:center; padding:30px; color:var(--muted);">Belum ada data kelompok tani.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top:20px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
        <div>{{ $kelompokTanis->links() }}</div>
        <a href="{{ route('admin.kelompok-tani.create') }}" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; border-radius:24px; padding:10px 22px; font-weight:700; text-decoration:none; font-size:13.5px; box-shadow:0 4px 12px rgba(46,125,50,0.25); display:inline-flex; align-items:center; gap:6px;">
            + Tambah Kelompok Tani Baru
        </a>
    </div>
@endsection
